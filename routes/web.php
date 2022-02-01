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
Route::get('/open/{type}/{uniqcode}', [\App\Http\Controllers\OpenController::class, 'index'])->name('top');
Route::get('/open/{type}/signin/{uniqcode}', [\App\Http\Controllers\SigninController::class, 'index'])->name('signin');
Route::post('/open/{type}/signin/', [\App\Http\Controllers\SigninController::class, 'post'])->name('signin.post');
Route::get('/open/{type}/regist/{uniqcode}', [\App\Http\Controllers\RegistController::class, 'index'])->name('regist');
Route::post('/open/{type}/regist/{uniqcode}', [\App\Http\Controllers\RegistController::class, 'post'])->name('regist.post');

Route::group(['middleware' => ['account']], function () {
    Route::get('/open/{type}/signout/{uniqcode}', [\App\Http\Controllers\SigninController::class, 'signout'])->name('signout');
    Route::get('/open/{type}/account/{uniqcode}', [\App\Http\Controllers\AccountController::class, 'index'])->name('account');
    Route::get('/open/{type}/regist/{uniqcode}/edit/', [\App\Http\Controllers\RegistController::class, 'edit'])->name('account.edit');
    Route::post('/open/{type}/regist/{uniqcode}/edit/', [\App\Http\Controllers\RegistController::class, 'post'])->name('account.post');
    Route::get('/open/{type}/endai/{uniqcode}/list', [\App\Http\Controllers\EndaiController::class, 'list'])->name('account.endai.list');
    Route::get('/open/{type}/endai/{uniqcode}/new', [\App\Http\Controllers\EndaiController::class, 'new'])->name('account.endai.new');
    Route::get('/open/{type}/recipe/{uniqcode}', [\App\Http\Controllers\RecipeController::class, 'index'])->name('account.recipe');
    Route::get('/open/{type}/program/{uniqcode}', [\App\Http\Controllers\ProgramController::class, 'index'])->name('account.program');
});

//配列
Route::any('/getSpaceList', [\App\Http\Controllers\ArrayController::class, 'getSpaceList'])->name('Array.space');
Route::group(['prefix' => 'admin'], function () {
    //ログインしないと見えないページ
    Route::group(['middleware' => ['auth']], function () {
        //Route::match(['get', 'post'],'/',function(){ return view('home')->name('home'); });
        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
        Route::post('/saveData', [\App\Http\Controllers\Admin\HomeController::class, 'saveData'])->name('saveData');
        Route::any('/getEditData/{id}', [\App\Http\Controllers\Admin\HomeController::class, 'getEditData'])->name('getEditData');
        Route::post('/deleteData', [\App\Http\Controllers\Admin\HomeController::class, 'deleteData'])->name('deleteData');
        Route::post('/editStatusData', [\App\Http\Controllers\Admin\HomeController::class, 'editStatusData'])->name('editStatusData');
        Route::get('/getDataLists', [\App\Http\Controllers\Admin\HomeController::class, 'getDataLists'])->name('getDataLists');
        Route::get('/join/{id}', [\App\Http\Controllers\Admin\JoinController::class, 'index'])->name('join');
        Route::get('/join/new/{id}', [\App\Http\Controllers\Admin\JoinController::class, 'new'])->name('joinnew');
        Route::get('/endai', [\App\Http\Controllers\Admin\EndaiController::class, 'index'])->name('endai');
        Route::get('/endai/new', [\App\Http\Controllers\Admin\EndaiController::class, 'new'])->name('endainew');
        Route::get('/time', [\App\Http\Controllers\Admin\TimeController::class, 'index'])->name('time');
        Route::get('/pay', [\App\Http\Controllers\Admin\PayController::class, 'index'])->name('pay');
        Route::get('/info', [\App\Http\Controllers\Admin\InfoController::class, 'index'])->name('info');
        Route::get('/info/new', [\App\Http\Controllers\Admin\InfoController::class, 'new'])->name('infonew');
        Route::get('/invoice', [\App\Http\Controllers\Admin\InvoiceController::class, 'index'])->name('invoice');
        Route::get('/sponser', [\App\Http\Controllers\Admin\SponserController::class, 'index'])->name('sponser');
        Route::get('/sponser/new', [\App\Http\Controllers\Admin\SponserController::class, 'new'])->name('sponsernew');
        Route::get('/master', [\App\Http\Controllers\Admin\MasterController::class, 'index'])->name('master');
    });
   // Route::match(['get', 'post'],'/login',function(){ return view('auth.login'); });
});
