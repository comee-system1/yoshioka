<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateMasterSpace extends Model
{
    use HasFactory;

    protected $table = 'template_master_spaces';

    public static function getData($template_code, $seminer_id)
    {
        $templatemasterspaces = TemplateMasterSpace::where('template_code', $template_code)->orderBy('sort', 'asc')->get();
        $masterSpaceData = [];
        $i = 0;
        foreach ($templatemasterspaces as $key => $templatemasterspace) {
            $masterSpaceData[$i]['seminer_id'] = $seminer_id;
            $masterSpaceData[$i]['master_id' ] = $templatemasterspace->master_id;
            $masterSpaceData[$i]['text'      ] = $templatemasterspace->text;
            $masterSpaceData[$i]['text2'     ] = $templatemasterspace->text2;
            $masterSpaceData[$i]['created_at'] = NOW();
            $masterSpaceData[$i]['updated_at'] = NOW();
            $i++;
        }
        return $masterSpaceData;
    }
}
