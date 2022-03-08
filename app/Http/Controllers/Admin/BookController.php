<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Endai;

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
        return view('admin.book', [
            'id' => $id,
            'data' => $data,
            'seminer'=>$this->seminer,
            'open_url'=>$this->seminer->open_url,
        ]);
    }

    public function all($id, Request $request)
    {
        $path = public_path().'/storage/';
        $zipfilename = Endai::getZipFile($id, $path);
        return response()->download($path.'zip/'.$zipfilename);
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
