<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateEndaiTitle extends Model
{
    use HasFactory;

    protected $table = 'template_endai_titles';

    public static function getData($template_code, $seminer_id)
    {
        $TemplateEndaiTitles = TemplateEndaiTitle::where('template_code', $template_code)->orderBy('sort', 'asc')->get();
        $TemplateEndaiTitleData = [];
        $i = 0;
        foreach ($TemplateEndaiTitles as $key => $TemplateEndaiTitle) {
            $TemplateEndaiTitleData[$i]['seminer_id'    ] = $seminer_id;
            $TemplateEndaiTitleData[$i]['title'         ] = $TemplateEndaiTitle->title;
            $TemplateEndaiTitleData[$i]['text'          ] = $TemplateEndaiTitle->text;
            $TemplateEndaiTitleData[$i]['type'          ] = $TemplateEndaiTitle->type;
            $TemplateEndaiTitleData[$i]['required'      ] = $TemplateEndaiTitle->required;
            $TemplateEndaiTitleData[$i]['required_text' ] = $TemplateEndaiTitle->required_text;
            $TemplateEndaiTitleData[$i]['created_at'    ] = NOW();
            $TemplateEndaiTitleData[$i]['updated_at'    ] = NOW();
            $i++;
        }
        return $TemplateEndaiTitleData;
    }
}
