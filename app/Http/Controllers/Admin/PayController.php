<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefineFee;
use App\Models\DefineJoinTitle;
use App\Models\DefineSpaceList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayController extends Controller
{
    //
    public function index($id)
    {
        $space = DefineSpaceList::where(['seminer_id'=>$id, 'display_status'=>1 ])
            ->orderBy('master_id','asc')
            ->get();
        $data[ 'space' ] = $space;
        $data[ 'fee'   ] = DefineFee::where(['seminer_id'=>$id])->first();
        $data[ 'join_title' ] = DefineJoinTitle::getDataJoinTitleType($id);
        return view('admin.pay', ['id' => $id, 'data'=>$data]);
    }

    public function post($id, Request $request)
    {

        DB::beginTransaction();
        try{
            DefineFee::editStatus($id,$request);
            DefineSpaceList::editFee($id,$request);
            DB::commit();
            session()->flash('flash_msg', '決済内容の更新を行いました');
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('flash_error', '決済内容の更新に失敗しました。');
        }
        return redirect(route('pay', ['id'=> $id]));
    }
}
