<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V0\TimelineController;
use App\Http\Controllers\Api\V0\DetailController;
use App\Http\Controllers\Api\V0\PrefecturesController;
use App\Http\Controllers\Api\V0\BudgetController;
use App\Http\Controllers\Api\V0\TargetController;
use App\Http\Controllers\Api\V0\PostController;

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
Route::get('/tl', TimelineController::class);

// デートプランの詳細
Route::get('/detail', DetailController::class);

// 地域（都道府県）の取得
Route::get('/prefectures', PrefecturesController::class);

// 予算の取得
Route::get('/budget', BudgetController::class);

// ターゲット（男/女/どちらでも可）
Route::get('/target', TargetController::class);

// 投稿
Route::post('/post', PostController::class);
