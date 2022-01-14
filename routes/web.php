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
//ログイン無しで見れるページ
Route::get('/open/{uniqcode}', [\App\Http\Controllers\OpenController::class, 'index'])->name('top');


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
        Route::get('/pay', [\App\Http\Controllers\Admin\PayController::class, 'index'])->name('pay');
        Route::get('/info', [\App\Http\Controllers\Admin\InfoController::class, 'index'])->name('info');
        Route::get('/info/new', [\App\Http\Controllers\Admin\InfoController::class, 'new'])->name('infonew');
        Route::get('/invoice', [\App\Http\Controllers\Admin\InvoiceController::class, 'index'])->name('invoice');
        Route::get('/sponser', [\App\Http\Controllers\Admin\SponserController::class, 'index'])->name('sponser');
        Route::get('/sponser/new', [\App\Http\Controllers\Admin\SponserController::class, 'new'])->name('sponsernew');
    });
   // Route::match(['get', 'post'],'/login',function(){ return view('auth.login'); });
});
