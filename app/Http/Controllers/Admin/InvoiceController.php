<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //
    public function index()
    {
        $hello = 'Hello World3';

        return view('admin.invoice', ['hello' => $hello]);
    }
}
