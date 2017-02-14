<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
	protected $fillable = ['provider_id', 'bill'];


    public  function scopeLike($query, $value){
        return $query->where('created_at', '=', $value);
    }

	public function products()
	{
	    return $this->belongsToMany('App\Product', 'product_purchase')
	    			->withPivot('quantity');
	}

	public function provider()
	{
	    return $this->belongsTo('App\Provider');
	}
}