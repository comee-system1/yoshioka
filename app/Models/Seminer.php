<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'explain',
        'address',
        'map_status',
        'start_date',
        'end_date',
        'main_image',
        'open_key',
    ];

}
