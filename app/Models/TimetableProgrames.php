<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimetableProgrames extends Model
{
    use HasFactory;

    protected $table = 'timetable_programes';

    protected $fillable = [
        'timetable_id',
        'seminer_id',
        'start_time',
        'end_time',
        'account_id',
        'account_name',
        'endai_id',
        'endai_name',
        'enabled'
    ];

}
