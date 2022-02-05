<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateMasterPresentation extends Model
{
    use HasFactory;

    protected $table = 'template_master_presentations';

    public static function getData($template_code, $seminer_id)
    {
        $templateMasterPresentations = TemplateMasterPresentation::where('template_code', $template_code)->orderBy('sort', 'asc')->get();
        $masterPresentationData = [];
        $i = 0;
        foreach ($templateMasterPresentations as $key => $templateMasterPresentation) {
            $masterPresentationData[$i]['seminer_id'] = $seminer_id;
            $masterPresentationData[$i]['master_id' ] = $templateMasterPresentation->master_id;
            $masterPresentationData[$i]['text'      ] = $templateMasterPresentation->text;
            $masterPresentationData[$i]['created_at'] = NOW();
            $masterPresentationData[$i]['updated_at'] = NOW();
            $i++;
        }
        return $masterPresentationData;
    }
}
