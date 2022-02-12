<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\DefineFee;
use App\Models\DefineJoinTitle;
use App\Models\DefineSpaceList;
use Stripe\Stripe;
use Stripe\Charge;



class RegistController extends ControllerOpen
{
    public function __construct(Request $rquest)
    {
        $this->pageCheck($rquest);
    }

    public function getDefine($id)
    {

        $this->accountSelect = DefineSpaceList::getDataAccount($id);
        $this->title = DefineJoinTitle::getDataType($id, 'title')->first();
        $this->button = DefineJoinTitle::getDataType($id, 'button')->first();
        $this->regist_button = DefineJoinTitle::getDataType($id, 'regist_button')->first();
        $this->back_button = DefineJoinTitle::getDataType($id, 'back_button')->first();
        $this->account_type = DefineJoinTitle::getDataType($id, 'select')->first();
        $this->join = DefineJoinTitle::getDataType($id, 'join')->first();
        $this->party = DefineJoinTitle::getDataType($id, 'party')->first();
        $this->party_flag = DefineJoinTitle::getDataType($id, 'party_flag')->first();
        $this->account_input = DefineJoinTitle::getDataType($id, ['name', 'name_kana', 'email', 'password', 'company', 'tel', 'address', 'area' ])->get();
    }
    //
    public function index($id, $uniqcode)
    {

        //メール配信




        $this->getDefine($id);

        return view('open.regist', [
            'id' => $id,
            'uniqcode' => $uniqcode,
            'seminer' => $this->seminer[0],
            'fee' => DefineFee::getData($id),
            'accountSelect' => self::createArray($this->accountSelect),
            'accountSelectFee' => self::createArrayFee($this->accountSelect),
            'title' => $this->title,
            'account_type' => $this->account_type,
            'account_input' => $this->account_input,
            'join' => $this->join,
            'party' => $this->party,
            'party_flag' => $this->party_flag,
            'button' => $this->button->title
        ]);
    }

    public static function createArray($array){
        $return = [];
        foreach($array as $key=>$value){
            $return[$value->master_id] = $value->text;
        }
        return $return;
    }

    public static function createArrayFee($array){
        $return = [];
        foreach($array as $key=>$value){
            $return[$value->master_id][ 'text'  ] = $value->text;
            $return[$value->master_id][ 'join_fee'  ] = $value->join_fee;
            $return[$value->master_id][ 'join_fee_yen'  ] = number_format($value->join_fee);
            $return[$value->master_id][ 'party_fee' ] = $value->party_fee;
            $return[$value->master_id][ 'party_fee_yen'  ] = number_format($value->party_fee);
        }
        return $return;
    }

    public function conf($id, $uniqcode, Request $request)
    {
        $this->getDefine($id);
        $account = new Account();
        $account->setconf($id, $request);
        return view('open.conf', [
            'id' => $id,
            'uniqcode' => $uniqcode,
            'seminer' => $this->seminer[0],
            'fee' => DefineFee::getData($id),
            'accountSelect' => self::createArray($this->accountSelect),
            'accountSelectFee' => self::createArrayFee($this->accountSelect),
            'title' => $this->title,
            'account_type' => $this->account_type,
            'account_input' => $this->account_input,
            'join' => $this->join,
            'party' => $this->party,
            'party_flag' => $this->party_flag,
            'button' => $this->button->title,
            'back_button' => $this->back_button->title,
            'regist_button' => $this->regist_button->title,
            'request' => $request,
            'price' => DefineSpaceList::calcFee($id,$request),
        ]);

    }

    public function post($id, $uniqcode, Request $request)
    {

        $account = new Account();
        $fee = DefineFee::getData($id);

        $prices = DefineSpaceList::calcFees($id,$request,$fee);
        if($account->setData($id, $request, $prices["join_fee"], $prices["party_fee"]))
        {
            if($fee->stripe_status)
            {
                //シークレットキー
                Stripe::setApiKey($fee->stripekey_secret);
                $charge = Charge::create(array(
                    'amount' => 100,
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
