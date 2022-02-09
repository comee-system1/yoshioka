<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefineEndaiTitle;
use App\Models\DefineJoinTitle;
use App\Models\DefinePresentationList;
use App\Models\DefineSpaceList;
use App\Models\DefineTimeTitle;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    //
    public function index($id)
    {
        return view('admin.master', ['id' => $id]);
    }

    public function endai($id)
    {
        return view('admin.masterEndai', ['id' => $id]);
    }

    public function time($id)
    {
        return view('admin.masterTime', ['id' => $id]);
    }

    public function book($id)
    {
        return view('admin.masterBook', ['id' => $id]);
    }

    //------------------
    //タイムテーブル用
    //------------------
    public function defineTime($id)
    {
        $data = DefineTimeTitle::where("seminer_id", $id)->orderBy("id", "asc")->get();
        return response()->json($data);
    }
    public function editTime($id, Request $request)
    {
        //タイトルの更新
        DefineTimeTitle::editDataType($id, $request, "title");
        DefineTimeTitle::editDataType($id, $request, "button");
        DefineTimeTitle::editDataTypetd($id, $request, "tdDatas");
        DefineTimeTitle::editDataPlace($id, $request, "placeLists");

        return true;
    }

    //-----------
    //演題設定用
    //-----------
    public function defineEndai($id)
    {
        $data = DefineEndaiTitle::where("seminer_id", $id)->orderBy("id", "asc")->get();
        return response()->json($data);
    }
    public function editEndai($id, Request $request)
    {
        //タイトルの更新
        DefineEndaiTitle::editDataType($id, $request, "title");
        DefineEndaiTitle::editDataType($id, $request, "button");
        DefineEndaiTitle::editDataTypeInput($id, $request, "input");
        //区分設定
        DefinePresentationList::editPresentationListData($id, $request);
        return true;
    }

    //-----------
    //参加設定用
    //-----------
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
