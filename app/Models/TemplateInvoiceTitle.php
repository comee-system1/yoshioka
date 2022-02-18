<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateInvoiceTitle extends Model
{
    use HasFactory;

    protected $table = 'template_invoice_titles';

    public static function getData($template_code, $seminer_id)
    {
        $TemplateInvoiceTitles = TemplateInvoiceTitle::where('template_code', $template_code)->get();
        $TemplateInvoiceTitleData = [];
        $i = 0;
        foreach ($TemplateInvoiceTitles as $key => $TemplateInvoiceTitle) {
            $TemplateInvoiceTitleData[$i]['seminer_id'    ] = $seminer_id;
            $TemplateInvoiceTitleData[$i]['title'          ] = $TemplateInvoiceTitle->title;
            $TemplateInvoiceTitleData[$i]['type'          ] = $TemplateInvoiceTitle->type;
            $TemplateInvoiceTitleData[$i]['created_at'    ] = NOW();
            $TemplateInvoiceTitleData[$i]['updated_at'    ] = NOW();
            $i++;
        }
        return $TemplateInvoiceTitleData;
    }

}
