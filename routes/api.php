<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->group(function(){

    Route::group([
        'prefix' => 'auth',
        "namespace" => 'App\Http\Controllers'
    ], function() {
       Route::post('register', 'AuthController@register');
    });

    Route::group([
        'prefix' => 'member',
        'namespace' => 'App\Http\Controllers\Api'
    ], function() {
        Route::get('', 'MemberController@getAllMembers');
        Route::post('', 'MemberController@createMember');
        Route::put('', 'MemberController@updateMember');
        Route::get('/detail/{id}', 'MemberController@getMemberById');
    });

    Route::group([
        'prefix' => 'indonesia',
        'namespace' => 'App\Http\Controllers\Api'
    ], function() {
        Route::get('/used-region', 'IndonesiaController@getUsedRegion');
        Route::get('/regencies/{id}', 'IndonesiaController@getRegenciesByProvinces');
        Route::get('/districts/{id}', 'IndonesiaController@getDistrictByRegencies');
        Route::get('/information/{id}', 'IndonesiaController@getRegionInformationByDistrict');
    });


});
