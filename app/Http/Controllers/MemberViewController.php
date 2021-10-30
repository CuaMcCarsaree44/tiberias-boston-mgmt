<?php

namespace App\Http\Controllers;

use App\Models\Entity\Member;
use App\Models\Entity\Province;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MemberViewController extends Controller
{
    public function upsert(Request $request, $function) {
        $payload = match($function) {
            'update' => [
                'provinces' => Province::
                                orderBy('name')
                                ->get(),
                'method' => 'PUT',
                'endpoint' => '/api/member',
                'function' => 'update',
                'data' => Member
                            ::where('id', $request->get('id'))
                            ->where('is_deleted', 0)
                            ->with(['regency', 'district'])
                            ->get()
                            ->first()
            ],
            'create' => [
                'provinces' => Province::
                                orderBy('name')
                                ->get(),
                'method' => 'POST',
                'endpoint' => '/api/member',
                'function' => 'create'
            ]
        }; 

        return view('crm/member/upsert', $payload);
    }
}
