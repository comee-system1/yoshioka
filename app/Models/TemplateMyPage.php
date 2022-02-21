<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateMyPage extends Model
{
    use HasFactory;

    protected $table = "template_mypages";

    protected $fillable = [
        'title',
        'text',
        'type',
    ];

    public static function getData($template_code, $seminer_id)
    {
        $templateMypages = self::where('template_code', $template_code)->orderBy('id', 'asc')->get();
        $templateMypageData = [];
        $i = 0;
        foreach ($templateMypages as $key => $templateMypage) {
            $templateMypageData[$i]['seminer_id'] = $seminer_id;
            $templateMypageData[$i]['title'] = $templateMypage->title;
            $templateMypageData[$i]['text'] = $templateMypage->text;
            $templateMypageData[$i]['type'] = $templateMypage->type;
            $templateMypageData[$i]['created_at'] = NOW();
            $templateMypageData[$i]['updated_at'] = NOW();
            $i++;
        }
        return $templateMypageData;
    }
}
