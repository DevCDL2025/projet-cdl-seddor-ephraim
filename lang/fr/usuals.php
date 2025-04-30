<?php

declare(strict_types=1);

return [
    'locales'       => [
        'fr'        => 'Français',
        'en'        => 'Anglais',
    ],

    "event"         => [
        "created"   => "Création",
        "updated"   => "Modification",
        "deleted"   => "Suppression",
        "restored"  => "Restauration",
    ],

    "resource_action" => [
        "create" => [
            'label'         => 'Ajouter',
            'description'   => 'Peut ajouter',
        ],

        "view" => [
            'label'         => 'Voir',
            'description'   => 'Peut voir',
        ],

        "edit" => [
            'label'         => 'Editer',
            'description'   => 'Peut éditer',
        ],

        "delete" => [
            'label'         => 'Supprimer',
            'description'   => 'Peut supprimer',
        ],

        "restore" => [
            'label'         => 'Restaurer',
            'description'   => 'Peut restaurer',
        ],

        "force-delete" => [
            'label'         => 'Supprimer définitivement',
            'description'   => 'Peut supprimer définitivement',
        ],
    ],

    "data" => [
        'trashed'           => 'Supprimé(e)|Supprimé(e)s',
        'active'            => 'Actif|Actif(s)',
        'list'              => 'Liste',
        'not_available'     => "Désolé ! Aucune données disponibles pour le moment !!!",
    ],

    'timestamps' => [
        'created_at'    => 'Créé le',
        'updated_at'    => 'Modifié le',
        'deleted_at'    => 'Supprimé le',
        'published_at'  => 'Publié le',
    ],

    'audit-report' => [
        "title"         => "Audit / Historique",
        "label"         => "Rapport d'audit",
        "operation"     => "Opération",
        "when"          => "quand",
        "by"            => "par",
    ],

    "expression" => [
        'management' => "Gestion",
        'none'       => "Aucun(e)",
        "all"        => "Tout",
        "by"         => "Par",
        "filters"    => "Filtre(s)",
    ],

    "days-of-week" => [
        "label"     => "Jours de la semaine",
        "monday"    => "Lundi",
        "tuesday"   => "Mardi",
        "wednesday" => "Mercredi",
        "thursday"  => "Jeudi",
        "friday"    => "Vendredi",
        "saturday"  => "Samedi",
        "sunday"    => "Dimanche",
    ],
];
