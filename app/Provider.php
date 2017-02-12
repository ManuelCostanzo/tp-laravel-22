<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
	protected $fillable = ['name', 'cuit'];


	public function products()
	{
	    return $this->hasMany('App\Product');
	}
}