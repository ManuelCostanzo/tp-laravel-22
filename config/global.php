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
    ],
    'admin-mod_sections' => [
        'products' => [
            'controller'      => 'ProductController',
            'methods'         =>  [
                'missing'       => 'missing', 
                'minimum'       => 'minimum'
            ],
        ],
    ]
];