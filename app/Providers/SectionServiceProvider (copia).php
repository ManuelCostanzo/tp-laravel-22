<?php

namespace App\Providers;

use View;
use Config;
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
        //Config::set('settings', \App\Setting::find(1));


    }
}
