<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Brand extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='brands';
    protected $fillable=[
        'id',
        'brand_name',
        'brand_logo'
    ];
}
