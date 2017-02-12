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
                ],
                'categories' => [
                    'icon'      => 'fa-tags',
                ],
                'products' => [
                    'icon'      => 'fa-cutlery',
                    'methods'   =>  [
                        'missing' => 'Missing', 
                        'minimum' => 'Minimum'
                    ],
                ],
                'providers' => [
                    'icon'      => 'fa-user',
                ],
            ]
        );
    }
}
