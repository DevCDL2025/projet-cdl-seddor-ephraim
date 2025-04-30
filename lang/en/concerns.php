<?php

declare(strict_types=1);

return [
    "dashboard" => [
        'label' => 'Dashboard',

        "page" => [
            'title'   => 'Dashboard',
            'heading' => 'Dashboard',
        ]
    ],

    'auth' => [
        'login' => [
            'label' => 'Log in',

            "page" => [
                'title'   => 'Log in',
                'heading' => 'Log in',
            ]
        ],

        'logout' => [
            'label' => 'Log out',
        ],
    ],

    "profile" => [
        "account"         => [
            'label' => "My Account",

            "page" => [
                'title'   => 'My Account',
                'heading' => 'My Account',
            ]
        ],
        "details"         => [
            'label' => "My Profile",

            "page" => [
                'title'   => "My Profile",
                'heading' => 'My profile',
            ]
        ],
        "edit"            => [
            'label'       => "Edit",
            'description' => "Edit my profile",

            "page" => [
                'title'   => "Edit my profile",
                'heading' => "Edit my profile",
            ]
        ],
        "change-password" => [
            'label' => "Change password",

            "page" => [
                'title'   => "Change password",
                'heading' => "Change password",
            ]
        ],
    ]
];
