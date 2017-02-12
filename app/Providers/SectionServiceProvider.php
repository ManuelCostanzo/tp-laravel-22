<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class SectionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('sections', [
                'brands' => [
                    'icon'      => 'fa-empire',
                    'permission' => 'admin',
                ],
                'categories' => [
                    'icon'      => 'fa-tags',
                    'permission' => 'admin',
                ],
                'products' => [
                    'icon'      => 'fa-cutlery',
                    'permission' => 'admin-mod',
                    'methods'   =>  [
                        'missing' => 'Missing', 
                        'minimum' => 'Minimum'
                    ],
                ],
                'providers' => [
                    'icon'      => 'fa-user',
                    'permission' => 'admin',
                ],
            ]
        );
    }
}
