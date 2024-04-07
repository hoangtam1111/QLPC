<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $table='product';
    public function getAllProducts(){
        return DB::table($this->table)->get();
    }

    public function getDetail($id){
        return DB::table($this->table)->where('product_id', $id)->first();
    }

    public function insertProduct($data){
        DB::insert('INSERT INTO '.$this->table.' VALUES (?,?,?,?,?,?,?)',$data);
    }
    public function updateProduct($data,$id){
        $data[]=$id;
        DB::update('UPDATE '.$this->table.' SET `name`=?,`price`=?,`description`=?,`photo`=?,`quantity`=?,`type_id`=?,`brand_id`=? WHERE `product_id`=?',$data);
    }
    public function deleteProduct($id){
        DB::delete('DELETE FROM '.$this->table.' WHERE product_id=?',[$id]);
    }
}
