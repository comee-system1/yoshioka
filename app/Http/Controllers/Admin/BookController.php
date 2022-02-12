<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //
    public function index($id)
    {

        $data = [];
        $book = Book::find($id);
        if(isset($book->filename) && $book->filename){
            $data[ 'filename' ] = asset('storage/file/'.$book->filename);
        }else{
            $data[ 'filename' ] = '';
        }
        return view('admin.book', ['id' => $id, 'data' => $data]);
    }

    public function upload($id, Request $request)
    {
        if(Book::upload($id, $request)){
            session()->flash('flash_msg', 'ファイルのアップロードを行いました。');
        }else{
            session()->flash('flash_error', 'ファイルのアップロードに失敗しました。');
        }

        return redirect(route('book', ['id'=> $id]));
    }
}
