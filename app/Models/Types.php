<?php

namespace App\Models;

use App\Models\Types;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    use HasFactory;

    protected $table = 'types';
    protected $primaryKey = 'type_id';

}
