<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table='order_detail';
    public function getAllOrderDetails(){
        return DB::table($this->table)->get();
    }

    public function getDetail($id){
        return DB::table($this->table)->where('order_detail_id', $id)->first();
    }

    public function insertOrder($data){
        DB::insert('INSERT INTO '.$this->table.' (`order_id`, `product_id`, `quantity`) VALUES (?,?,?)',$data);
    }
    public function updateOrder($data,$id){
        $data[]=$id;
        DB::update('UPDATE `order_detail` SET `order_id`=?,`product_id`=?,`quantity`=? WHERE `order_detail_id`=?',$data);
    }
    public function deleteOrder($id){
        DB::delete('DELETE FROM '.$this->table.' WHERE order_detail_id=?',[$id]);
    }
}
