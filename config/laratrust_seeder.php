<?php

return [
    'role_structure' => [
        'Owner' => [
            'users' => 'o',

        ],
        'Doctor' => [
            'users' => 'd',

        ],
        'Employee' => [
            'users' => 'e',

        ],

    ],


    'permissions_map' => [
        'e' => 'emp',
        'd' => 'doc',
        'o' => 'own',
    ],
];
