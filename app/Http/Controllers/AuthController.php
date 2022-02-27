<?php

namespace App\Http\Controllers;

use App\Models\Entity\OTPVerification;
use App\Models\Entity\User;
use App\Models\Factory\BaseResponse;
use App\Services\TelegramServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse {
        $this->baseValidator($request, [
            "fullname" => 'required|min:1',
            "email" => 'required|email:rfc|unique:App\Models\Entity\User,email',
            "phone" => 'required|numeric|min:8|unique:App\Models\Entity\User,phone'
        ]);

        DB::beginTransaction();

        try{
            $user = new User();
            $user->phone = $request->get('phone');
            $user->email = $request->get('email');
            $user->fullname = $request->get('fullname');
            $user->save();

            $otp = new OTPVerification();
            $otp->otp = rand(100000, 999999);
            $otp->expired_at = date('Y-m-d H:i:s', strtotime('+5 minutes'));
            $otp->user_id = $user->id;
            $otp->save();
            (new TelegramServices())->sendMessage("[$user->phone] Your OTP is $otp->otp. This OTP will be expired at $otp->expired_at");

            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            throw $e;
        }
        return BaseResponse::ok($user, "Succesfully created new user", "201");
    }
}
