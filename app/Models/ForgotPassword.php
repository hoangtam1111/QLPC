<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ForgotPassword extends Model
{
    use HasFactory;
    protected $table='forgot_password';
    public function getAllForgots(){
        return DB::table($this->table)->get();
    }

    public function getDetail($id){
        return DB::table($this->table)->where('product_id', $id)->first();
    }

    public function insertForgot($data){
        DB::insert('INSERT INTO '.$this->table.' VALUES (?,?,?)',$data);
    }
    public function updateForgot($data,$id){
        $data[]=$id;
        DB::update('UPDATE '.$this->table.' SET `token`=?,`created_at`=? WHERE `product_id`=?',$data);
    }
    public function deleteForgot($id){
        DB::delete('DELETE FROM '.$this->table.' WHERE product_id=?',[$id]);
    }
}
