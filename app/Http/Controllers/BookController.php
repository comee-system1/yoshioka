<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;


class BookController extends ControllerOpen
{
    //
    public function __construct(Request $rquest)
    {
        $this->pageCheck($rquest);
    }

    public function download($id)
    {
        $user = Auth::guard('account')->user();
        if($user->payment_flag == 0){
            echo "error(2)";
            exit();
        }
        $book = Book::where('seminer_id', $id)->first();
        return response()->download("storage/file/".$book->filename);
    }
}
