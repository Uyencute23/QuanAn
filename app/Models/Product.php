<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_type_id',
        'name',
        'price',
        'img',
        'description',
    ];
    public function productype()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }
    //rating
    public function rating()
    {
        return $this->hasMany(Rating::class, 'product_id');
    }
}
