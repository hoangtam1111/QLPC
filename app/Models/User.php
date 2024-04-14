<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;
    protected $table='user';
    public function getAllUsers(){
        return DB::table($this->table)->get();
    }

    public function getDetail($id){
        return DB::table($this->table)->where('user_id', $id)->first();
    }

    public function insertUser($data){
        DB::insert('INSERT INTO '.$this->table.' (`username`, `password`, `name`, `email`, `address`, `admin`) VALUES (?,?,?,?,?,?)',$data);
    }
    public function updateUser($data,$id){
        $data[]=$id;
        DB::update('UPDATE '.$this->table.' SET `name`=?,`email`=?,`address`=? WHERE `user_id`=?',$data);
    }
    public function deleteUser($id){
        DB::delete('DELETE FROM '.$this->table.' WHERE user_id=?',[$id]);
    }
}
