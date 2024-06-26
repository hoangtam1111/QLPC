<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductType extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='product_types';
    protected $fillable=[
        'id',
        'type_name'
    ];
}
