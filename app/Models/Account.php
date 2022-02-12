<?php

namespace App\Models;

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

    public function setConf($id, $request)
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
                    $validate[ $key ] = ['required'];
                }else if($key == "email"){
                    $validate[ $key ] = ['required', 'string', 'email', 'max:255', Rule::unique('accounts', 'email')->where('seminer_id', $id) ];
                }else{
                    $validate[ $key ] = 'required';
                }
                $code = $key.".required";
                $error_message[$code] = $value['error_message'];
            }
        }
        $error_message['email.unique'] = $error_message['email.required'];
        $error_message['password.password'] = "ddd";

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
        return true;
    }

    public function sendMail(){
        
    }
}
