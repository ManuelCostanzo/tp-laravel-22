<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name', 'parent_id'];
	protected $rules = [
    	'name' => 'sometimes|required|name|unique:categories',
	];

	public function parent()
	{
	    return $this->belongsTo(self::class, 'parent_id');
	}

	public function children()
	{
	    return $this->hasMany(self::class, 'parent_id');
	}
}