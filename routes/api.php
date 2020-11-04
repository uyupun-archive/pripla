<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V0\TimelineController;
use App\Http\Controllers\Api\V0\DetailController;
use App\Http\Controllers\Api\V0\PrefecturesController;
use App\Http\Controllers\Api\V0\BudgetController;
use App\Http\Controllers\Api\V0\TargetsController;
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

// デートプラン詳細の取得
Route::get('/detail', DetailController::class);

// 地域（都道府県）一覧の取得
Route::get('/prefectures', PrefecturesController::class);

// 予算の一覧の取得
Route::get('/budget', BudgetController::class);

// ターゲット（男/女/どちらでも可）の取得
Route::get('/targets', TargetsController::class);

// 投稿
Route::post('/post', PostController::class);
