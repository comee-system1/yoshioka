<?php

namespace App\Models;

use App\Consts\ClassConsts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Rules\AlphaNumHalf;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_kana',
        'email',
        'password',
        'area',
        'company',
        'tel',
        'address',
        'account_type',
    ];

    public static function getAccount($id)
    {
        return Account::where('id',$id)->first();
    }

    public static function getAccounts($id, $request)
    {
        $max = Account::where('seminer_id',$id)->where('status',1);
        if($request->join_name){
            $pat = '%' . addcslashes($request->join_name, '%_\\') . '%';
            $max = $max->where('name', 'LIKE', $pat );
        }
        if($request->join_email){
            $pat = '%' . addcslashes($request->join_email, '%_\\') . '%';
            $max = $max->where('email', 'LIKE', $pat );
        }
        $page = ($request->page)??1;
        $limit = ClassConsts::PAGE_LIMIT;
        $list = Account::select('*')
            ->selectRaw('DATE_FORMAT(updated_at, "%Y/%m/%d %H:%m:%i") AS date')
            ->where('seminer_id',$id)
            ->where('status','1');
        if($request->join_name){
            $pat = '%' . addcslashes($request->join_name, '%_\\') . '%';
            $list = $list->where('name', 'LIKE', $pat );
        }
        if($request->join_email){
            $pat = '%' . addcslashes($request->join_email, '%_\\') . '%';
            $list = $list->where('email', 'LIKE', $pat );
        }
        $list = $list->paginate($limit,['*'],'page',$page);

        $data[ 'list' ] = $list;
        $data['last' ] = ceil($max->count()/$limit);
        return $data;
    }

    public function setConf($id, $request, $account_id = 0)
    {
        $error_message = [];
        $validate = [];
        $define_join_titles = DefineJoinTitle::getDataType($id, $this->fillable)->get();
        //todo::openテーブルを作成後IDを取得後登録を行う
        foreach($define_join_titles as $value ){
            $key = $value->type;
            if( $value['required']){
                if($key == "password"){
                   // $validate[ $key ] = ['required', new AlphaNumHalf, 'min:8'];
                    if($account_id == 0 ){
                        $validate[ $key ] = ['required'];
                    }
                }else if($key == "email"){
                    if($account_id > 0){
                        $validate[ $key ] = ['required', 'string', 'email', 'max:255', Rule::unique('accounts', 'email')->where('seminer_id', $id)->ignore($account_id ) ];
                    }else{
                        $validate[ $key ] = ['required', 'string', 'email', 'max:255', Rule::unique('accounts', 'email')->where('seminer_id', $id) ];
                    }
                }else{
                    $validate[ $key ] = 'required';
                }
                $code = $key.".required";
                $error_message[$code] = $value['error_message'];
            }
        }
        $error_message['email.unique'] = $error_message['email.required'];
        $validated = $request->validate(
            $validate,
            $error_message
        );

    }

    public function setData($id, $request, $join_price = 0, $party_price = 0 )
    {

        $this->setConf($id, $request);

        $this->seminer_id = $id;
        $this->account_type = $request->account_type;
        $this->name = $request->name;
        $this->name_kana  = $request->name_kana;
        $this->email  = $request->email;
        $this->company  = $request->company;
        $this->tel  = $request->tel;
        $this->address  = $request->address;
        $this->area  = $request->area;
        $this->join_status  = 1;
        if($request->party_status){
            $this->party_status  = 1;
        }
        $this->join_price = $join_price;
        $this->party_price = $party_price;
        $this->password = Hash::make($request->password);
        $this->save();
        $last_insert_id = $this->id;
        return $last_insert_id;
    }

    public function editData($id, $request, $join_price = 0, $party_price = 0, $account_id )
    {

        $this->setConf($id, $request, $account_id);
        $data = Account::find($account_id);
        $data->seminer_id = $id;
        $data->account_type = $request->account_type;
        $data->name = $request->name;
        $data->name_kana = $request->name_kana;
        $data->email = $request->email;
        $data->company = $request->company;
        $data->tel = $request->tel;
        $data->address = $request->address;
        $data->area = $request->area;
        if($request->party_status){
            $data->party_status = 1;
        }else{
            $data->party_status = 0;
        }
        $data->join_price = $join_price;
        $data->party_price = $party_price;
        $data->save();
        return true;
    }

    public function setPayment($id, $payment_flag = 1){
        $data = self::find($id);
        $data->payment_flag = $payment_flag;
        $data->save();
    }

    public static function setPaymentAdmin($id, $request){
        $where['seminer_id'] = $id;
        $where['id'] = $request->account_id;
        $data = self::where($where)->first();
        $data->payment_flag = $request->payment_flag;
        $data->save();
    }

    public static function editPassword($id, $account_id, $request){
        $where['seminer_id'] = $id;
        $where['id'] = $account_id;
        $data = self::where($where)->first();
        if($request->password){
            $data->password = Hash::make($request->password);
            if( $data->save()){
                return true;
            }else{
                return false;
            }
        }
        return false;
    }
}
