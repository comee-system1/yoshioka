<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefineBookTitle;
use App\Models\DefineEndaiTitle;
use App\Models\DefineFee;
use App\Models\DefineJoinTitle;
use App\Models\DefinePlaceList;
use App\Models\DefinePresentationList;
use App\Models\DefineSpaceList;
use App\Models\DefineTimeTitle;
use App\Models\TemplateMasterPresentation;
use Illuminate\Http\Request;
use App\Models\Seminer;
use App\Models\TemplateBookTitle;
use App\Models\TemplateEndaiTitle;
use App\Models\TemplateJoinTitle;
use App\Models\TemplateMasterPlace;
use App\Models\TemplateMasterSpace;
use App\Models\TemplateTimeTitle;
use App\Models\Timetables;
use Exception;
use Facade\FlareClient\Time\Time;

class HomeController extends Controller
{
    //
    public function index()
    {
        $hello = 'Hello World';
        return view('admin.index', ['hello' => $hello]);
    }
    public function getDataLists()
    {
        return Seminer::getData();
    }

    public function getEditData($id)
    {
        return Seminer::getData($id);
    }

    public function editStatusData(Request $request)
    {
        try {
            Seminer::editStatusData($request);
            return true;
        } catch (Exception $e) {
        }
        return false;
    }
    public function deleteData(Request $request)
    {
        try {
            Seminer::deleteData($request);
            return true;
        } catch (Exception $e) {
        }
        return false;
    }
    public function saveData(Request $request)
    {
     //   DB::beginTransaction();
        try {
            $file_name = "";
            if (request()->file) {
                $file_name = Seminer::getMainFileName(request()->file->getClientOriginalName());
                request()->file->storeAs('public/open/', $file_name);
            }
            $seminer_id = Seminer::registData($request, $file_name);
            if(!$request->seminer_id){
                DefineSpaceList::insert(TemplateMasterSpace::getData($request->template, $seminer_id));
                DefineJoinTitle::insert(TemplateJoinTitle::getData($request->template, $seminer_id));
                DefinePresentationList::insert(TemplateMasterPresentation::getData($request->template, $seminer_id));
                DefineEndaiTitle::insert(TemplateEndaiTitle::getData($request->template, $seminer_id));
                DefinePlaceList::insert(TemplateMasterPlace::getData($request->template, $seminer_id));
                DefineTimeTitle::insert(TemplateTimeTitle::getData($request->template, $seminer_id));
                Timetables::setData($seminer_id);
                DefineBookTitle::insert(TemplateBookTitle::getData($request->template, $seminer_id));
                DefineFee::insert(DefineFee::getDefault($seminer_id));
            }
    //        DB::commit();
        } catch (Exception $e) {
            var_dump($e);
    //        DB::rollback();
        }
        return true;
    }
}
