<?php

namespace App\Http\Controllers\Admin;

use App\Consts\ClassConsts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DefineFee;
use App\Models\Account;
use App\Models\DefineSpaceList;

class JoinController extends Controller
{

    //
    public function index($id)
    {

        return view('admin.main', [
            'id' => $id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,

        ]);
    }

    public function new($id)
    {
        $this->class->getDefine($id);

        return view('admin.new', [
            'id' => $id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
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

    public function post($id, Request $request)
    {
        $account = new Account();
        $account->setconf($id, $request);

        $fee = DefineFee::getData($id);
        $prices = DefineSpaceList::calcFees($id,$request,$fee);
        if($lastid = $account->setData($id, $request, $prices["join_fee"], $prices["party_fee"]))
        {

            session()->flash('flash_msg', '会員登録を行いました。');
            return redirect(route('join', ['id' => $id ]));
        }else{
            session()->flash('flash_error', '会員登録に失敗しました。');
            return redirect(route('joinnew', ['id' => $id ]));

        }

    }
}
