<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateTimeTitle extends Model
{
    use HasFactory;

    protected $table = 'template_time_titles';

    public static function getData($template_code, $seminer_id)
    {
        $templateTimeTitles = self::where('template_code', $template_code)->orderBy('id', 'asc')->get();
        $timeTitleData = [];
        $i = 0;
        foreach ($templateTimeTitles as $key => $templateTimeTitle) {
            $timeTitleData[$i]['seminer_id'] = $seminer_id;
            $timeTitleData[$i]['title'     ] = $templateTimeTitle->title;
            $timeTitleData[$i]['display_status'     ] = $templateTimeTitle->display_status;
            $timeTitleData[$i]['type'     ] = $templateTimeTitle->type;
            $timeTitleData[$i]['created_at'] = NOW();
            $timeTitleData[$i]['updated_at'] = NOW();
            $i++;
        }
        return $timeTitleData;
    }

}
