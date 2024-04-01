<?php

namespace App\Models;

use App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $primaryKey = 'inventory_id';

    protected $table = 'inventory';

    protected $fillable =
    [
        'inventory_id',
        'prod_img',
        'stock_name',
        'prod_category',
        'stock_quantity'
    ];
}
