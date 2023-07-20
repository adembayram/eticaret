<?php 


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

	use HasFactory;

	protected $fillable = ['name'];

	public function baseCategory(){

		return $this->hasMany(BaseCategory::class,'menu_id');

	}


}