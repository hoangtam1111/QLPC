<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    protected $table='order';
    public function getAllOrders(){
        return DB::table($this->table)->get();
    }

    public function getDetail($id){
        return DB::table($this->table)->where('order_id', $id)->first();
    }

    public function insertOrder($data){
        DB::insert('INSERT INTO '.$this->table.' (`create_at`, `user_id`, `total_amount`) VALUES (?,?,?,?)',$data);
    }
    public function updateOrder($data,$id){
        $data[]=$id;
        DB::update('UPDATE '.$this->table.' SET `create_at`=?,`user_id`=?,`total_amount`=? WHERE `order_id`=?',$data);
    }
    public function deleteOrder($id){
        DB::delete('DELETE FROM '.$this->table.' WHERE order_id=?',[$id]);
    }
}
