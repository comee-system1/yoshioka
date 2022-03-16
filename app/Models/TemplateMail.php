<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateMail extends Model
{
    use HasFactory;

    protected $table = 'template_mails';

    public static function getData($template_code, $seminer_id)
    {
        $template_mails = self::where('template_code', $template_code)->get();
        $template_mailData = [];
        $i = 0;
        foreach ($template_mails as $key => $template_mail) {
            $template_mailData[$i]['seminer_id'  ] = $seminer_id;
            $template_mailData[$i]['type'        ] = $template_mail->type;
            $template_mailData[$i]['subject'     ] = $template_mail->subject;
            $template_mailData[$i]['subject2'    ] = $template_mail->subject2;
            $template_mailData[$i]['body'        ] = $template_mail->body;
            $template_mailData[$i]['body2'       ] = $template_mail->body2;

            $template_mailData[$i]['created_at'    ] = NOW();
            $template_mailData[$i]['updated_at'    ] = NOW();
            $i++;
        }
        return $template_mailData;
    }

}
