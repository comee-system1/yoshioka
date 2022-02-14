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
Route::get('/open/{id}/{uniqcode}', [\App\Http\Controllers\OpenController::class, 'index'])->name('top');
Route::get('/open/{id}/{uniqcode}/signin', [\App\Http\Controllers\SigninController::class, 'index'])->name('signin');
Route::post('/open/{id}/signin/', [\App\Http\Controllers\SigninController::class, 'post'])->name('signin.post');
Route::get('/open/{id}/{uniqcode}/regist', [\App\Http\Controllers\RegistController::class, 'index'])->name('regist');
Route::post('/open/{id}/{uniqcode}/conf', [\App\Http\Controllers\RegistController::class, 'conf'])->name('regist.conf');
Route::post('/open/{id}/{uniqcode}/regist', [\App\Http\Controllers\RegistController::class, 'post'])->name('regist.post');

Route::group(['middleware' => ['account']], function () {
    Route::get('/open/{id}/signout/{uniqcode}', [\App\Http\Controllers\SigninController::class, 'signout'])->name('signout');
    Route::get('/open/{id}/account/{uniqcode}', [\App\Http\Controllers\AccountController::class, 'index'])->name('account');
    Route::get('/open/{id}/regist/{uniqcode}/edit/', [\App\Http\Controllers\RegistController::class, 'edit'])->name('account.edit');
    Route::post('/open/{id}/regist/{uniqcode}/edit/', [\App\Http\Controllers\RegistController::class, 'post'])->name('account.post');
    Route::get('/open/{id}/endai/{uniqcode}/list', [\App\Http\Controllers\EndaiController::class, 'list'])->name('account.endai.list');
    Route::get('/open/{id}/endai/{uniqcode}/new', [\App\Http\Controllers\EndaiController::class, 'new'])->name('account.endai.new');
    Route::get('/open/{id}/recipe/{uniqcode}', [\App\Http\Controllers\RecipeController::class, 'index'])->name('account.recipe');
    Route::get('/open/{id}/program/{uniqcode}', [\App\Http\Controllers\ProgramController::class, 'index'])->name('account.program');
});

//配列
Route::any('/getSpaceList', [\App\Http\Controllers\ArrayController::class, 'getSpaceList'])->name('Array.space');
Route::any('/getMailType', [\App\Http\Controllers\ArrayController::class, 'getMailType'])->name('Array.getMailType');
Route::any('/getType', [\App\Http\Controllers\ArrayController::class, 'getType'])->name('Array.getType');
Route::any('/getSpaceLists/{id}', [\App\Http\Controllers\ArrayController::class, 'getSpaceLists'])->name('Array.spaces');
Route::any('/getPlaceLists/{id}', [\App\Http\Controllers\ArrayController::class, 'getPlaceLists'])->name('Array.places');
Route::any('/getPresentationLists/{id}', [\App\Http\Controllers\ArrayController::class, 'getPresentationLists'])->name('Array.presentaions');
Route::any('/getDateLists/{id}', [\App\Http\Controllers\ArrayController::class, 'getDateLists'])->name('Array.getDateLists');

Route::group(['prefix' => 'admin'], function () {
    //ログインしないと見えないページ
    Route::group(['middleware' => ['auth']], function () {
        //Route::match(['get', 'post'],'/',function(){ return view('home')->name('home'); });
        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
        Route::any('/saveData', [\App\Http\Controllers\Admin\HomeController::class, 'saveData'])->name('saveData');
        Route::any('/getEditData/{id}', [\App\Http\Controllers\Admin\HomeController::class, 'getEditData'])->name('getEditData');
        Route::post('/deleteData', [\App\Http\Controllers\Admin\HomeController::class, 'deleteData'])->name('deleteData');
        Route::post('/editStatusData', [\App\Http\Controllers\Admin\HomeController::class, 'editStatusData'])->name('editStatusData');
        Route::get('/getDataLists', [\App\Http\Controllers\Admin\HomeController::class, 'getDataLists'])->name('getDataLists');
        Route::get('/join/{id}', [\App\Http\Controllers\Admin\JoinController::class, 'index'])->name('join');
        Route::any('/join/list/{id}', [\App\Http\Controllers\Admin\JoinController::class, 'list'])->name('join.list');
        Route::any('/join/payment/{id}', [\App\Http\Controllers\Admin\JoinController::class, 'payment'])->name('join.payment');
        Route::get('/join/new/{id}', [\App\Http\Controllers\Admin\JoinController::class, 'new'])->name('joinnew');
        Route::post('/join/new/{id}', [\App\Http\Controllers\Admin\JoinController::class, 'post'])->name('joinnew.post');
        Route::get('/join/edit/{id}/{account_id}', [\App\Http\Controllers\Admin\JoinController::class, 'edit'])->name('join.edit');
        Route::post('/join/edit/{id}/{account_id}', [\App\Http\Controllers\Admin\JoinController::class, 'editpost'])->name('join.editpost');
        Route::get('/join/edit/password/{id}/{account_id}', [\App\Http\Controllers\Admin\JoinController::class, 'password'])->name('join.password');
        Route::post('/join/edit/password/{id}/{account_id}', [\App\Http\Controllers\Admin\JoinController::class, 'password_edit'])->name('join.password.post');
        Route::get('/endai/{id}', [\App\Http\Controllers\Admin\EndaiController::class, 'index'])->name('endai');
        Route::get('/endai/new/{id}', [\App\Http\Controllers\Admin\EndaiController::class, 'new'])->name('endainew');
        Route::get('/time/{id}', [\App\Http\Controllers\Admin\TimeController::class, 'index'])->name('time');
        Route::post('/getTimeTable', [\App\Http\Controllers\Admin\TimeController::class, 'getTimeTable'])->name('time.getTimeTable');
        Route::post('/setTimeTable', [\App\Http\Controllers\Admin\TimeController::class, 'setTimeTable'])->name('time.setTimeTable');
        Route::get('/book/{id}', [\App\Http\Controllers\Admin\BookController::class, 'index'])->name('book');
        Route::post('/book/upload/{id}', [\App\Http\Controllers\Admin\BookController::class, 'upload'])->name('book.upload');
        Route::get('/pay/{id}', [\App\Http\Controllers\Admin\PayController::class, 'index'])->name('pay');
        Route::post('/pay/{id}', [\App\Http\Controllers\Admin\PayController::class, 'post'])->name('pay.post');
        Route::get('/info/{id}', [\App\Http\Controllers\Admin\InfoController::class, 'index'])->name('info');
        Route::get('/info/new/{id}', [\App\Http\Controllers\Admin\InfoController::class, 'new'])->name('infonew');
        Route::get('/invoice/{id}', [\App\Http\Controllers\Admin\InvoiceController::class, 'index'])->name('invoice');
        Route::get('/sponser/{id}', [\App\Http\Controllers\Admin\SponserController::class, 'index'])->name('sponser');
        Route::get('/sponser/new/{id}', [\App\Http\Controllers\Admin\SponserController::class, 'new'])->name('sponsernew');
        Route::get('/master/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'index'])->name('master');
        Route::get('/master/endai/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'endai'])->name('master.endai');
        Route::get('/master/time/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'time'])->name('master.time');
        Route::get('/master/book/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'book'])->name('master.book');
        Route::get('/master/mail/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'mail'])->name('master.mail');


        Route::get('/master/define/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'define'])->name('master.define');
        Route::post('/master/edit/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'edit'])->name('master.edit');

        Route::get('/master/defineEndai/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'defineEndai'])->name('master.define.endai');
        Route::post('/master/editEndai/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'editEndai'])->name('master.edit.endai');

        Route::get('/master/defineTime/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'defineTime'])->name('master.define.time');
        Route::post('/master/editTime/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'editTime'])->name('master.edit.time');


        Route::get('/master/defineBook/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'defineBook'])->name('master.define.book');
        Route::post('/master/defineEditBook/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'defineEditBook'])->name('master.define.editbook');

        Route::get('/master/getMailReplace/{id}/{type?}', [\App\Http\Controllers\Admin\MasterController::class, 'getMailReplace'])->name('master.define.getMailReplace');
        Route::get('/master/getMail/{id}/{type?}', [\App\Http\Controllers\Admin\MasterController::class, 'getMail'])->name('master.define.getMail');
        Route::post('/master/editMail/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'editMail'])->name('master.define.editMail');

    });
   // Route::match(['get', 'post'],'/login',function(){ return view('auth.login'); });
});
