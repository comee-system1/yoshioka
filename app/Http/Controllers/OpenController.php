<?php

namespace App\Http\Controllers;

use App\Models\DefineJoinTitle;
use App\Models\DefineTitle;
use App\Models\Information;
use App\Models\Sponser;
use Illuminate\Http\Request;

class OpenController extends ControllerOpen
{
    public function __construct(Request $rquest)
    {
        if(!session()->get( 'language' )) {
            session(['language' => 'JP']);
        }

        $this->pageCheck($rquest);
    }
    //
    public function index($id, $uniqcode)
    {

        $this->seminer[0]['information'] = Information::getOpenInformation($id);
        $this->seminer[0]['title'] = DefineTitle::getOpenTitle($id);
        $this->seminer[0]['sponser'] = Sponser::getSponser($id);

        return view('open.index', [
            'id' => $id,
            'uniqcode' => $uniqcode,
            'joinlink' => DefineJoinTitle::getDataType($id, 'joinlink')->first(),
            'seminer' => $this->seminer[0],
        ]);
    }

    public function session($id, $uniqcode, Request $request)
    {
        session(['language' => $request->language]);
        return redirect(route('top', ['id' => $id, 'uniqcode' => $uniqcode]));
    }

    public function information($id, $uniqcode, $information_id)
    {

        $this->seminer[0]['information'] = Information::getOpenInformationDetail($id, $information_id);
        return view('open.information', [
            'id' => $id,
            'uniqcode' => $uniqcode,
            'joinlink' => DefineJoinTitle::getDataType($id, 'joinlink')->first(),
            'seminer' => $this->seminer[0],
        ]);

    }
}
