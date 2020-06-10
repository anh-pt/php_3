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
        // ->join('categories',function($join)
        // {
        //     $join->on('categories.id','=','products.cate_id');
        // });
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
    public function update($id =[],array $data=[])
    {
        return DB::table($this->table)
            ->where('id',$id)
            ->update($data);
    }
    public function delete($id=[])
    {
        return DB::table($this->table)
            ->where('id',$id)
            ->delete($id);
    }
}
