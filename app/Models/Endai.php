<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Consts\ClassConsts;
use ZipArchive;

class Endai extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'endai',
        'note',
        'type',
        'file1',
        'file2',
        'file3',
        'file1_name',
        'file2_name',
        'file3_name',
    ];

    public function setData($id, $request)
    {
        $this->setConf($id, $request);
        $filename1 = $this->createFileName($request,"file1");
        $filename2 = $this->createFileName($request,"file2");
        $filename3 = $this->createFileName($request,"file3");

        $this->seminer_id = $id;
        $this->account_id = $request->account_id;
        $this->name = $request->endai;
        $this->note = $request->note;
        $this->type = sprintf("%d",$request->type);
        $this->file1 = $filename1;
        $this->file2 = $filename2;
        $this->file3 = $filename3;
        $this->file1_name = $request->file1_name??$filename1;
        $this->file2_name = $request->file2_name??$filename2;
        $this->file3_name = $request->file3_name??$filename3;
        $this->save();
        if($filename1) $request->file('file1')->storeAs('public/file',$filename1);
        if($filename2) $request->file('file2')->storeAs('public/file',$filename2);
        if($filename3) $request->file('file3')->storeAs('public/file',$filename3);
        return true;
    }

    public function setDataOpen($id, $request)
    {
        $this->setConf($id, $request);

        $this->seminer_id = $id;
        $this->account_id = $request->account_id;
        $this->name = $request->endai;
        $this->note = $request->note;
        $this->type = sprintf("%d",$request->type);
        $this->file1 = $request->filename1;
        $this->file2 = $request->filename2;
        $this->file3 = $request->filename3;
        $this->file1_name = $request->file1_name??$request->filename1;
        $this->file2_name = $request->file2_name??$request->filename2;
        $this->file3_name = $request->file3_name??$request->filename3;

        if($request->check_file1){
            $this->file1 = "";
            $this->file1_name = "";
        }
        if($request->check_file2){
            $this->file2 = "";
            $this->file2_name = "";
        }
        if($request->check_file3){
            $this->file3 = "";
            $this->file3_name = "";
        }

        $this->save();
        $last_insert_id = $this->id;
        return $last_insert_id;
    }

    public function editDataOpen($id, $endai_id, $request)
    {
        $this->setConf($id, $request);

        $data = self::find($endai_id);

        $data->name = $request->endai;
        $data->note = $request->note;
        $data->type = sprintf("%d",$request->type);
        if($request->filename1) $data->file1 = $request->filename1;
        if($request->filename2) $data->file2 = $request->filename2;
        if($request->filename3) $data->file3 = $request->filename3;
        $data->file1_name = $request->file1_name??$data->file1;
        $data->file2_name = $request->file2_name??$data->file2;
        $data->file3_name = $request->file3_name??$data->file3;

        if($request->check_file1){
            $data->file1 = "";
            $data->file1_name = "";
        }
        if($request->check_file2){
            $data->file2 = "";
            $data->file2_name = "";
        }
        if($request->check_file3){
            $data->file3 = "";
            $data->file3_name = "";
        }

        $data->save();
        return true;
    }

    public function editData($id, $endai_id, $request)
    {
        $this->setConf($id, $request);
        $filename1 = $this->createFileName($request,"file1");
        $filename2 = $this->createFileName($request,"file2");
        $filename3 = $this->createFileName($request,"file3");

        $where = [];
        $where[ 'seminer_id' ] = $id;
        $where[ 'id' ] = $endai_id;
        $data = self::where($where)->first();
        $data->account_id = $request->account_id;
        $data->name = $request->endai;
        $data->note = $request->note;
        $data->type = sprintf("%d",$request->type);
        if($filename1) $data->file1 = $filename1;
        if($filename2) $data->file2 = $filename2;
        if($filename3) $data->file3 = $filename3;
        $data->file1_name = ($request->file1_name)?$request->file1_name:$filename1;
        $data->file2_name = ($request->file2_name)?$request->file2_name:$filename2;
        $data->file3_name = ($request->file3_name)?$request->file3_name:$filename3;
        if($request->check_file1){
            $data->file1 = "";
            $data->file1_name = "";
        }
        if($request->check_file2){
            $data->file2 = "";
            $data->file2_name = "";
        }
        if($request->check_file3){
            $data->file3 = "";
            $data->file3_name = "";
        }

        $data->save();
        if($filename1) $request->file('file1')->storeAs('public/file',$filename1);
        if($filename2) $request->file('file2')->storeAs('public/file',$filename2);
        if($filename3) $request->file('file3')->storeAs('public/file',$filename3);
        return true;
    }


    public static function getEndais($id, $request)
    {
        $max = self::leftJoin('accounts', 'endais.account_id', '=', 'accounts.id')
        ->where('endais.seminer_id',$id)->where('endais.status',1);
        if($request->endai_name){
            $pat = '%' . addcslashes($request->endai_name, '%_\\') . '%';
            $max = $max->where('endais.name', 'LIKE', $pat );
        }
        if($request->account_id){
            $max = $max->where('endais.account_id', $request->account_id );
        }
        $page = ($request->page)??1;
        $limit = ClassConsts::PAGE_LIMIT;
        $list = self::select('endais.*')
            ->selectRaw('DATE_FORMAT(endais.updated_at, "%Y/%m/%d %H:%m:%i") AS date')
            ->selectRaw('accounts.name AS account_name')
            ->selectRaw('accounts.email AS account_email')
            ->leftJoin('accounts', 'endais.account_id', '=', 'accounts.id')
            ->where('endais.seminer_id',$id)
            ->where('endais.status','1');
        if($request->endai_name){
            $pat = '%' . addcslashes($request->endai_name, '%_\\') . '%';
            $list = $list->where('endais.name', 'LIKE', $pat );
        }
        if($request->account_id){
            $list = $list->where('endais.account_id', $request->account_id );
        }
        $list = $list->paginate($limit,['*'],'page',$page);

        $data['list'] = $list;
        $data['last'] = ceil($max->count()/$limit);
        return $data;

    }

    public function createFileName($request, $type)
    {
        if(!$request->file($type)) return null;
        $uploadfilename = $request->file($type)->getClientOriginalName();
        $ext = pathinfo($uploadfilename, PATHINFO_EXTENSION);
        $filename = uniqid().".".$ext;
        return $filename;
    }

    public function setConf($id, $request)
    {

        $error_message = [];
        $validate = [];
        $defineEndaiTitle = $this->getTypeList(DefineEndaiTitle::where(['seminer_id'=>$id])->get());

        foreach($this->fillable as $value){
            if(isset($defineEndaiTitle[ $value ]) &&
            $defineEndaiTitle[ $value ]->required){
                $validate[ $value ] = 'required';
                $error_message[ $value.'.required'] = $defineEndaiTitle[$value]->error_message;
            }
        }
        $validated = $request->validate(
            $validate,
            $error_message
        );

    }

    public function getTypeList($data)
    {
        $list = [];
        foreach($data as $value){
            $list[$value->type] = $value;
        }
        return $list;
    }

    public static function deleteData($id, $endai_id)
    {
        $where['seminer_id'] = $id;
        $where['id'] = $endai_id;
        $data = self::where($where)->first();
        $data->status = 0;
        if($data->save()){
            return true;
        }else{
            return false;
        }
    }

    public static function getData($id, $endai_id)
    {
        $where['seminer_id'] = $id;
        $where['id'] = $endai_id;
        $data = self::where($where)->first();
        return $data;
    }

    public static function getEndaiAccount($id)
    {
        $data = Endai::selectRaw("accounts.name as account_name")
            ->selectRaw("accounts.id as accounts_id")
            ->selectRaw("endais.name")
            ->selectRaw("endais.id")
            ->where(['endais.seminer_id'=>$id])
            ->where(['endais.status'=>1])
            ->leftJoin('accounts', 'endais.account_id', '=', 'accounts.id')
            ->get();
        return $data;
    }

    public static function getFileuploadName($type)
    {
        if(!request()->file($type)) return null;
        $uploadfilename = request()->file($type)->getClientOriginalName();
        $ext = pathinfo($uploadfilename, PATHINFO_EXTENSION);
        $filename = uniqid().".".$ext;
        request()->file($type)->storeAs('public/file',$filename);
        return $filename;
    }

    public static function getEndaiData($id)
    {
        return self::find($id);
    }

    public static function getEndaiLists($id, $account)
    {
        $where[ 'status' ] = 1;
        $where[ 'seminer_id' ] = $id;
        $where[ 'account_id' ] = $account->id;
        $data = self::where($where)->get();
        return $data;
    }

    public static function getZipFile($id, $path)
    {
        $endais = self::where('seminer_id', $id)
                ->where('status', 1)
                ->get();

        $zip = new ZipArchive();
        if(!file_exists($path.'zip/')){
            mkdir($path.'zip/', 0777);
        }
        $fname = time().'-'.$id.'.zip';
        $zip->open($path.'zip/'.$fname, ZipArchive::CREATE);

        foreach($endais as $endai){
            for($i=1;$i<=3;$i++){
                $key = "file".$i;
                $keyname = "file".$i."_name";
                $file = ($endai->$key)?glob($path.'file/'.$endai->$key)[0]:"";

                $file_name = $endai->$keyname;
                if($file && $file_name){
                    $filepath = pathinfo($file);
                    $zip->addFile($file, $endai->id."-".$file_name.".".$filepath['extension']);
                }
            }
        }
        $zip->close();
        return $fname;
    }
}
