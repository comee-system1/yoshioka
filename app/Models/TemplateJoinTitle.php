<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateJoinTitle extends Model
{
    use HasFactory;

    protected $table = 'template_join_titles';

    public static function getData($template_code, $seminer_id)
    {
        $TemplateJoinTitles = TemplateJoinTitle::where('template_code', $template_code)->orderBy('sort', 'asc')->get();
        $TemplateJoinTitleData = [];
        $i = 0;
        foreach ($TemplateJoinTitles as $key => $TemplateJoinTitle) {
            $TemplateJoinTitleData[$i]['seminer_id'    ] = $seminer_id;
            $TemplateJoinTitleData[$i]['title'         ] = $TemplateJoinTitle->title;
            $TemplateJoinTitleData[$i]['text'          ] = $TemplateJoinTitle->text;
            $TemplateJoinTitleData[$i]['type'          ] = $TemplateJoinTitle->type;
            $TemplateJoinTitleData[$i]['required'      ] = $TemplateJoinTitle->required;
            $TemplateJoinTitleData[$i]['required_text' ] = $TemplateJoinTitle->required_text;
            $TemplateJoinTitleData[$i]['error_message' ] = $TemplateJoinTitle->error_message;
            $TemplateJoinTitleData[$i]['created_at'    ] = NOW();
            $TemplateJoinTitleData[$i]['updated_at'    ] = NOW();
            $i++;
        }
        return $TemplateJoinTitleData;
    }
}
