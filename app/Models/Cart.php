<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='carts';
    protected $fillable=[
        'id',
        'product_id',
        'user_id',
        'quantity'
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function price_format($price)
    {
        $formattedPrice = number_format($price, 0, ',', '.') . 'đ';
        return $formattedPrice;
    }
}
