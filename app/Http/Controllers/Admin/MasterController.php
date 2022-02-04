<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefineJoinTitle;
use App\Models\DefineSpaceList;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    //
    public function index($id)
    {

        return view('admin.master', ['id' => $id]);
    }

    public function define($id)
    {
        $data = DefineJoinTitle::where("seminer_id", $id)->orderBy("id", "asc")->get();
        return response()->json($data);
    }

    public function edit($id, Request $request)
    {
        //タイトルの更新
        DefineJoinTitle::editDataType($id, $request, "title");
        DefineJoinTitle::editDataType($id, $request, "button");
        DefineJoinTitle::editDataTypeInput($id, $request, "input");
        //区分設定
        DefineSpaceList::editSpaceListData($id, $request);
        return true;
    }
}
