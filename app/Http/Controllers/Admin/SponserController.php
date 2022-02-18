<?php

namespace App\Http\Controllers\Admin;

use App\Consts\ClassConsts;
use App\Http\Controllers\Controller;
use App\Models\Sponser;
use Illuminate\Http\Request;

class SponserController extends Controller
{
    //
    public function index($id)
    {

        return view('admin.sponser', [
            'id' => $id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
        ]);
    }

    public function new($id)
    {
        return view('admin.sponsernew', [
            'id' => $id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
        ]);
    }

    public function edit($id, $sponser_id)
    {

        return view('admin.sponsernew', [
            'id' => $id,
            'sponser_id' => $sponser_id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
            'sponserdata'=>Sponser::getData($id, $sponser_id),
        ]);
    }

    public function editpost($id, $sponser_id, Request $request)
    {
        if( Sponser::editData($id, $sponser_id, $request)){
            session()->flash('flash_msg', '更新を行いました。');
        }else{
            session()->flash('flash_error', '更新に失敗しました。');
        }
        return redirect(route('sponser.edit', [
            'id' => $id,
            'sponser_id' => $sponser_id ]));
    }

    public function post($id, Request $request)
    {
        if( Sponser::setData($id, $request)){
            session()->flash('flash_msg', '登録を行いました。');
        }else{
            session()->flash('flash_error', '登録に失敗しました。');
        }
        return redirect(route('sponser', ['id' => $id ]));
    }

    public function delete($id, $sponser_id)
    {
        Sponser::setDelete($id, $sponser_id);
    }

}
