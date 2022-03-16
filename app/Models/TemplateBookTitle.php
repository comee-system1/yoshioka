<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateBookTitle extends Model
{
    use HasFactory;

    protected $table = 'template_book_titles';

    public static function getData($template_code, $seminer_id)
    {
        $TemplateBookTitles = TemplateBookTitle::where('template_code', $template_code)->orderBy('id', 'asc')->get();
        $TemplateBookTitleData = [];
        $i = 0;
        foreach ($TemplateBookTitles as $key => $TemplateBookTitle) {
            $TemplateBookTitleData[$i]['seminer_id'    ] = $seminer_id;
            $TemplateBookTitleData[$i]['master_id'     ] = $TemplateBookTitle->master_id;
            $TemplateBookTitleData[$i]['text'          ] = $TemplateBookTitle->text;
            $TemplateBookTitleData[$i]['text2'         ] = $TemplateBookTitle->text2;
            $TemplateBookTitleData[$i]['type'          ] = $TemplateBookTitle->type;
            $TemplateBookTitleData[$i]['created_at'    ] = NOW();
            $TemplateBookTitleData[$i]['updated_at'    ] = NOW();
            $i++;
        }
        return $TemplateBookTitleData;
    }
}
