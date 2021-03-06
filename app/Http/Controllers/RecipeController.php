<?php

namespace App\Http\Controllers;

use App\Models\DefineInvoiceTitle;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use App\Models\Account;
use App\Models\DefineFee;
use App\Models\DefineInvoice;
use App\Models\DefineJoinTitle;

class RecipeController extends Controller
{
    //
    public function index($id, $uniqcode)
    {

        $pdf = \PDF::loadView('open.recipe_pdf');
        $filename = date("YmdHis") . "_recipe";
        return $pdf->download($filename . '.pdf');
    }

    public function recipe($id, $account_id)
    {

        $define_invoice_titles = DefineInvoiceTitle::getData($id);
        $account = Account::getAccount($account_id);
        $fee = $account->join_price+$account->party_price;
        $define_invoices = DefineInvoice::getData($id);
        $file = "";
        if($define_invoices[ 'file' ]->text){
            $file = url('')."/storage/invoice/".$define_invoices[ 'file' ]->text;
        }
        $pdf = \PDF::loadView('open.recipe_pdf', [
            'title' => $define_invoice_titles['receipt']->title,
            'name'  => $account->name,
            'honor' => $define_invoice_titles['honor']->title,
            'fee'   => number_format($fee),
            'bill'  => $define_invoice_titles['bill']->title,
            'memo' => $define_invoices[ 'memo' ]->text,
            'recipe_message'  => $define_invoice_titles['recipe_message']->title,
            'address' => $define_invoices[ 'address' ]->text,
            'tel' => $define_invoices[ 'tel' ]->text,
            'file' => $file,
            'date' => $define_invoices[ 'date' ]->text,
            'email' => $define_invoices[ 'email' ]->text,
        ]);
        $filename = date("YmdHis") . "_recipe";
        return $pdf->download($filename . '.pdf');

    }

    public function invoice($id, $account_id)
    {

        $define_invoice_titles = DefineInvoiceTitle::getData($id);
        $account = Account::getAccount($account_id);
        $fee = $account->join_price+$account->party_price;
        $define_invoices = DefineInvoice::getData($id);

        $define_fees = DefineFee::getDataSeminer($id);
        $join_titles = "";
        $join_price = "";
        $party_titles = "";
        $party_price = "";
        if( $define_fees->join_status == 1 ){
            $join_titles = DefineJoinTitle::getDataType($id,'join')->first()->title;
            $join_price = $account->join_price;
        }
        if( $define_fees->join_status == 1 ){
            $party_titles = DefineJoinTitle::getDataType($id,'party')->first()->title;
            $party_price = $account->party_price;
        }
        $file = "";
        if($define_invoices[ 'file' ]->text){
            $file = url('')."/storage/invoice/".$define_invoices[ 'file' ]->text;
        }
        $lang = session()->get( 'language' );
        $pdf = \PDF::loadView('open.invoice_pdf', [
            'title' => ($lang == 'EN' )? $define_invoice_titles['invoice']->title2 : $define_invoice_titles['invoice']->title,
            'name'  => $account->name,
            'honor' => ($lang == 'EN' )? $define_invoice_titles['honor']->title2 : $define_invoice_titles['honor']->title,
            'fee'   => number_format($fee),
            'bill'  => ($lang == 'EN' )? $define_invoice_titles['bill']->title2 : $define_invoice_titles['bill']->title,
            'memo' => ($lang == 'EN' )? $define_invoices[ 'memo' ]->text2 : $define_invoices[ 'memo' ]->text,
            'recipe_message'  => ($lang == 'EN' )? $define_invoice_titles['invoice_message']->title2 : $define_invoice_titles['invoice_message']->title,
            'address' => ($lang == 'EN' )? $define_invoices[ 'address' ]->text2 : $define_invoices[ 'address' ]->text,
            'payee' => ($lang == 'EN' )? $define_invoices[ 'payee' ]->text2 : $define_invoices[ 'payee' ]->text,
            'email' => ($lang == 'EN' )? $define_invoices[ 'email' ]->text2 : $define_invoices[ 'email' ]->text,
            'tel' => ($lang == 'EN' )? $define_invoices[ 'tel' ]->text2 : $define_invoices[ 'tel' ]->text,
            'file' => $file,
            'date' => $define_invoices[ 'date' ]->text,
            'join_titles' => $join_titles,
            'join_price' => number_format((int)$join_price),
            'party_titles' => $party_titles,
            'party_price' => number_format((int)$party_price),
        ]);
        $filename = date("YmdHis") . "_invoice";
        return $pdf->download($filename . '.pdf');

    }
}
