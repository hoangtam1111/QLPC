<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='order_details';
    protected $fillable=[
        'id',
        'order_id',
        'product_id',
        'quantity'
    ];
}
