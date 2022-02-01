<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seminer;
use Exception;

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
        try {
            $file_name = "";
            if (request()->file) {
                $file_name = Seminer::getMainFileName(request()->file->getClientOriginalName());
                request()->file->storeAs('public/open/', $file_name);
            }
            Seminer::registData($request, $file_name);
            return true;
        } catch (Exception $e) {
        }
        return false;
    }
}
