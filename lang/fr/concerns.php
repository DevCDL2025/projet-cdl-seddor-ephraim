<?php

declare(strict_types=1);

return [
    "dashboard" => [
        'label' => 'Tableau de bord',

        "page" => [
            'title'   => 'Tableau de bord',
            'heading' => 'Tableau de bord',
        ]
    ],

    'auth' => [
        'login' => [
            'label' => 'Se connecter',

            "page" => [
                'title'   => 'Connexion',
                'heading' => 'Connexion',
            ]
        ],

        'logout' => [
            'label' => 'Déconnexion',
        ],
    ],

    "profile" => [
        "account" => [
            'label' => "Mon compte",

            "page" => [
                'title'   => 'Mon compte',
                'heading' => 'Mon compte',
            ]
        ],

        "details" => [
            'label' => "Mon profil",

            "page" => [
                'title'   => "Mon profil",
                'heading' => 'Mon profil',
            ]
        ],

        "edit" => [
            'label'       => "Modifier",
            'description' => "Modifier mon profil",

            "page" => [
                'title'   => "Modifier mon profil",
                'heading' => "Modifier mon profil",
            ]
        ],

        "change-password" => [
            'label' => "Changer le mot de passe",

            "page" => [
                'title'   => "Changer le mot de passe",
                'heading' => "Changer le mot de passe",
            ]
        ],
    ]
];
