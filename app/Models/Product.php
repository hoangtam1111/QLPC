<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='products';
    protected $fillable=[
        'id',
        'name',
        'price',
        'description',
        'photo',
        'quantity',
        'product_type_id',
        'brand_id'
    ];
}
