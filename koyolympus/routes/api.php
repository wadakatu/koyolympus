<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// TODO: EC2デプロイ時に削除する
Route::get('/test', function () {
    return response()->json(['name' => 'koyo']);
});

//Biz Inquiries送信処理
Route::post('/bizinq/send', 'v1\BizInquiriesController@sendBizInquiries')->name('bizInq.send');
