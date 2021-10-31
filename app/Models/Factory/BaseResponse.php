<?php

namespace App\Models\Factory;

use Illuminate\Http\JsonResponse;

class BaseResponse{
    public bool $status = false;
    public mixed $code = "500";
    public string $message = "Some Message";
    public mixed $data = null;

    public function __construct($data, string $message, $code = 200){
        $this->status = ($code < 400);
        $this->code = $code;
        $this->message = $message;
        $this->data = $data;
    }

    public static function ok($data, string $message, $code = 200): JsonResponse{
        return response()->json(
            new BaseResponse(
                $data,
                $message,
                $code
            )
            , $code);
    }

    public static function error(string $message, $code = 500, $data = null): JsonResponse
    {
        return response()->json(
            new BaseResponse(
                $data,
                $message,
                $code
            )
        );
    }

    public static function custom($code, string $message, $data = null): JsonResponse{
        return response()->json(
            new BaseResponse(
                $data,
                $message,
                $code
            ), $code
        );
    }
}