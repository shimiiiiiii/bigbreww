<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_name',
        'category',
        'price',
        'product_pic'
    ];

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'product_id');
    }
}

