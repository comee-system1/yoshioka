<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'seminer_id',
        'filename',
        'display_status',
    ];

    public static function upload($id, $request )
    {

        if(!$request->file('file')) return false;
        $uploadfilename = $request->file('file')->getClientOriginalName();
        $ext = pathinfo($uploadfilename, PATHINFO_EXTENSION);
        $filename = uniqid().".".$ext;
        $book = Book::firstOrNew(['seminer_id' => $id]);
        $book->filename = $filename;
        $book->display_status = 1;
        $book->save();
        $request->file('file')->storeAs('public/file',$filename);
        return true;
    }
}
