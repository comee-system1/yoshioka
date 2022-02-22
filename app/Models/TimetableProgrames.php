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

    public static function getOpenData($id, $timetable_id)
    {
        $data = self::select('timetable_programes.*')
                ->selectRaw('endais.file1')
                ->selectRaw('endais.file2')
                ->selectRaw('endais.file3')
                ->selectRaw('endais.file1_name')
                ->selectRaw('endais.file2_name')
                ->selectRaw('endais.file3_name')
                ->selectRaw('accounts.name as accountName')
                ->leftJoin('endais', 'endais.id', '=', 'timetable_programes.endai_id')
                ->leftJoin('accounts', 'endais.account_id', '=', 'accounts.id')
                ->where('timetable_programes.seminer_id', $id)
                ->where('timetable_programes.timetable_id', $timetable_id)
                ->where('timetable_programes.enabled',1)
                ->get();
        return $data;
    }
}
