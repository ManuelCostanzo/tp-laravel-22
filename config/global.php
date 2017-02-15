<?php

return [
	'admin_sections' => [
        'locations' => [
            'controller'      => 'LocationController',
        ],
        'roles' => [
            'controller'      => 'RoleController',
        ],
        'brands' => [
            'controller'      => 'BrandController',
        ],
        'categories' => [
            'controller'      => 'CategoryController',
        ],
        'providers' => [
            'controller'      => 'ProviderController',
        ],
        'users' => [
            'controller'      => 'UserController',
        ],
    ],
    'admin-mod_sections' => [
        'products' => [
            'controller'      => 'ProductController',
            'methods'         =>  [
                'missing'       => 'missing', 
                'minimum'       => 'minimum'
            ],
        ],
        'menus' => [
            'controller'      => 'MenuController',
        ],
        'purchases' => [
            'controller'      => 'PurchaseController',
        ],
        'sales' => [
            'controller'      => 'SaleController',
        ],
    ]
];