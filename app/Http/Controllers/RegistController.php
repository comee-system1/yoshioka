<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\DefineFee;
use App\Models\DefineJoinTitle;
use App\Models\DefineSpaceList;
use App\Consts\ClassConsts;
use Stripe\Stripe;
use Stripe\Charge;
use App\Mail\RegisterMail;
use App\Models\DefineMail;
use App\Models\DefineMyPage;
use App\Models\DefinePasswordRenew;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistController extends ControllerOpen
{
    public function __construct(Request $request)
    {
        $this->pageCheck($request);
        $this->defineMypage = DefineMyPage::getDataOpen($request->id);
    }

    public function index($id, $uniqcode)
    {

        $this->class->getDefine($id);

        return view('open.regist', [
            'id' => $id,
            'uniqcode' => $uniqcode,
            'seminer' => $this->seminer[0],
            'fee' => DefineFee::getData($id),
            'accountSelect' => ClassConsts::createArray($this->class->accountSelect),
            'accountSelectFee' => ClassConsts::createArrayFee($this->class->accountSelect),
            'title' => $this->class->title,
            'account_type' => $this->class->account_type,
            'account_input' => $this->class->account_input,
            'join' => $this->class->join,
            'party' => $this->class->party,
            'party_flag' => $this->class->party_flag,
            'button' => (session()->get('language') == 'EN' )? $this->class->button->title2 : $this->class->button->title
        ]);
    }

    public function conf($id, $uniqcode, Request $request)
    {
        $accountdata = Auth::guard('account')->user();
        $this->class->getDefine($id);
        $account = new Account();
        $account->setconf($id, $request, $accountdata->id??'');

        return view('open.conf', [
            'id' => $id,
            'uniqcode' => $uniqcode,
            'seminer' => $this->seminer[0],
            'accountdata' => $accountdata,
            'defineMypage' => $this->defineMypage,
            'fee' => DefineFee::getData($id),
            'accountSelect' => ClassConsts::createArray($this->class->accountSelect),
            'accountSelectFee' => ClassConsts::createArrayFee($this->class->accountSelect),
            'title' => $this->class->title,
            'account_type' => $this->class->account_type,
            'account_input' => $this->class->account_input,
            'join' => $this->class->join,
            'party' => $this->class->party,
            'party_flag' => $this->class->party_flag,
            'button' => $this->class->button->title,
            'back_button' => session()->get('language') == 'EN' ? $this->class->back_button->title2 : $this->class->back_button->title,
            'regist_button' => session()->get('language') == 'EN' ? $this->class->regist_button->title2 : $this->class->regist_button->title,
            'request' => $request,
            'price' => DefineSpaceList::calcFee($id,$request),
        ]);

    }

    public function post($id, $uniqcode, Request $request)
    {

        $accountdata = Auth::guard('account')->user();
        $join_success = DefineJoinTitle::getDataType($id, 'join_success')->first();
        $join_miss = DefineJoinTitle::getDataType($id, 'join_success')->first();
        $account = new Account();
        $fee = DefineFee::getData($id);
        $prices = DefineSpaceList::calcFees($id,$request,$fee);

        if($accountdata) {
            $account->editData($id, $request, $prices["join_fee"], $prices["party_fee"], $accountdata->id);
            $lastid = $accountdata->id;
        }else{
            $lastid = $account->setData($id, $request, $prices["join_fee"], $prices["party_fee"]);
        }

        if($lastid)
        {
            //メール配信
            $mailData = DefineMail::getData($id,'join');
            $accountData = Account::getAccount($lastid);
            $mail = [];
            $mail['address'] = $accountData->email;
            if(session()->get('language') == 'EN'){
                $mail['body'] = DefineMail::textReplace($mailData->body2, $accountData, $id);
                $mail['title'] = DefineMail::textReplace($mailData->subject2, $accountData, $id);
            } else {
                $mail['body'] = DefineMail::textReplace($mailData->body, $accountData, $id);
                $mail['title'] = DefineMail::textReplace($mailData->subject, $accountData, $id);
            }
            Mail::send(new RegisterMail($mail));

            if($fee->stripe_status && $accountData->payment_flag == 0 )
            {
                $amount = $prices["join_fee"]+$prices["party_fee"];
                //シークレットキー
                Stripe::setApiKey($fee->stripekey_secret);
                $charge = Charge::create(array(
                    'amount' => $amount,
                    'currency' => 'jpy',
                    'source'=> request()->stripeToken,
                ));
                $account->setPayment($lastid);
            }
            if(session()->get('language') == 'EN') {
                session()->flash('flash_msg', $join_success->title2);
            } else {
                session()->flash('flash_msg', $join_success->title);
            }
            if($accountdata){
                return redirect(route('account.edit', ['id' => $id, 'uniqcode' => $uniqcode]));
            }else{
                return redirect(route('signin', ['id' => $id, 'uniqcode' => $uniqcode]));
            }

        }else{
            session()->flash('flash_error', $join_miss->title);
        }
    }

    public function edit($id, $uniqcode)
    {
        $this->class->getDefine($id);
        $accountdata = Auth::guard('account')->user();
        return view('open.edit', [
            'id' => $id,
            'account_id' => $accountdata->id,
            'accountdata' => $accountdata,
            'defineMypage' => $this->defineMypage,
            'uniqcode' => $uniqcode,
            'seminer' => $this->seminer[0],
            'fee' => DefineFee::getData($id),
            'accountSelect' => ClassConsts::createArray($this->class->accountSelect),
            'accountSelectFee' => ClassConsts::createArrayFee($this->class->accountSelect),
            'title' => $this->class->title,
            'account_type' => $this->class->account_type,
            'account_input' => $this->class->account_input,
            'join' => $this->class->join,
            'party' => $this->class->party,
            'party_flag' => $this->class->party_flag,
            'button' => session()->get('language') == 'EN' ? $this->class->button->title2 : $this->class->button->title,
            'back_button' => session()->get('language') == 'EN' ? $this->class->back_button->title2 : $this->class->back_button->title,
            'password_edit' => $this->class->password_edit,
            'regist_button' => session()->get('language') == 'EN' ? : $this->class->regist_button->title,

        ]);
    }

    public function renew($id, $uniqcode)
    {
        $definePassword = DefinePasswordRenew::getData($id);

        return view('open.renew', [
            'id' => $id,
            'uniqcode' => $uniqcode,
            'seminer' => $this->seminer[0],
            'definePassword' => $definePassword
        ]);
    }

    public function renewpost($id, $uniqcode, Request $request)
    {

        $definePassword = DefinePasswordRenew::getData($id);

        $where = [];
        $where[ 'seminer_id' ] = $id;
        $where[ 'email' ] = $request->email;
        $accountData = Account::getAccountData($where)->first();
        if($accountData){
            $password = "";
            for($i=1;$i<=5;$i++){
                $password .= chr(mt_rand(65,90));
            }
            $accountData->password = Hash::make($password);
            $accountData->save();
            session()->flash('flash_msg', session()->get('language') == 'EN' ? $definePassword['renew_success']->title2 : $definePassword['renew_success']->title);
            $this->sendMail($id, $password, $accountData);
        }else{
            session()->flash('flash_error', session()->get('language') == 'EN' ? $definePassword['renew_miss']->title2 : $definePassword['renew_miss']->title );
        }

        return redirect(route('regist.renew', ['id' => $id, 'uniqcode' => $uniqcode]));

    }

    public function sendMail($id, $password, $accountData){
        //メール配信
        $defineMail = DefineMail::getData($id, 'password_renew');
        $accountData['password'] = $password;
        $mail = [];
        $mail['address'] = $accountData->email;
        $mail['body'] = DefineMail::textReplacePassword(session()->get( 'language' ) == 'EN' ? $defineMail->body2 : $defineMail->body, $accountData);
        $mail['title'] = DefineMail::textReplacePassword(session()->get( 'language' ) == 'EN' ?$defineMail->subject2 : $defineMail->subject, $accountData);
        Mail::send(new RegisterMail($mail));
    }

}
