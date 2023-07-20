<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
        'product_id',
        'color',
        'color_code'
    ];
    use HasFactory;
}
