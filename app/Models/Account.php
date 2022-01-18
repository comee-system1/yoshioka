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
        'first_name',
        'last_name',
        'first_name_kana',
        'last_name_kana',
        'email',
        'password',
        'area',
        'company',
        'tel',
        'address',
        'account_type',
        'open_id',
    ];

    public function setData($request)
    {
        //todo::openテーブルを作成後IDを取得後登録を行う
        $open_id = 1;
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'first_name_kana' => 'required',
            'last_name_kana' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('accounts', 'email')->where('open_id', $open_id) ],
            'password' => ['required', new AlphaNumHalf, 'min:8'],
            'company' => 'required',
            'tel' => 'required',
            'address' => 'required',
            'area' => 'required',
            'account_type' => 'required',

        ]);

        $this->account_type = $request->account_type;
        $this->first_name = $request->first_name;
        $this->last_name  = $request->last_name;
        $this->first_name_kana  = $request->first_name_kana;
        $this->last_name_kana  = $request->last_name_kana;
        $this->email  = $request->email;
        $this->company  = $request->company;
        $this->tel  = $request->tel;
        $this->address  = $request->address;
        $this->area  = $request->area;
        $this->password = Hash::make($request->password);
        //todo::openテーブルを作成後IDを取得後登録を行う
        $this->open_id = 1;
        $this->save();
    }
}
