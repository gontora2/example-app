<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/sample',[\App\Http\Controllers\Sample\IndexController::class,'show']);
Route::get('/sample/{id}',[\App\Http\Controllers\Sample\IndexController::class,'showId']);
// シングルアクションコントローラの場合、メソッド名が不要
Route::get('/tweet',\App\Http\Controllers\Tweet\IndexController::class)->name('tweet.index'); 
//Route::post('/tweet',\App\Http\Controllers\Tweet\IndexController::class)->name('tweet.index'); 
Route::post('/tweet/create',\App\Http\Controllers\Tweet\CreateController::class)->name('tweet.create');
//where()をつけることで入力値を制限させることが出来る（下記の場合数字以外が渡された場合404になる）
Route::get('/tweet/update/{tweetId}',\App\Http\Controllers\Tweet\Update\IndexController::class)->name('tweet.update.index')->where('tweetId','[0-9]+');
Route::put('/tweet/update/{tweetId}',\App\Http\Controllers\Tweet\Update\PutController::class)->name('tweet.update.put')->where('tweetId','[0-9]+');
Route::delete('/tweet/delete/{tweetId}',\App\Http\Controllers\Tweet\DeleteController::class)->name('tweet.delete')->where('tweetId','[0-9]+');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
