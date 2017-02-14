<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	protected $fillable = ['date'];


    public  function scopeLike($query, $value){
        return $query->where('date', '=', "%$value%");
    }

	public function products()
	{
	    return $this->belongsToMany('App\Product', 'menu_product');
	}
}