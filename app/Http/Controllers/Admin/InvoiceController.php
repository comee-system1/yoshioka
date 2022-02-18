<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefineInvoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //
    public function index($id)
    {
        $invoice = DefineInvoice::getData($id);
        return view('admin.invoice', [
            'id' => $id,
            'seminer' => $this->seminer,
            'open_url' => $this->seminer->open_url,
            'invoice' => $invoice,
        ]);
    }

    public function post($id, Request $request)
    {
        if(DefineInvoice::editData($id, $request))
        {
            session()->flash('flash_msg', '更新を行いました。');
        }else{
            session()->flash('flash_error', '更新に失敗しました。');
        }
        return redirect(route('invoice', ['id' => $id]));
    }
}
