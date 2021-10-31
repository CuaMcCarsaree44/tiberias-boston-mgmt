<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Entity\District;
use App\Models\Entity\Province;
use App\Models\Entity\Regency;
use App\Models\Factory\BaseResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndonesiaController extends Controller
{
    public function getUsedRegion(): JsonResponse {
        $resultSet = DB::table('member')
                        ->select('district_id')
                        ->where('is_deleted', 0)
                        ->orderBy('district_id')
                        ->distinct()
                        ->get();

        $ids = [];

        foreach($resultSet as $set){
            array_push($ids, $set->district_id);
        }

        return BaseResponse::ok(
            District::whereIn('id', $ids)
            ->orderBy('name')
            ->get(),
            'Sukses mendapatkan region yang terpakai'
        );
    }

    public function getRegenciesByProvinces($id){
        return BaseResponse::ok(
            Regency::where('province_id', $id)
            ->orderBy('name')
            ->get(),
            'Sukses mendapatkan data regency'
        );
    }

    public function getDistrictByRegencies($id){
        return BaseResponse::ok(
            District::where('regency_id', $id)
                ->orderBy('name')
                ->get(),
            'Sukses mendapatkan data district'
        );
    }

    public function getRegionInformationByDistrict($id) {
        $district = District::find($id);

        $regency = Regency::find($district->regency_id);

        $province = Province::find($regency->province_id);

        return BaseResponse::ok(
            [
                "district" => $district,
                "regency" => $regency,
                "province" => $province
            ],
            'Sukses mendapatkan data district'
        );
    }
}
