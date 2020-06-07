<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ProductModel extends Model
{
    protected $table = 'products';
    public function GetList($data = [])
    {
        $query = DB::table($this->table);
        //thêm các điều kiện ở đây
        //.....
        // $query->orderBy('id','desc');
        //Thực thi câu lệnh lấy dữ liệu
        $list = $query->get();
        return $list;
    }
    public function Save($data =[])
    {
      return DB::table($this->table)->insertGetId($data);
    }
}
