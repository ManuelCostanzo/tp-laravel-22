<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	protected $fillable = ['name'];

    public  function scopeLike($query, $value){
        return $query->where('name', 'LIKE', "%$value%");
    }
    
	public function users()
	{
	    return $this->hasMany('App\User');
	}
}