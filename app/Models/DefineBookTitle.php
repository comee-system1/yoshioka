<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefineBookTitle extends Model
{
    use HasFactory;

    protected $table = "define_book_titles";

    protected $fillable = [
        'master_id',
        'seminer_id',
        'text',
        'display_status',
        'type',
    ];

}
