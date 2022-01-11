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
Route::any('/getSpaceList', [\App\Http\Controllers\ArrayController::class, 'getSpaceList'])->name('Array.space');
Route::group(['prefix' => 'admin'], function () {
    //ログインしないと見えないページ
    Route::group(['middleware' => ['auth']], function () {
        //Route::match(['get', 'post'],'/',function(){ return view('home')->name('home'); });
        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
        Route::post('/saveData', [\App\Http\Controllers\Admin\HomeController::class, 'saveData'])->name('saveData');
        Route::get('/join', [\App\Http\Controllers\Admin\JoinController::class, 'index'])->name('join');
        Route::get('/join/new', [\App\Http\Controllers\Admin\JoinController::class, 'new'])->name('joinnew');
        Route::get('/endai', [\App\Http\Controllers\Admin\EndaiController::class, 'index'])->name('endai');
        Route::get('/endai/new', [\App\Http\Controllers\Admin\EndaiController::class, 'new'])->name('endainew');
        Route::get('/time', [\App\Http\Controllers\Admin\TimeController::class, 'index'])->name('time');
    });
   // Route::match(['get', 'post'],'/login',function(){ return view('auth.login'); });
});
