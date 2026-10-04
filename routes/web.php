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
//詳細画面の表示
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('detail');
//更新画面の表示
Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('edit');
//更新処理
Route::put('/blog/{id}', [BlogController::class, 'update'])->name('update');
// 検索処理
Route::get('/search', [BlogController::class, 'search'])->name('search');
// 削除機能
Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('delete');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
