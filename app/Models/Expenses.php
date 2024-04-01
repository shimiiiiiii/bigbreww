<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    protected $primaryKey = 'expenses_id';

    protected $table = 'expenses';

    protected $fillable = [
        'expenses_id',
        'exp_img',
        'expenses_name',
        'type_id',
        'quantity',
        'expenses_price',
        'expenses_date'
    ];
}
