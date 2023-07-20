<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','menu_id'];

    public function category(){

        return $this->hasMany(Category::class,'base_id');

    }


}
