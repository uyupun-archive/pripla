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

// タイムラインの取得
Route::get('/tl', function (Request $request) {
    return '{}';
});

// デートプランの詳細
Route::get('/detail', function (Request $request) {
    return '{}';
});

// 地域（都道府県）の取得
Route::get('/prefectures', function (Request $request) {
    return '{}';
});

// 予算の取得
Route::get('/budget', function (Request $request) {
    return '{}';
});

// ターゲット（男/女/どちらでも可）
Route::get('/target', function (Request $request) {
    return '{}';
});

// 投稿
Route::post('/post', function (Request $request) {
    return '{}';
});
