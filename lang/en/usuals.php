<?php

declare(strict_types=1);

return [
    'locales' => [
        'fr' => 'French',
        'en' => 'English',
    ],

    "event" => [
        "created"  => "Creation",
        "updated"  => "Modification",
        "deleted"  => "Suppression",
        "restored" => "Restoration",
    ],

    "resource_action" => [
        "create" => [
            'label'       => 'Add',
            'description' => 'Can add',
        ],

        "view" => [
            'label'       => 'View',
            'description' => 'Can view',
        ],

        "edit" => [
            'label'       => 'Edit',
            'description' => 'Can edit',
        ],

        "delete" => [
            'label'       => 'Delete',
            'description' => 'Can delete',
        ],

        "restore" => [
            'label'       => 'Restore',
            'description' => 'Can restore',
        ],

        "force-delete" => [
            'label'       => 'Delete permanently',
            'description' => 'Can delete permanently',
        ],
    ],

    "data" => [
        'trashed'       => 'Deleted|Deleted',
        'active'        => 'Active|Active',
        'list'          => 'List',
        'not_available' => "Sorry! No data available at the moment!!!",
    ],

    'timestamps' => [
        'created_at'   => 'Created',
        'updated_at'   => 'Modified',
        'deleted_at'   => 'Deleted',
        'published_at' => 'Published',
    ],

    'audit-report' => [
        "title"     => "Audit / History",
        "label"     => "Audit Report",
        "operation" => "Operation",
        "when"      => "when",
        "by"        => "by",
    ],

    "expression" => [
        'management' => "Management",
        'none'       => "None",
        "all"        => "All",
        "by"         => "By",
        "filters"    => "Filter(s)",
    ],

    "days-of-week" => [
        "label"     => "Days of the week",
        "monday"    => "Monday",
        "tuesday"   => "Tuesday",
        "wednesday" => "Wednesday",
        "thursday"  => "Thursday",
        "friday"    => "Friday",
        "saturday"  => "Saturday",
        "sunday"    => "Sunday",
    ],
];
