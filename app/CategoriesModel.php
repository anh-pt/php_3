<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CategoriesModel extends Model
{
    protected $table = 'categories';
    public function GetList($data = [])
    {
        $query = DB::table($this->table);
        //.....
        $list = $query->get();
        return $list;
    }
    public function Save($data=[])
    {
        return DB::table($this->table)->insertGetId($data);
    }
    public function update($id =[],array $data=[])
    {
        return DB::table($this->table)
            ->where('id',$id)
            ->update($data);
    }
    // public function delete($id)
    // {
    //     return DB::delete($this->table);
    // }
}
