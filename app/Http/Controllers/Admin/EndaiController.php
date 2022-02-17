<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefineEndaiTitle;
use App\Models\DefinePresentationList;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Endai;

class EndaiController extends Controller
{
    public function Define()
    {
        $this->endai = new Endai();
    }
    //
    public function index($id)
    {

        return view('admin.endai', [
            'id' => $id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
        ]);
    }

    public function edit($id, $endai_id)
    {

        $endaititle = DefineEndaiTitle::getDataTitle($id);
        $presentationList = DefinePresentationList::getDataDisplay($id);
        $accountlist = Account::getAccountList($id);
        $endaiData = Endai::getData($id, $endai_id);

        return view('admin.endaiEdit', [
            'id' => $id,
            'endai_id' => $endai_id,
            'seminer' => $this->seminer,
            'open_url' => $this->seminer->open_url,
            'endaititle' => $endaititle,
            'presentationList' => $presentationList,
            'accountlist' => $accountlist,
            'endaiData' => $endaiData,
        ]);

    }

    public function editpost($id, $endai_id, Request $request)
    {
        $this->Define();
        if($lastid = $this->endai->editData($id, $endai_id, $request))
        {
            session()->flash('flash_msg', '演題更新を行いました。');
        }else{
            session()->flash('flash_error', '演題更新に失敗しました。');
        }
        return redirect(route('endai.edit', ['id' => $id, 'endai_id' => $endai_id ]));
    }

    public function new($id)
    {
        $endaititle = DefineEndaiTitle::getDataTitle($id);
        $presentationList = DefinePresentationList::getDataDisplay($id);
        $accountlist = Account::getAccountList($id);

        return view('admin.endainew', [
            'id' => $id,
            'seminer' => $this->seminer,
            'open_url' => $this->seminer->open_url,
            'endaititle' => $endaititle,
            'presentationList' => $presentationList,
            'accountlist' => $accountlist,
        ]);
    }

    public function post($id, Request $request)
    {
        $this->Define();
        if($lastid = $this->endai->setData($id, $request))
        {
            session()->flash('flash_msg', '演題登録を行いました。');
            return redirect(route('endainew', ['id' => $id ]));
        }else{
            session()->flash('flash_error', '演題登録に失敗しました。');
            return redirect(route('endainew', ['id' => $id ]));
        }
    }

    public function delete($id, $endai_id)
    {

        if(Endai::deleteData($id, $endai_id))
        {
            session()->flash('flash_msg', '演題削除を行いました。');
            return redirect(route('endai', ['id' => $id ]));
        }else{
            session()->flash('flash_error', '演題削除に失敗しました。');
            return redirect(route('endai', ['id' => $id ]));
        }
    }

    public function list($id, Request $request)
    {
        $data = Endai::getEndais($id, $request);
        return response()->json($data);
    }

    public function accountList($id){
        $accountlist = Account::getAccountList($id);
        return response()->json($accountlist);
    }

}
