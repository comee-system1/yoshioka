<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateInvoice extends Model
{
    use HasFactory;

    protected $table = 'template_invoices';

    public static function getData($template_code, $seminer_id)
    {
        $TemplateInvoices = TemplateInvoice::where('template_code', $template_code)->get();
        $TemplateInvoiceData = [];
        $i = 0;
        foreach ($TemplateInvoices as $key => $TemplateInvoice) {
            $TemplateInvoiceData[$i]['seminer_id'    ] = $seminer_id;
            $TemplateInvoiceData[$i]['text'          ] = $TemplateInvoice->text;
            $TemplateInvoiceData[$i]['text2'         ] = $TemplateInvoice->text2;
            $TemplateInvoiceData[$i]['type'          ] = $TemplateInvoice->type;
            $TemplateInvoiceData[$i]['created_at'    ] = NOW();
            $TemplateInvoiceData[$i]['updated_at'    ] = NOW();
            $i++;
        }
        return $TemplateInvoiceData;
    }

}
