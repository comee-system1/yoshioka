<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    //
    public function index($id)
    {

        return view('admin.info', [
            'id' => $id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
        ]);
    }

    public function list($id, Request $request)
    {
        $data = Information::getLists($id, $request);
        return response()->json($data);
    }

    public function new($id)
    {

        return view('admin.infonew', [
            'id' => $id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
            'information'=>[],
            'after'=>date("Y-m-d H:00",strtotime("1 hour"))
        ]);
    }

    public function edit($id, $information_id)
    {

        return view('admin.infonew', [
            'id' => $id,
            'information_id' => $information_id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
            'information'=>Information::getData($id, $information_id),
            'after'=>date("Y-m-d H:00",strtotime("1 hour"))
        ]);
    }

    public function post($id, Request $request)
    {
        if(Information::setData($id, $request))
        {
            session()->flash('flash_msg', 'お知らせ登録を行いました。');
            return redirect(route('infonew', ['id' => $id ]));
        }else{
            session()->flash('flash_error', 'お知らせ登録に失敗しました。');
            return redirect(route('infonew', ['id' => $id ]));
        }
    }

    public function editpost($id, $information_id, Request $request)
    {
        if(Information::editData($id, $information_id, $request))
        {
            session()->flash('flash_msg', 'お知らせ更新を行いました。');
            return redirect(route('info.edit.post', ['id' => $id, 'information_id' => $information_id ]));
        }else{
            session()->flash('flash_error', 'お知らせ更新に失敗しました。');
            return redirect(route('info.edit.post', ['id' => $id, 'information_id' => $information_id ]));
        }
    }

    public function delete($id, $information)
    {
        return Information::setDelete($id, $information);
    }
}
