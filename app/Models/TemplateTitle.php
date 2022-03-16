<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateTitle extends Model
{
    use HasFactory;

    protected $table = 'template_titles';

    public static function getData($template_code, $seminer_id)
    {
        $template_titles = self::where('template_code', $template_code)->orderBy('id', 'asc')->get();
        $templateTitleData = [];
        $i = 0;
        foreach ($template_titles as $key => $template_title) {
            $templateTitleData[$i]['seminer_id'] = $seminer_id;
            $templateTitleData[$i]['title'     ] = $template_title->title;
            $templateTitleData[$i]['title2'    ] = $template_title->title2;
            $templateTitleData[$i]['type'      ] = $template_title->type;
            $templateTitleData[$i]['created_at'] = NOW();
            $templateTitleData[$i]['updated_at'] = NOW();
            $i++;
        }
        return $templateTitleData;
    }
}
