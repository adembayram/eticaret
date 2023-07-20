<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $fillable = [
        'user_id',
        'name',
        'mail',
        'country',
        'city',
        'postcode',
        'address',

    ];
    use HasFactory;
}
