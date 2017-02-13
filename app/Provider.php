<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
	protected $fillable = ['name', 'cuit'];


    public  function scopeLike($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }

    public  function scopeLikeAll($query, $value){
        return $query->where('name', 'LIKE', "%$value%")
        			 ->orWhere('cuit', '=', $value);
    }

	public function products()
	{
	    return $this->hasMany('App\Product');
	}
}