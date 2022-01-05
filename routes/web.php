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

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::group(['prefix'=>'admin'],function(){
    //ログインしないと見えないページ
    Route::group(['middleware' => ['auth']], function() {
        Route::get('/',function(){ return view('welcome'); });
        //Route::match(['get', 'post'],'/',function(){ return view('home')->name('home'); });
        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
        Route::post('/saveData', [\App\Http\Controllers\Admin\HomeController::class, 'saveData'])->name('saveData');
        Route::get('/join', [\App\Http\Controllers\Admin\JoinController::class, 'index'])->name('join');
        Route::get('/join/new', [\App\Http\Controllers\Admin\JoinController::class, 'new'])->name('joinnew');

    });
   // Route::match(['get', 'post'],'/login',function(){ return view('auth.login'); });
});
