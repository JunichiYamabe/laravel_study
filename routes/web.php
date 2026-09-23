<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;

Route::get('/', function () {
    return view('welcome');
});
//サンプルコントローラーのルート
Route::get('/sample', [SampleController::class, 'showSample']);
//一覧画面の表示
Route::get('/index', [BlogController::class, 'index'])->name('index');
//新規投稿画面表示
Route::get('/create', [BlogController::class, 'create'])->name('create');
//投稿データ保存処理
Route::post('/store', [BlogController::class, 'store'])->name('store');