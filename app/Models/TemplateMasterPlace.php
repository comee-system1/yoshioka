<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateMasterPlace extends Model
{
    use HasFactory;

    protected $table = 'template_master_places';

    public static function getData($template_code, $seminer_id)
    {
        $TemplateMasterPlaces = TemplateMasterPlace::where('template_code', $template_code)->orderBy('sort', 'asc')->get();
        $masterPlaceData = [];
        $i = 0;
        foreach ($TemplateMasterPlaces as $key => $TemplateMasterPlace) {
            $masterPlaceData[$i]['seminer_id'          ] = $seminer_id;
            $masterPlaceData[$i]['master_id'           ] = $TemplateMasterPlace->master_id;
            $masterPlaceData[$i]['text'                ] = $TemplateMasterPlace->text;
            $masterPlaceData[$i]['text2'               ] = $TemplateMasterPlace->text2;
            $masterPlaceData[$i]['display_status'      ] = $TemplateMasterPlace->display_status;
            $masterPlaceData[$i]['sort'      ] = $TemplateMasterPlace->sort;
            $masterPlaceData[$i]['created_at'] = NOW();
            $masterPlaceData[$i]['updated_at'] = NOW();
            $i++;
        }
        return $masterPlaceData;
    }
}
