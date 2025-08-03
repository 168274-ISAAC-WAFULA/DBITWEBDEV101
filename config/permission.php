<?php

return [
    'models' => [
        'permission' => Spatie\Permission\Models\Permission::class,
        'role' => Spatie\Permission\Models\Role::class,
    ],

    'table_names' => [
        'roles' => 'roles',
        'permissions' => 'permissions',
        'model_has_permissions' => 'model_has_permissions',
        'model_has_roles' => 'model_has_roles',
        'role_has_permissions' => 'role_has_permissions',
    ],

    'column_names' => [
        'model_morph_key' => 'model_id',
    ],

    'display_permission_in_exception' => false,

    'cache' => [
        'expiration_time' => \DateInterval::createFromDateString('24 hours'),
        'key' => 'spatie.permission.cache',
        'store' => 'default',
    ],

    // Custom configuration for cafeteria roles
    'roles_structure' => [
        'admin' => [
            'users' => 'c,r,u,d',
            'menu' => 'c,r,u,d',
            'inventory' => 'c,r,u,d',
            'orders' => 'c,r,u,d',
            'reports' => 'c,r,u,d',
            'settings' => 'c,r,u,d'
        ],
        'owner' => [
            'reports' => 'c,r,u,d',
            'settings' => 'c,r,u,d'
        ],
        'manager' => [
            'menu' => 'c,r,u',
            'inventory' => 'c,r,u',
            'orders' => 'c,r,u,d',
            'staff' => 'c,r,u'
        ],
        'cashier' => [
            'orders' => 'c,r,u',
            'payments' => 'c,r,u'
        ],
        'customerservice' => [
            'orders' => 'r,u',
            'reservations' => 'c,r,u,d'
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
