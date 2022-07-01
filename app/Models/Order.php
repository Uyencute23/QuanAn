<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'promo_id',
        'shippingfee',
        'total',
        'delivery_time',
        'status',
       

    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id')->with('user');
    }
    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class,'order_id');
    }
    // public function user()
    // {
    //     return $this->belongsTo(User::class,'customer_id');
    // }

    //order belongtoMany user
    // public function user()
    // {
    //     return $this->hasOneThrough(User::class,Customer::class,'id','id','id','user_id');
    // }
    public function promo()
    {
            return $this->belongsTo(Promotion::class,'promo_id');
      
    }
    
}
