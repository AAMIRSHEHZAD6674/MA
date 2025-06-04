<?php
return [
    'roles' => [
        'admin',
        'deo',
        'sdeo',
        'asdeo',
    ],
    // Map role to allowed permissions (example)
    'permissions' => [
        'admin' => ['manage_users', 'view_all_reports'],
        'deo' => ['view_own_reports'],
        'sdeo' => ['view_own_reports'],
        'asdeo' => ['view_own_reports'],
    ],
];
