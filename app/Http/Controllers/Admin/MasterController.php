<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefineBookTitle;
use App\Models\DefineEndaiTitle;
use App\Models\DefineInvoiceTitle;
use App\Models\DefineJoinTitle;
use App\Models\DefineMail;
use App\Models\DefinePresentationList;
use App\Models\DefineSpaceList;
use App\Models\DefineTimeTitle;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    //
    public function index($id)
    {
        return view('admin.master', [
            'id' => $id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
        ]);
    }

    public function endai($id)
    {
        return view('admin.masterEndai', [
            'id' => $id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
        ]);
    }

    public function time($id)
    {
        return view('admin.masterTime', [
            'id' => $id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
        ]);
    }

    public function book($id)
    {
        return view('admin.masterBook', [
            'id' => $id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
        ]);
    }

    public function mail($id)
    {
        return view('admin.masterMail', [
            'id' => $id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
        ]);
    }

    public function invoice($id)
    {
        return view('admin.masterInvoice', [
            'id' => $id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
        ]);
    }


    //---------------
    //メール設定
    //---------------
    public function getMailReplace($id, $type = "")
    {
        if($type == "endai"){
            $wherein = [
                'endai'
            ];
            $data[ 'endai' ] = DefineEndaiTitle::where("seminer_id", $id)
                ->whereIn( 'type', $wherein )
                ->orderBy("id", "asc")->get();
        }
        $wherein = [
            'account_type',
            'name',
            'name_kana',
            'email',
            'company',
            'tel',
            'address',
            'tel',
            'area',
        ];
        $data[ 'join' ] = DefineJoinTitle::where("seminer_id", $id)
            ->whereIn( 'type', $wherein )
            ->orderBy("id", "asc")->get();


        return response()->json($data);
    }

    public function getMail($id, $type)
    {
        $data = DefineMail::getData($id, $type);
        return response()->json($data);
    }

    public function editMail($id, Request $request)
    {
        DefineMail::editData($id, $request);
    }

    //---------------
    //予稿原稿
    //---------------
    public function defineBook($id)
    {
        $data = DefineBookTitle::where("seminer_id", $id)->orderBy("id", "asc")->get();
        return response()->json($data);
    }

    public function defineEditBook($id, Request $request)
    {
        //タイトルの更新
        DefineBookTitle::editDataType($id, $request, "title");
        DefineBookTitle::editDataType($id, $request, "explain");
        DefineBookTitle::editDataType($id, $request, "button");

        return true;
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
        DefineEndaiTitle::editDataType($id, $request, "regist_button");
        DefineEndaiTitle::editDataType($id, $request, "back_button");
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
        DefineJoinTitle::editDataType($id, $request, "regist_button");
        DefineJoinTitle::editDataType($id, $request, "back_button");
        DefineJoinTitle::editDataTypeInput($id, $request, "input");
        DefineJoinTitle::editDataType($id, $request, "join");
        DefineJoinTitle::editDataType($id, $request, "joinlink");
        DefineJoinTitle::editDataType($id, $request, "party");
        DefineJoinTitle::editDataType($id, $request, "party_flag");
        //区分設定
        DefineSpaceList::editSpaceListData($id, $request);
        return true;
    }

    //-----------
    //請求書・領収書
    //-----------
    public function defineInvoice($id)
    {
        $data = DefineInvoiceTitle::where("seminer_id", $id)->get();
        return response()->json($data);
    }

    public function defineEditInvoice($id, Request $request)
    {
        //タイトルの更新
        DefineInvoiceTitle::editDataType($id, $request, "invoice");
        DefineInvoiceTitle::editDataType($id, $request, "receipt");
        DefineInvoiceTitle::editDataType($id, $request, "payee");
        DefineInvoiceTitle::editDataType($id, $request, "bill");

        return true;
    }
}
