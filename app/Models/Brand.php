<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Brand extends Model
{
    use HasFactory;
    protected $table='brand';
    public function getAllBrands(){
        return DB::table($this->table)->get();
    }

    public function getDetail($id){
        return DB::table($this->table)->where('brand_id', $id)->first();
    }

    public function insertBrand($data){
        DB::insert('INSERT INTO '.$this->table.' (`brand_name`, `brand_logo`) VALUES (?,?)',$data);
    }
    public function updateBrand($data,$id){
        $data[]=$id;
        DB::update('UPDATE '.$this->table.' SET `brand_name`=?,`brand_logo`=? WHERE `brand_id`=?',$data);
    }
    public function deleteBrand($id){
        DB::delete('DELETE FROM '.$this->table.' WHERE brand_id=?',[$id]);
    }
}
