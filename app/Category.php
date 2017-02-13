<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name', 'parent_id'];


    public  function scopeLike($query, $value){
        return $query->where('name', 'LIKE', "%$value%");
    }


	public function parent()
	{
	    return $this->belongsTo(self::class, 'parent_id');
	}

	public function children()
	{
	    return $this->hasMany(self::class, 'parent_id');
	}

	public function products()
	{
	    return $this->hasMany('App\Product');
	}
}