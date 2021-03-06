<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'product_id',
        'rating',
        'content',
        'img',
    ];

    //customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
