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

// TODO: CSRFトークン生成メソッド(Postman用)　EC2デプロイ時に削除
Route::get('/csrf', 'v1\ImageController@index');

//Biz Inquiries送信処理
Route::post('/bizinq/send', 'v1\BizInquiriesController@sendBizInquiries')->name('bizInq.send');
//写真アップロードメソッド
Route::post('/photo/upload', 'v1\ImageController@uploadPhoto')->name('upload.photo');
//ログインメソッド
Route::post('/login', 'Auth\LoginController@login')->name('login');
//ログアウトメソッド
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
//ログインユーザー返却メソッド
Route::get('/user', function () {
    return Auth::user();
})->name('user');

