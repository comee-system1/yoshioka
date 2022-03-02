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
Route::post('/open/{id}/{uniqcode}/signin/', [\App\Http\Controllers\SigninController::class, 'post'])->name('signin.post');
Route::get('/open/{id}/{uniqcode}/regist', [\App\Http\Controllers\RegistController::class, 'index'])->name('regist');
Route::get('/open/{id}/{uniqcode}/regist/renew', [\App\Http\Controllers\RegistController::class, 'renew'])->name('regist.renew');
Route::post('/open/{id}/{uniqcode}/regist/renew', [\App\Http\Controllers\RegistController::class, 'renewpost'])->name('regist.renew.post');
Route::post('/open/{id}/{uniqcode}/conf', [\App\Http\Controllers\RegistController::class, 'conf'])->name('regist.conf');
Route::post('/open/{id}/{uniqcode}/regist', [\App\Http\Controllers\RegistController::class, 'post'])->name('regist.post');

Route::group(['middleware' => ['account']], function () {
    Route::get('/open/{id}/{uniqcode}/signout', [\App\Http\Controllers\SigninController::class, 'signout'])->name('signout');
    Route::get('/open/{id}/{uniqcode}/account', [\App\Http\Controllers\AccountController::class, 'index'])->name('account');
    Route::get('/open/{id}/{uniqcode}/account/edit/', [\App\Http\Controllers\RegistController::class, 'edit'])->name('account.edit');
    Route::post('/open/{id}/{uniqcode}/account/conf/', [\App\Http\Controllers\RegistController::class, 'conf'])->name('account.conf');
    Route::post('/open/{id}/{uniqcode}/account/', [\App\Http\Controllers\RegistController::class, 'post'])->name('account.post');
    Route::get('/open/{id}/{uniqcode}/endai/list', [\App\Http\Controllers\EndaiController::class, 'list'])->name('account.endai.list');
    Route::get('/open/{id}/{uniqcode}/endai/new', [\App\Http\Controllers\EndaiController::class, 'new'])->name('account.endai.new');
    Route::post('/open/{id}/{uniqcode}/endai/conf/{endai_id?}', [\App\Http\Controllers\EndaiController::class, 'conf'])->name('account.endai.conf');
    Route::post('/open/{id}/{uniqcode}/endai/post', [\App\Http\Controllers\EndaiController::class, 'post'])->name('account.endai.post');
    Route::get('/open/{id}/{uniqcode}/endai/edit/{endai_id}', [\App\Http\Controllers\EndaiController::class, 'edit'])->name('account.endai.edit');
    Route::post('/open/{id}/{uniqcode}/endai/edit/{endai_id}', [\App\Http\Controllers\EndaiController::class, 'editpost'])->name('account.endai.editpost');

    Route::get('/open/{id}/{uniqcode}/endai/delete/{endai_id}', [\App\Http\Controllers\EndaiController::class, 'delete'])->name('account.endai.delete');

    Route::get('/open/{id}/{account_id}/recipe', [\App\Http\Controllers\RecipeController::class, 'recipe'])->name('account.recipe');
    Route::get('/open/{id}/{account_id}/invoice', [\App\Http\Controllers\RecipeController::class, 'invoice'])->name('account.invoice');
    Route::get('/open/{id}/{uniqcode}/program/{place_master_id?}', [\App\Http\Controllers\ProgramController::class, 'index'])->name('account.program');
    Route::get('/open/{id}/{uniqcode}/book/download/', [\App\Http\Controllers\BookController::class, 'download'])->name('book.download');

});

//配列
Route::any('/getSpaceList', [\App\Http\Controllers\ArrayController::class, 'getSpaceList'])->name('Array.space');
Route::any('/getMailType', [\App\Http\Controllers\ArrayController::class, 'getMailType'])->name('Array.getMailType');
Route::any('/getType', [\App\Http\Controllers\ArrayController::class, 'getType'])->name('Array.getType');
Route::any('/getSendFlag', [\App\Http\Controllers\ArrayController::class, 'getSendFlag'])->name('Array.getSendFlag');
Route::any('/getSpaceLists/{id}', [\App\Http\Controllers\ArrayController::class, 'getSpaceLists'])->name('Array.spaces');
Route::any('/getPlaceLists/{id}', [\App\Http\Controllers\ArrayController::class, 'getPlaceLists'])->name('Array.places');
Route::any('/getPresentationLists/{id}', [\App\Http\Controllers\ArrayController::class, 'getPresentationLists'])->name('Array.presentaions');
Route::any('/getDateLists/{id}', [\App\Http\Controllers\ArrayController::class, 'getDateLists'])->name('Array.getDateLists');
Route::any('/getEndai/{id}/{endai_id}', [\App\Http\Controllers\ArrayController::class, 'getEndai'])->name('Array.getEndai');
Route::any('/getSponser/{id}', [\App\Http\Controllers\ArrayController::class, 'getSponser'])->name('Array.getSponser');
Route::any('/getTitle/{id}', [\App\Http\Controllers\ArrayController::class, 'getTitle'])->name('Array.getTitle');
Route::any('/getMypage/{id}', [\App\Http\Controllers\ArrayController::class, 'getMypage'])->name('Array.getMypage');
Route::any('/getPassword/{id}', [\App\Http\Controllers\ArrayController::class, 'getPassword'])->name('Array.getPassword');

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
        Route::get('/join/csv/{id}', [\App\Http\Controllers\Admin\JoinController::class, 'csv'])->name('join.csv');
        Route::any('/join/list/{id}', [\App\Http\Controllers\Admin\JoinController::class, 'list'])->name('join.list');
        Route::get('/join/delete/{id}/{account_id}', [\App\Http\Controllers\Admin\JoinController::class, 'delete'])->name('join.delete');
        Route::any('/join/payment/{id}', [\App\Http\Controllers\Admin\JoinController::class, 'payment'])->name('join.payment');
        Route::get('/join/new/{id}', [\App\Http\Controllers\Admin\JoinController::class, 'new'])->name('joinnew');
        Route::post('/join/new/{id}', [\App\Http\Controllers\Admin\JoinController::class, 'post'])->name('joinnew.post');
        Route::get('/join/edit/{id}/{account_id}', [\App\Http\Controllers\Admin\JoinController::class, 'edit'])->name('join.edit');
        Route::post('/join/edit/{id}/{account_id}', [\App\Http\Controllers\Admin\JoinController::class, 'editpost'])->name('join.editpost');
        Route::get('/join/edit/password/{id}/{account_id}', [\App\Http\Controllers\Admin\JoinController::class, 'password'])->name('join.password');
        Route::post('/join/edit/password/{id}/{account_id}', [\App\Http\Controllers\Admin\JoinController::class, 'password_edit'])->name('join.password.post');
        Route::get('/endai/{id}', [\App\Http\Controllers\Admin\EndaiController::class, 'index'])->name('endai');
        Route::get('/endai/accountList/{id}', [\App\Http\Controllers\Admin\EndaiController::class, 'accountList'])->name('endai.accountList');
        Route::any('/endai/list/{id}', [\App\Http\Controllers\Admin\EndaiController::class, 'list'])->name('endai.list');
        Route::get('/endai/new/{id}', [\App\Http\Controllers\Admin\EndaiController::class, 'new'])->name('endainew');
        Route::post('/endai/new/{id}', [\App\Http\Controllers\Admin\EndaiController::class, 'post'])->name('endainew.post');
        Route::get('/endai/edit/{id}/{endai_id}', [\App\Http\Controllers\Admin\EndaiController::class, 'edit'])->name('endai.edit');
        Route::post('/endai/edit/{id}/{endai_id}', [\App\Http\Controllers\Admin\EndaiController::class, 'editpost'])->name('endai.edit.post');
        Route::get('/endai/delete/{id}/{endai_id}', [\App\Http\Controllers\Admin\EndaiController::class, 'delete'])->name('endai.delete');
        Route::get('/time/{id}', [\App\Http\Controllers\Admin\TimeController::class, 'index'])->name('time');
        Route::post('/time/{id}', [\App\Http\Controllers\Admin\TimeController::class, 'post'])->name('time.post');
        Route::get('/time/endai/{id}/{endai_id}', [\App\Http\Controllers\Admin\TimeController::class, 'endai'])->name('time.endai');
        Route::post('/getTimeTable', [\App\Http\Controllers\Admin\TimeController::class, 'getTimeTable'])->name('time.getTimeTable');
        Route::post('/setTimeTable', [\App\Http\Controllers\Admin\TimeController::class, 'setTimeTable'])->name('time.setTimeTable');
        Route::get('/book/{id}', [\App\Http\Controllers\Admin\BookController::class, 'index'])->name('book');
        Route::post('/book/upload/{id}', [\App\Http\Controllers\Admin\BookController::class, 'upload'])->name('book.upload');
        Route::get('/pay/{id}', [\App\Http\Controllers\Admin\PayController::class, 'index'])->name('pay');
        Route::post('/pay/{id}', [\App\Http\Controllers\Admin\PayController::class, 'post'])->name('pay.post');
        Route::get('/info/{id}', [\App\Http\Controllers\Admin\InfoController::class, 'index'])->name('info');
        Route::get('/info/new/{id}', [\App\Http\Controllers\Admin\InfoController::class, 'new'])->name('infonew');
        Route::post('/info/new/{id}', [\App\Http\Controllers\Admin\InfoController::class, 'post'])->name('infonew.post');
        Route::any('/info/list/{id}', [\App\Http\Controllers\Admin\InfoController::class, 'list'])->name('info.list');
        Route::any('/info/delete/{id}/{information_id}', [\App\Http\Controllers\Admin\InfoController::class, 'delete'])->name('info.delete');
        Route::get('/info/edit/{id}/{information_id}', [\App\Http\Controllers\Admin\InfoController::class, 'edit'])->name('info.edit');
        Route::post('/info/edit/{id}/{information_id}', [\App\Http\Controllers\Admin\InfoController::class, 'editpost'])->name('info.edit.post');
        Route::get('/invoice/{id}', [\App\Http\Controllers\Admin\InvoiceController::class, 'index'])->name('invoice');
        Route::post('/invoice/{id}', [\App\Http\Controllers\Admin\InvoiceController::class, 'post'])->name('invoice.post');
        Route::get('/sponser/{id}', [\App\Http\Controllers\Admin\SponserController::class, 'index'])->name('sponser');
        Route::get('/sponser/new/{id}', [\App\Http\Controllers\Admin\SponserController::class, 'new'])->name('sponsernew');
        Route::get('/sponser/edit/{id}/{sponser_id}', [\App\Http\Controllers\Admin\SponserController::class, 'edit'])->name('sponser.edit');
        Route::post('/sponser/edit/{id}/{sponser_id}', [\App\Http\Controllers\Admin\SponserController::class, 'editpost'])->name('sponser.edit.post');
        Route::post('/sponser/new/{id}', [\App\Http\Controllers\Admin\SponserController::class, 'post'])->name('sponser.post');
        Route::get('/sponser/delete/{id}/{sponser_id}', [\App\Http\Controllers\Admin\SponserController::class, 'delete'])->name('sponser.delete');
        Route::get('/master/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'index'])->name('master');
        Route::get('/master/endai/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'endai'])->name('master.endai');
        Route::get('/master/time/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'time'])->name('master.time');
        Route::get('/master/book/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'book'])->name('master.book');
        Route::get('/master/mail/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'mail'])->name('master.mail');
        Route::get('/master/password/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'password'])->name('master.password');


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

        Route::get('/master/invoice/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'invoice'])->name('master.invoice');
        Route::get('/master/defineInvoice/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'defineInvoice'])->name('master.defineInvoice');
        Route::any('/master/defineEditInvoice/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'defineEditInvoice'])->name('master.defineEditInvoice');

        Route::get('/master/title/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'title'])->name('master.title');
        Route::any('/master/title/edit/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'titleEdit'])->name('master.edit');

        Route::get('/master/mypage/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'mypage'])->name('master.mypage');
        Route::any('/master/mypage/edit/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'mypageEdit'])->name('master.mypageEdit');

        Route::get('/recipe/{id}/{account_id}/recipe', [\App\Http\Controllers\RecipeController::class, 'recipe'])->name('pdf.recipe');
        Route::get('/recipe/{id}/{account_id}/invoice', [\App\Http\Controllers\RecipeController::class, 'invoice'])->name('pdf.invoice');

        Route::post('/master/password/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'password'])->name('master.password.post');
        Route::post('/master/password/edit/{id}', [\App\Http\Controllers\Admin\MasterController::class, 'passwordEdit'])->name('master.password.edit');

    });
   // Route::match(['get', 'post'],'/login',function(){ return view('auth.login'); });
});
