<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Sale extends Model
{
	protected $fillable = ['description'];


    public  function scopeLike($query, $value){
        return $query->where('description', 'LIKE', "%$value%");
    }

	public function products()
	{
	    return $this->belongsToMany('App\Product', 'product_sale')
	    			->withPivot('quantity', 'unit_price');
	}
}