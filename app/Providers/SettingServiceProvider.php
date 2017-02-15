<?php

namespace App\Providers;

use Config;
use Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    	if(Schema::hasTable('settings'))
	        Config::set('settings', \App\Setting::first());
	    
	}
}