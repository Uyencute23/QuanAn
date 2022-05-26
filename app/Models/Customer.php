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
}
