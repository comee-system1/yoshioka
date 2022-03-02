<?php

namespace App\Http\Controllers\Admin;

use App\Consts\ClassConsts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DefineFee;
use App\Models\Account;
use App\Models\DefineJoinTitle;
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
            'defineJoinTitle'=>DefineJoinTitle::getDataJoinTitleType($id),
        ]);
    }

    public function password($id, $account_id)
    {
        return view('admin.password', [
            'id' => $id,
            'account_id' => $account_id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
        ]);
    }

    public function password_edit($id, $account_id, Request $request){
        if(Account::editPassword($id, $account_id, $request))
        {
            session()->flash('flash_msg', 'パスワード更新を行いました。');
            return redirect(route('join.password.post', ['id' => $id, 'account_id' => $account_id]));
        }else{
            session()->flash('flash_error', 'パスワード更新に失敗しました。');
            return redirect(route('join.password.post', ['id' => $id, 'account_id' => $account_id]));
        }
    }

    public function list($id, Request $request)
    {
        $data = Account::getAccounts($id, $request);
        $return[ 'list' ] = $data[ 'list' ]->all();
        $return[ 'last' ] = $data[ 'last' ];
        return response()->json($data);
    }

    public function new($id)
    {
        $this->class->getDefine($id);

        return view('admin.new', [
            'id' => $id,
            'accountdata' => [],
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
            'button' => $this->class->button->title,
            'defineJoinTitle'=>DefineJoinTitle::getDataJoinTitleType($id),
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

    public function edit($id, $account_id){

        $this->class->getDefine($id);
        $accountdata = Account::where([ 'seminer_id'=>$id, 'id'=>$account_id, 'status'=>1  ])->first();

        return view('admin.edit', [
            'id' => $id,
            'account_id' => $account_id,
            'accountdata' => $accountdata,
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
            'button' => $this->class->button->title,
            'password_edit' => $this->class->password_edit,
            'defineJoinTitle'=>DefineJoinTitle::getDataJoinTitleType($id),

        ]);
    }

    public function editpost($id, $account_id, Request $request){

        $account = new Account();
        $account->setconf($id, $request, $account_id);
        $fee = DefineFee::getData($id);
        $prices = DefineSpaceList::calcFees($id,$request,$fee);
        if($account->editData($id, $request, $prices["join_fee"], $prices["party_fee"], $account_id))
        {
            session()->flash('flash_msg', '会員登録を行いました。');
            return redirect(route('join', ['id' => $id ]));
        }else{
            session()->flash('flash_error', '会員登録に失敗しました。');
            return redirect(route('joinnew', ['id' => $id ]));
        }
    }

    public function delete($id, $account_id)
    {
        if(Account::deleteAccount($id, $account_id)){
            session()->flash('flash_msg', '会員情報の削除をおこないました。');
        }else{
            session()->flash('flash_error', '会員情報の削除に失敗しました。');
        }
        return redirect(route('join', ['id' => $id ]));
    }

    public function payment($id ,Request $request)
    {
        Account::setPaymentAdmin($id, $request);
    }

    public function csv($id)
    {

        $where = [
            'account_type',
            'name',
            'name_kana',
            'email',
            'company',
            'tel',
            'address',
            'area',
        ];
        $accountType = DefineSpaceList::getDataMaster($id);
        $clum = DefineJoinTitle::getDataType($id, $where)->where('display_status',1)->get();
        $head = [];
        $useclum = [];
        foreach($clum as $value){
            $head[] = $value->title;
            $useclum[] = $value->type;
        }
        array_push($head, "支払い" );
        array_push($useclum, "payment_flag" );
        $accounts = Account::getCsvData($id, $useclum);
        $users = [];
        $i=0;
        foreach($accounts as $value){
            foreach($useclum as $val){
                if($val == "account_type"){
                    $users[$i][$val] = $accountType[ $value->$val ]->text;
                }else
                if($val == "payment_flag"){
                    $users[$i][$val] = ($value->$val == 1)?"支払済み":"未払い";
                }else{
                    $users[$i][$val] = "'".$value->$val;
                }
            }
            $i++;
        }
        $filename = date("Ymdhis").".csv";
        // 書き込み用ファイルを開く
        $f = fopen($filename, 'w');
        if ($f) {
            // カラムの書き込み
            mb_convert_variables('SJIS', 'UTF-8', $head);
            fputcsv($f, $head);
            // データの書き込み
            foreach ($users as $user) {
            mb_convert_variables('SJIS', 'UTF-8', $user);
            fputcsv($f, $user);
            }
        }
        // ファイルを閉じる
        fclose($f);

        // HTTPヘッダ
        header("Content-Type: application/octet-stream");
        header('Content-Length: '.filesize($filename));
        header('Content-Disposition: attachment; filename='.$filename);
        readfile($filename);

    }
}
