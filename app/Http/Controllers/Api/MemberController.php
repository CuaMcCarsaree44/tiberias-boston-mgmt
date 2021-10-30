<?php

namespace App\Http\Controllers\Api;

use App\Common\Facade\Console;
use App\Common\Facade\StorageFacade;
use App\Http\Controllers\Controller;
use App\Models\Entity\Member;
use App\Models\Entity\MemberDocument;
use App\Models\Factory\BaseResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Throwable;

class MemberController extends Controller
{
    public function createMember(Request $request): RedirectResponse {
        $this->baseValidator($request, [
            'name' => 'required',
            'regency_id' => 'required|exists:regencies,id',
            'district_id' => 'required|exists:districts,id',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $member = new Member();

        $member->name = $request->get('name');
        $member->regency_id = $request->get('regency_id');
        $member->district_id = $request->get('district_id');
        $member->address = $request->get('address');
        $member->phone = $request->get('phone');
        $member->is_deleted = 0;
        $member->save();

        $storage_facade = new StorageFacade();
        
        foreach([
            $request->file('kk'),
            $request->file('akte-baptis')
        ] as $key => $attachment) {

            try{
                $document = new MemberDocument();

                $document->member_id = $member->id;
                $document->document_link = $storage_facade->saveFile($attachment);

                switch($key){
                    case 0: 
                        $member->kk_flag = 1;
                        $document->flag = 'KK';
                        break;

                    case 1:
                        $member->akte_baptis_flag = 1;
                        $document->flag = 'AKTEBAPTIS';
                        break;

                    default:
                }

                $document->save();

            }catch(Throwable $e){

                Console::writeLine("Some file is not present: {$e->getMessage()}. Skipping document number #{$key}", 'w');

            }


        }

        $member->save();

        return redirect('/crm/member');
    }

    public function updateMember(Request $request): RedirectResponse {
        $this->baseValidator($request, [
            'id' => 'required',
            'name' => 'required',
            'regency_id' => 'required|exists:regencies,id',
            'district_id' => 'required|exists:districts,id',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $member = Member::find($request->get('id'));

        $member->name = $request->get('name');
        $member->regency_id = $request->get('regency_id');
        $member->district_id = $request->get('district_id');
        $member->address = $request->get('address');
        $member->phone = $request->get('phone');
        $member->is_deleted = 0;
        $member->save();

        $storage_facade = new StorageFacade();

        MemberDocument
            ::where('member_id', $request->get('id'))
            ->delete();
        
        foreach([
            $request->file('kk'),
            $request->file('akte-baptis')
        ] as $key => $attachment) {

            try{
                $document = new MemberDocument();

                $document->member_id = $member->id;
                $document->document_link = $storage_facade->saveFile($attachment);

                switch($key){
                    case 0: 
                        $member->kk_flag = 1;
                        $document->flag = 'KK';

                        MemberDocument
                            ::where('member_id', $request->get('id'))
                            ->where('flag', 'KK')
                            ->delete();
                        break;

                    case 1:
                        $member->akte_baptis_flag = 1;
                        $document->flag = 'AKTEBAPTIS';

                        MemberDocument
                            ::where('member_id', $request->get('id'))
                            ->where('flag', 'AKTEBAPTIS')
                            ->delete();
                        break;

                    default:
                }

                $document->save();

            }catch(Throwable $e){

                Console::writeLine("Some file is not present: {$e->getMessage()}. Skipping document number #{$key}", 'w');

            }


        }

        $member->save();

        return redirect('/crm/member');
    }

    public function getAllMembers(Request $request): JsonResponse {

        $find_object = '1';

        if($request->has('name')){
            $find_object = '';
            /**
             * Make fuzzy searching. Tokenized every string by seperating them using space 
             * ASCII.
             */
            $search_token = explode(' ', $request->get('name'));


            foreach($search_token as $key => $token) {
                Console::writeLine("Token number #{$key}: {$token}");

                if($key === 0){
                    $find_object .= "(";
                }

                $find_object .= " `name` LIKE '%{$token}%' ";


                if($key !== count($search_token) - 1){
                    $find_object .= 'OR ';
                }else {
                    $find_object .= ')';
                }
            }
        }

        Console::writeLine($find_object);

        $region = $request->get('region_id');

        return BaseResponse::ok(
            Member
            ::whereRaw($find_object)
            ->where('is_deleted', 0)
            ->where('district_id', $region === null ? '!=' : '=', $region)
            ->with([
                'regency',
                'district'
            ])
            ->get(),
            "Sukses mendapatkan seluruh data member."
        );
    }


    public function getMemberById($id): JsonResponse {
        return BaseResponse::ok(
            Member::find($id),
            "Sukses mendapatkan data member"
        );
    }
}
