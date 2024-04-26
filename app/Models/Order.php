<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='orders';
    protected $fillable=[
        'id',
        'user_id',
        'total_amount',
        'active'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
