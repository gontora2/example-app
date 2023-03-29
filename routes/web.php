<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/sample',[\App\Http\Controllers\Sample\IndexController::class,'show']);
Route::get('/sample/{id}',[\App\Http\Controllers\Sample\IndexController::class,'showId']);
// シングルアクションコントローラの場合、メソッド名が不要
Route::get('/tweet',\App\Http\Controllers\Tweet\IndexController::class)->name('tweet.index'); 
//Route::post('/tweet',\App\Http\Controllers\Tweet\IndexController::class)->name('tweet.index'); 
Route::post('/tweet/create',\App\Http\Controllers\Tweet\CreateController::class)->name('tweet.create');
//where()をつけることで入力値を制限させることが出来る（下記の場合数字以外が渡された場合404になる）
Route::get('/tweet/update/{tweetId}',\App\Http\Controllers\Tweet\Update\IndexController::class)->name('tweet.update.index')->where('tweetId','[0-9]+');
Route::put('/tweet/update/{tweetId}',\App\Http\Controllers\Tweet\Update\PutController::class)->name('tweet.update.put')->where('tweetId','[0-9]+');

//Route::get('/', function () {
//    return view('welcome');
//});
