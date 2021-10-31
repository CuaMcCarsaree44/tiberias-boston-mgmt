<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', fn () => view('landing-page'));

Route::group([
    'prefix' => '/crm'
], function () {
    Route::get('/main', fn() => view('crm/main'));

    Route::group([
        'prefix' => 'member',
        'namespace' => 'App\Http\Controllers'
    ], function () {
        Route::get('', fn() => view('crm/member/list'));
        Route::get('/{function}', 'MemberViewController@upsert');
    });
});
