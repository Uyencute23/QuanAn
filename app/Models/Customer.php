<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'img'
    ];
    public function cart()
    {
        return $this->hasOne(Cart::class, 'customer_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function order()
    {
        return $this->hasMany(Order::class,'customer_id');
    }
    //get hasmanythrough order_detail
    public function order_detail()
    {
        return $this->hasManyThrough(OrderDetail::class,Order::class,'customer_id','order_id','id','id');
    }
}
