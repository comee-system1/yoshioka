<?php

namespace App\Http\Controllers\Admin;

use App\Consts\ClassConsts;
use App\Http\Controllers\Controller;
use App\Models\DefineBookTitle;
use App\Models\DefineEndaiTitle;
use App\Models\DefineInvoiceTitle;
use App\Models\DefineJoinTitle;
use App\Models\DefineMail;
use App\Models\DefineMyPage;
use App\Models\DefinePasswordRenew;
use App\Models\DefinePresentationList;
use App\Models\DefineSpaceList;
use App\Models\DefineTimeTitle;
use App\Models\DefineTitle;
use App\Models\Account;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public $csvClum = [
        'account_type',
        'name',
        'name_kana',
        'email',
        'password',
        'company',
        'tel',
        'address',
        'area',
    ];

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

    public function title($id)
    {
        return view('admin.masterTitle', [
            'id' => $id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
        ]);
    }

    public function mypage($id)
    {
        return view('admin.masterMypage', [
            'id' => $id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
        ]);
    }

    public function password($id)
    {

        return view('admin.masterPassword', [
            'id' => $id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
        ]);

    }


    public function join($id)
    {
        $objects[ 'head' ] = self::createCsvHead(DefineJoinTitle::getDataType($id, $this->csvClum)->get());
        $objects[ 'body' ] = ClassConsts::CSV_EXPLAIN;
        $objects[ 'space' ] = ClassConsts::defineSpaceListExplain($id);
        return view('admin.masterJoin', [
            'id' => $id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
            'objects'=>json_encode($objects),
        ]);
    }

    //---------------
    //メール設定
    //---------------
    public function getMailReplace($id, $type = "")
    {
        $data = [];
        if($type == "information"){
            $data[ 'information' ][0][ 'title' ] = "お知らせ内容";
            $data[ 'information' ][0][ 'type' ] = "information";
            $data[ 'information' ][1][ 'title' ] = "名前";
            $data[ 'information' ][1][ 'type' ] = "name";
        }else
        if($type == "password_renew"){
            $data[ 'password_renew' ][0][ 'title' ] = "パスワード";
            $data[ 'password_renew' ][0][ 'type' ] = "password_renew";
            $data[ 'password_renew' ][1][ 'title' ] = "名前";
            $data[ 'password_renew' ][1][ 'type' ] = "name";
        }else{
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
        }

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
        DefineEndaiTitle::editDataType($id, $request, "delete_button");
        DefineEndaiTitle::editDataType($id, $request, "edit_button");
        DefineEndaiTitle::editDataType($id, $request, "back_button");
        DefineEndaiTitle::editDataType($id, $request, "endai_success");
        DefineEndaiTitle::editDataType($id, $request, "endai_fail");
        DefineEndaiTitle::editDataType($id, $request, "delete_check");
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
        DefineJoinTitle::editDataType($id, $request, "join_success");
        DefineJoinTitle::editDataType($id, $request, "join_miss");
        DefineJoinTitle::editDataType($id, $request, "sign_in_miss");
        DefineJoinTitle::editDataType($id, $request, "password_edit");
        DefineJoinTitle::editDataType($id, $request, "password_renew");
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
        DefineInvoiceTitle::editDataType($id, $request, "honor");
        DefineInvoiceTitle::editDataType($id, $request, "recipe_message");
        DefineInvoiceTitle::editDataType($id, $request, "invoice_message");

        return true;
    }

    //---------
    //タイトル
    //---------
    public function titleEdit($id, Request $request)
    {
        DefineTitle::editTitle($id, $request, 'information');
        DefineTitle::editTitle($id, $request, 'date');
        DefineTitle::editTitle($id, $request, 'address');
        DefineTitle::editTitle($id, $request, 'place');
        DefineTitle::editTitle($id, $request, 'sponser');
    }

    //------------------
    //マイページ
    //-----------------
    public function mypageEdit($id, Request $request)
    {
        DefineMyPage::editMypage($id, $request, 'mypage');
        DefineMyPage::editMypage($id, $request, 'join');
        DefineMyPage::editMypage($id, $request, 'endai');
        DefineMyPage::editMypage($id, $request, 'invoice');
        DefineMyPage::editMypage($id, $request, 'recipe');
        DefineMyPage::editMypage($id, $request, 'program');
        DefineMyPage::editMypage($id, $request, 'download');
    }

    //------------------
    //パスワード
    //-----------------
    public function passwordEdit($id, Request $request)
    {
        DefinePasswordRenew::editMypage($id, $request, 'renew_title');
        DefinePasswordRenew::editMypage($id, $request, 'renew_note');
        DefinePasswordRenew::editMypage($id, $request, 'renew_input');
        DefinePasswordRenew::editMypage($id, $request, 'renew_button');
        DefinePasswordRenew::editMypage($id, $request, 'renew_success');
        DefinePasswordRenew::editMypage($id, $request, 'renew_miss');
    }

    //------------------
    //参加者一覧
    //-----------------
    public function joinDownload($id)
    {
        $clum = DefineJoinTitle::getDataType($id, $this->csvClum)->get();
        $head = self::createCsvHead($clum);

        $filename = date("Ymdhis").".csv";
        // 書き込み用ファイルを開く
        $f = fopen($filename, 'w');
        if ($f) {
            // カラムの書き込み
            mb_convert_variables('SJIS', 'UTF-8', $head);
            fputcsv($f, $head);
        }
        // ファイルを閉じる
        fclose($f);

        // HTTPヘッダ
        header("Content-Type: application/octet-stream");
        header('Content-Length: '.filesize($filename));
        header('Content-Disposition: attachment; filename='.$filename);
        readfile($filename);
    }

    public static function createCsvHead($clum)
    {
        $head = [];
        foreach($clum as $value){
            $head[$value->type] = preg_replace("/ /","",$value->title);
        }
        $head[ 'payment_flag' ] = "支払い";
        return $head;
    }

    public function account($id, Request $request){

        // CSV ファイル保存
        $tmpName = mt_rand().".".$request->file->guessExtension(); //TMPファイル名
        $request->file->move(public_path()."/csv/tmp",$tmpName);
        $tmpPath = public_path()."/csv/tmp/".$tmpName;
        $fp = fopen($tmpPath, 'r');
        $i = 0;
        $insert = [];
        while ($row = fgetcsv($fp)) {
            if($i >= 1){
                mb_convert_variables('UTF-8', 'SJIS-win', $row);
                $is_registration_row = false;
                (new Account)->setCsvData($id, $row);
            }
            $i++;
        }

        exit();
    }
}
