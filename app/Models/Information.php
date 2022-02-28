<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Consts\ClassConsts;

class Information extends Model
{
    use HasFactory;

    protected $table = "informations";

    protected $fillable = [
        'seminer_id',
        'title',
        'note',
        'link',
        'file',
        'type',
        'display_type',
        'start',
        'end',
    ];

    public function setConf($request){

        $validate[ 'title' ] = ["required"];
        $error_message[ 'title.required' ] = "タイトルを入力してください。";
        $validated = $request->validate(
            $validate,
            $error_message
        );

        $file_name = "";
        if($request->file){
            $file_name = Seminer::getMainFileName($request->file->getClientOriginalName());
            $request->file->storeAs('public/file/', $file_name);
        }
        return $file_name;
    }

    public static function setData($id, $request)
    {
        $file_name = self::setConf($request);

        $create[ 'seminer_id' ] = $id;
        $create[ 'title' ] = $request->title;
        $create[ 'note'  ] = $request->note;
        $create[ 'link'  ] = $request->link;
        $create[ 'file'  ] = $file_name;
        $create[ 'type'  ] = $request->type;
        $create[ 'display_type' ] = $request->display_type;
        $create[ 'start' ] = $request->start;
        $create[ 'end'   ] = $request->end;
        return Information::create($create);
    }

    public static function editData($id, $information_id, $request)
    {
        $file_name = self::setConf($request);
        $where = [];
        $where[ 'seminer_id' ] = $id;
        $where[ 'id' ] = $information_id;
        $create = self::where($where)->first();

        $create->title = $request->title;
        $create->note = $request->note;
        $create->link = $request->link;
        $create->file = $file_name;
        $create->type = $request->type;
        $create->display_type = $request->display_type;
        $create->start = $request->start;
        $create->end = $request->end;
        return $create->save();
    }

    public static function getData($id, $infomation_id)
    {
        $data = Information::select('*')
            ->selectRaw('date_format(start, "%Y-%m-%dT%H:%i") as st')
            ->selectRaw('date_format(end, "%Y-%m-%dT%H:%i") as ed')
            ->where('seminer_id',$id)
            ->where('id', $infomation_id)
            ->first();
        return $data;
    }

    public static function getLists($id, $request)
    {

        $max = Information::where('seminer_id',$id)->where('status',1);
        $page = ($request->page)??1;
        $limit = ClassConsts::PAGE_LIMIT;
        $list = Information::select('*')
            ->selectRaw('date_format(updated_at, "%Y/%m/%d %H:%i") as date')
            ->where('seminer_id',$id)
            ->where('status','1')
            ->orderBy("id", "desc");
        $list = $list->paginate($limit,['*'],'page',$page);
        foreach($list as $k => $val){
            $list[$k]['info_type_disp'] = ClassConsts::INFO_TYPE_DISP[$val->type];
        }
        $data['list'] = $list;
        $data['last'] = ceil($max->count()/$limit);
        return $data;

    }

    public static function setDelete($id, $information_id)
    {

        $where['seminer_id'] = $id;
        $where['id'] = $information_id;
        $data = self::where($where)->first();
        $data->status = 0;
        if($data->save()){
            return true;
        }else{
            return false;
        }

    }

    public static function getOpenInformation($seminer_id)
    {

        $data = self::select('*')
            ->selectRaw('date_format(start, "%Y/%m.%d") as date')
            ->where(function($query){
                $date = date('Y-m-d H:i:s');
                $query->where('start', '<', $date)
                ->where('end', '>', $date)
                ;
            })
            // ->orWhere(function($query){
            //     $query->whereNull('start')
            //     ->whereNull('end')
            //     ;
            // })
            ->where('status',1)
            ->where('type',1)
            ->where('seminer_id',$seminer_id)
            ->orderBy('id', 'desc')
            ->get();
        return $data;
    }

    public static function getSendAllData(){
        $where = [];
        $where[ 'informations.status' ] = 1;
        $where[ 'informations.type' ] = 2;
        $where[ 'informations.send_flag' ] = 0;
        $data = Information::
            selectRaw('Informations.title')
            ->selectRaw('Informations.note')
            ->selectRaw('accounts.email')
            ->leftJoin('accounts', 'accounts.seminer_id', '=', 'informations.seminer_id')
            ->where($where)
            ->get();
        return $data;
    }
}
