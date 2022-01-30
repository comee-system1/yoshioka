<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;

class RecipeController extends Controller
{
    //
    public function index($type, $uniqcode)
    {

        $pdf = \PDF::loadView('open.recipe_pdf');
        $filename = date("YmdHis") . "_recipe";
        return $pdf->download($filename . '.pdf');
    }
}
