<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	protected $fillable = ['title', 'description', 'contact_email', 'items_per_page',
						   'site_enabled', 'maintenance_message'];
}