<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	protected $fillable = ['name'];


    public  function scopeLike($query, $value){
        return $query->where('name', 'LIKE', "%$value%");
    }

	public function products()
	{
	    return $this->hasMany('App\Product');
	}
}