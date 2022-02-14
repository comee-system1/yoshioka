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
use Illuminate\Support\Facades\Mail;


class RegistController extends ControllerOpen
{
    public function __construct(Request $rquest)
    {
        $this->pageCheck($rquest);
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
            'button' => $this->class->button->title
        ]);
    }



    public function conf($id, $uniqcode, Request $request)
    {
        $this->class->getDefine($id);
        $account = new Account();
        $account->setconf($id, $request);
        return view('open.conf', [
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
            'button' => $this->class->button->title,
            'back_button' => $this->class->back_button->title,
            'regist_button' => $this->class->regist_button->title,
            'request' => $request,
            'price' => DefineSpaceList::calcFee($id,$request),
        ]);

    }

    public function post($id, $uniqcode, Request $request)
    {

        $account = new Account();
        $fee = DefineFee::getData($id);

        $prices = DefineSpaceList::calcFees($id,$request,$fee);
        if($lastid = $account->setData($id, $request, $prices["join_fee"], $prices["party_fee"]))
        {
            //メール配信
            $mailData = DefineMail::getData($id,'join');
            $accountData = Account::getAccount($lastid);
            $mail = [];
            $mail['address'] = $accountData->email;
            $mail['body'] = DefineMail::textReplace($mailData->body, $accountData, $id);
            $mail['title'] = DefineMail::textReplace($mailData->subject, $accountData, $id);
            Mail::send(new RegisterMail($mail));

            if($fee->stripe_status)
            {
                $fee = $prices["join_fee"]+$prices["party_fee"];
                //シークレットキー
                Stripe::setApiKey($fee->stripekey_secret);
                $charge = Charge::create(array(
                    'amount' => $fee,
                    'currency' => 'jpy',
                    'source'=> request()->stripeToken,
                ));
            }
            session()->flash('flash_msg', '会員登録を行いました。');
            return redirect(route('signin', ['id' => $id, 'uniqcode' => $uniqcode]));
        }else{
            session()->flash('flash_error', '会員登録に失敗しました。');
        }
    }

    public function edit($type, $uniqcode)
    {

        return view('open.edit', [
            'type' => $type,
            'uniqcode' => $uniqcode
        ]);
    }
}
