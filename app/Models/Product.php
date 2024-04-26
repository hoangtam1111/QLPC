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
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function product_type(){
        return $this->belongsTo(ProductType::class);
    }
    public function price_format($price)
    {
        $formattedPrice = number_format($price, 0, ',', '.') . 'đ';
        return $formattedPrice;
    }
}
