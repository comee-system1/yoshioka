<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //
    public function index($id)
    {
        $hello = 'Hello World3';

        return view('admin.invoice', [
            'id' => $id,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
        ]);
    }
}
