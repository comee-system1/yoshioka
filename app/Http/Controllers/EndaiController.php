<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DefineMyPage;
use App\Models\DefineEndaiTitle;
use App\Models\DefinePresentationList;
use App\Models\Account;
use App\Models\Endai;
use App\Models\DefineMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;

class EndaiController extends ControllerOpen
{
    public function __construct(Request $request)
    {
        $this->pageCheck($request);
        $this->defineMypage = DefineMyPage::getDataOpen($request->id);
        $this->endai = new Endai();
    }

    //
    public function list($id, $uniqcode)
    {

        $endaititle = DefineEndaiTitle::getDataTitle($id);
        $user = Auth::guard('account')->user();
        return view('open.endai', [
            'id' => $id,
            'uniqcode' => $uniqcode,
            'user' => $user,
            'seminer' => $this->seminer[0],
            'defineMypage' => $this->defineMypage,
            'endaititle' => $endaititle
        ]);
    }

    public function new($id, $uniqcode)
    {

        $endaititle = DefineEndaiTitle::getDataTitle($id);
        $presentationList = DefinePresentationList::getDataDisplay($id);
        $accountlist = Account::getAccountList($id);

        $account = Auth::guard('account')->user();

        return view('open.endainew', [
            'id' => $id,
            'uniqcode' => $uniqcode,
            'account' => $account,
            'seminer' => $this->seminer[0],
            'endaititle' => $endaititle,
            'presentationList' => $presentationList,
            'accountlist' => $accountlist,
            'defineMypage' => $this->defineMypage,

        ]);
    }

    public function conf($id, $uniqcode, Request $request)
    {

        $this->endai->setConf($id, $request);

        $endaititle = DefineEndaiTitle::getDataTitle($id);
        $presentationList = DefinePresentationList::getDataDisplay($id);
        $accountlist = Account::getAccountList($id);

        $account = Auth::guard('account')->user();

        //ファイルのアップロード
        $filename1 = Endai::getFileuploadName("file1");
        $filename2 = Endai::getFileuploadName("file2");
        $filename3 = Endai::getFileuploadName("file3");

        return view('open.endaiconf', [
            'id' => $id,
            'uniqcode' => $uniqcode,
            'account' => $account,
            'seminer' => $this->seminer[0],
            'endaititle' => $endaititle,
            'presentationList' => $presentationList,
            'accountlist' => $accountlist,
            'defineMypage' => $this->defineMypage,
            'filename1' => $filename1,
            'filename2' => $filename2,
            'filename3' => $filename3,
        ]);

    }

    public function post($id, $uniqcode, Request $request)
    {
        $this->endai = new Endai();
        $endaiTitle = DefineEndaiTitle::getDataTitle($id);
        if($lastid = $this->endai->setDataOpen($id, $request))
        {

            //メール配信
            $mailData = DefineMail::getData($id,'endai');
            $endaiData = Endai::getEndaiData($lastid);
            $account = Auth::guard('account')->user();
            $mail = [];
            $mail['address'] = $account->email;
            $mail['body'] = DefineMail::textReplaceEndai($mailData->body, $account, $endaiData, $id);
            $mail['title'] = DefineMail::textReplaceEndai($mailData->subject, $account, $endaiData, $id);
            Mail::send(new RegisterMail($mail));

            session()->flash('flash_msg', $endaiTitle[ 'endai_success' ]->title);
            return redirect(route('account.endai.list', ['id' => $id, 'uniqcode' => $uniqcode]));
        }else{
            session()->flash('flash_error', $endaiTitle[ 'endai_fail' ]->title);
            return redirect(route('account.endai.list', ['id' => $id, 'uniqcode' => $uniqcode]));
        }
    }


}
