<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'customer_id';

    protected $fillable = [
        'username',
        'address',
        'contact_number',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}


