<?php
return [
    '/admin/' => 'admin/site/index',
    'login' => 'site/login',
    'about' => 'site/about',
    'contact' => 'site/contact',
    'cart' => 'cart/index',
    'checkout' => 'checkout/index',
    [
        'pattern' => 'account/<id:[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}>',
        'route' => 'user/view',
    ],
    [
        'pattern' => 'product/<id:[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}>',
        'route' => 'product/view',
    ],
    [
        'pattern' => 'products/<per-page:\d+>/<page:\d+>',
        'route' => 'product/index',
        'defaults' => ['page' => '', 'per-page' => ''],
    ],
    [
        'pattern' => 'category/<id:[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}>',
        'route' => 'category/view',
    ],
    [
        'pattern' => 'brand/<id:[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}>',
        'route' => 'brand/view',
    ],
];
