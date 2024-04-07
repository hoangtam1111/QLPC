<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductType extends Model
{
    use HasFactory;
    protected $table='product_type';
    public function getAllType(){
        return DB::table($this->table)->get();
    }
    public function getDetail($id){
        return DB::table($this->table)->where('type_id',$id)->first();
    }
    public function insertType($data){
        DB::insert('INSERT INTO '.$this->table.' VALUES (?)', $data);
    }
    public function updateType($id, $data){
        $data[]=$id;
        DB::update('UPDATE '.$this->table.' SET `type_name`=? WHERE `type_id`=?', $data);
    }
    public function deleteType($id){
        DB::delete('DELETE FROM '.$this->table.' WHERE  type_id=?', $id);
    }
}
