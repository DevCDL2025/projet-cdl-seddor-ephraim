<?php

declare(strict_types=1);

return [
    "resource" => [
        'admin'             => 'Administrateur|Administrateurs',
        'user'              => 'Utilisateur|Utilisateurs',
        'customer'          => 'Client|Clients',
        'role'              => 'Rôle|Rôles',
        'permission'        => 'Permission|Permissions',
        'identity-document' => "Pièce d'identité|Pièces d'identité",
        'setting'           => 'Paramètre|Paramètres',
        'speciality'        => 'Spécialité|Spécialités',
        'department-type'   => 'Type Département|Types Département',
        'department'        => 'Département|Départements',
        'position'          => 'Position|Positions',
        'staff'             => 'Personnel|Personnel',
        'doctor'            => 'Médecin|Médecins',
        'schedule'          => 'Disponibilité|Disponibilités',
        'nurse'             => 'Infirmier(e)|Infirmier(e)s',
        'worker'            => 'Employé|Employés',
        'appointment'       => 'Rendez-vous|Rendez-vous',
    ],

    "manage" => [
        'label'       => 'Gestion',
        'permissions' => 'Gestion des droits',
        'users'       => 'Gestion des utilisateurs',
        'pricing'     => 'Gestion des frais',
        'transfers'   => 'Gestion des transferts',
        'packages'    => 'Gestion des colis',
        'charges'     => 'Gestion des sorties',
        'staffs'     => 'Gestion du personnel',
        'corporate-structure'     => 'Structure organisationnelle',
    ],

    "status" => [
        "label" => "Status",

        "pending" => [
            'label'       => 'En attente',
            'description' => 'En attente',
        ],

        "cancelled" => [
            'label'       => 'Annuler',
            'description' => 'Annulé(e)|Annulé(e)s',
        ],

        "sent" => [
            'label'       => 'Envoyer',
            'description' => 'Envoyé(e)|Envoyé(e)s',
        ],

        "received" => [
            'label'       => 'Reçevoir',
            'description' => 'Reçu(e)|Reçu(e)s',
        ],

        "enabled" => [
            'label'       => 'Activer',
            'description' => 'Actif(ve)|Actif(ve)s',
        ],

        "inactive" => [
            'label'       => 'Désactiver',
            'description' => 'Inactif(ve)|Inactif(ve)s',
        ],

        "disabled" => [
            'label'       => 'Désactiver',
            'description' => 'Désactivé(e)|Désactivé(ve)s',
        ],

        "in-progress" => [
            'label'       => 'En cours',
            'description' => 'En cours|En cours',
        ],

        "ready-to-ship" => [
            'label'       => "Prêt à l'expédition",
            'description' => "Prêt à l'expédition|Prêt à l'expédition",
        ],

        "shipped" => [
            'label'       => 'Expédié',
            'description' => 'Expédié(e)|Expédié(e)s',
        ],

        "arrived" => [
            'label'       => 'Arrivé',
            'description' => 'Arrivé(e)|Arrivé(e)s',
        ],

        "awaiting-shipment" => [
            'label'       => "En attente d'empbarquement",
            'description' => "En attente d'empbarquement|En attente d'empbarquement",
        ],

        "registered" => [
            'label'       => 'Enregistrer',
            'description' => 'Enregistré(e)|Enregistré(e)s',
        ],

        "shipping" => [
            'label'       => "En cours d'expédition",
            'description' => "En cours d'expédition|En cours d'expédition",
        ],

        "retrieved" => [
            'label'       => 'Récupérer',
            'description' => 'Récupéré(e)|Récupéré(e)s',
        ],

        "late" => [
            'label'       => 'En retard',
            'description' => 'En retard|En retard',
        ],

        "payment-in-progress" => [
            'label'       => 'Paiement en cours',
            'description' => 'Paiement en cours|Paiement en cours',
        ],

        "payment-made" => [
            'label'       => 'Paiement effectué',
            'description' => 'Paiement effectué|Paiement effectués',
        ],
    ],

    "fees" => [
        "label" => "Frais",

        "type" => [
            "percentage" => "Pourçentage",
            "numeric"    => "Numérique",
            "forfeit"    => "Forfait",
        ],
    ],

    "staff" => [
        "type" => [
            "doctor"    => "Médecin",
            "nurse" => "Infirmier(e)",
            "worker" => "Personnel"
        ],
    ],

    "customer" => [
        "type_label" => "Type de client",

        "type" => [
            "physical" => "Personne physique",
            "moral"    => "Personne morale",
        ]
    ],

    "sender"   => "Expéditeur",
    "receiver" => "Bénéficiaire",

    "amount" => [
        "label"                => "Montant",
        "to_send"              => "Montant à envoyer",
        "to_receive"           => "Montant à recevoir",
        "to_pay"               => "Montant à payer",
        "paid_on_deposit"      => "Montant payé au dépôt",
        "remains_to_be_paid"   => "Reste à payer",
        "remaining_to_be_paid" => "Reste à payer",
    ],

    "set_as_default_currency"                          => "Définir comme devise par défaut",
    "date_and_hour"                                    => "Date & heure",
    "identity_document_number"                         => "N° pièce d'identité",
    "shipping_calendar"                                => "Calendrier expéditions",
    "choose_agency_that_will_confirm_shipment_arrival" => "Sélectionner l'agence qui va recevoir l'expédition",

    "shipping" => [
        "new"              => "Nouvelle expédition",
        "start-boarding"   => "Lancer l'embarquement",
        "launch"           => "Lancer l'expédition",
        "confirm-arrival"  => "Confirmer l'arrivée",
        "move_on_this_one" => "Déplacer sur cette expédition",
        "arrival"          => "Arrivée des expéditions",
        "cancel"           => "Annuler l'expédition",
        "report-delay"     => "Signaler un retard",
        "last_hundred"     => "Les 100 dernières expéditions",

        "creation" => [
            "mode-choice"       => "Choix du mode de création",
            "from-program"      => "Créer expéditions à partir d'un programme",
            "from-this-program" => "Créer à partir de ce programme",
            "edit-before"       => "Modifier avant de créer",
            "over-a-period"     => "Créer expéditions sur une période",
            "for-multi-date"    => "Créer expéditions pour plusieurs dates",
            "for-specific-date" => "Créer expédition pour une date spécifique",
        ]
    ],

    "package" => [
        "new"                      => "Nouveau colis",
        "collect"                  => "Récupérer colis",
        "weight"                   => "Poids du colis",
        "details"                  => "Détails du colis",
        "file"                     => "Image du colis",
        "final_destination"        => "Destination finale",
        "fragility"                => "Fragilité",
        "shipper"                  => "Expéditeur",
        "retriever"                => "Destinataire",
        "registered_at"            => "Date d'enregistrement",
        "retrieved_at"             => "Date de récupération",
        "shipping"                 => "Expédition",
        "retrieving"               => "Réception",
        "retrieve"                 => "Récupérer",
        "ship"                     => "Expédier",
        "move_to_another_shipment" => "Déplacer vers une autre expédition",
        "fragile"                  => "Colis fragile",
        "last_hundred"             => "Les 100 derniers colis",
    ],

    "fragility" => [
        "rate"       => "Taux fragilité",
        "fee_amount" => "Montant frais fragilité",
    ],

    "charge" => [
        "new"  => "Nouvelle charge",
        "view" => "Voir les charges",
    ],

    "manifest" => [
        "download" => "Télécharger le manifeste",
    ],

    "total_fees" => "Total frais",
    "total_weight" => "Poids total",

    "benefit" => "Bénéfice",
    "loss" => "Perte",

    "details-incomes" => "Détails revenus",
    "special-costs" => "Frais particuliers",
    "define-special-charges" => "Définir des frais particuliers",
    "special-rate" => "Taux / Pourcentage spécial",
    "special-forfeit" => "Forfait spécial",

    "statistics" => [
        "label" => "Statistiques",
        "of"    => "Statistiques des",
    ],

    "input_output_reports" => "Rapports Entrées / Sorties",
];
