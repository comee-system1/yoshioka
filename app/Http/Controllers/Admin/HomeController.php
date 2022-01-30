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
        return Seminer::all();
    }

    public function editData(Request $request)
    {
        try {
            Seminer::editData($request);
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
