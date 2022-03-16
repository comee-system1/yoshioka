<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateMasterPasswordRenew extends Model
{
    use HasFactory;

    protected $table = 'template_master_password_renews';

    public static function getData($template_code, $seminer_id)
    {
        $TemplateMasterPasswordRenews = self::where('template_code', $template_code)->orderBy('id', 'asc')->get();
        $masterPasswordData = [];
        $i = 0;
        foreach ($TemplateMasterPasswordRenews as $key => $TemplateMasterPasswordRenew) {
            $masterPasswordData[$i]['seminer_id'      ] = $seminer_id;
            $masterPasswordData[$i]['title'           ] = $TemplateMasterPasswordRenew->title;
            $masterPasswordData[$i]['title2'          ] = $TemplateMasterPasswordRenew->title2;
            $masterPasswordData[$i]['text'            ] = $TemplateMasterPasswordRenew->text;
            $masterPasswordData[$i]['text2'           ] = $TemplateMasterPasswordRenew->text2;
            $masterPasswordData[$i]['display_status'  ] = $TemplateMasterPasswordRenew->display_status;
            $masterPasswordData[$i]['type'      ] = $TemplateMasterPasswordRenew->type;
            $masterPasswordData[$i]['created_at'] = NOW();
            $masterPasswordData[$i]['updated_at'] = NOW();
            $i++;
        }
        return $masterPasswordData;
    }

}
