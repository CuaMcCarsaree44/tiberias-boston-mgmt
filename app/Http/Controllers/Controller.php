<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Common\Exception\GLO\BadRequestException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function baseValidator(Request $request, array $rules): bool {
        $v = validator($request->all(), $rules);

        if($v->fails()){
            throw new BadRequestException($v->errors()->first());
        }

        return true;
    }
}
