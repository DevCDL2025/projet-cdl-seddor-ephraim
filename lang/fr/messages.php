<?php

declare(strict_types=1);

return [
    'data' => [
        'created'             => 'Donnée(s) créée(s) avec succès.',
        'saved'               => 'Donnée(s) enregistrée(s) avec succès.',
        'updated'             => 'Donnée(s) mise(s) à jour avec succès.',
        'edited'              => 'Donnée(s) modifiée(s) avec succès.',
        'changed'             => 'Donnée(s) changée(s) avec succès.',
        'deleted'             => 'Donnée(s) supprimée(s) avec succès.',
        'destroyed'           => 'Donnée(s) supprimée(s) avec succès.',
        'restored'            => 'Donnée(s) restaurée(s) avec succès.',
        'deleted_permanently' => 'Donnée(s) supprimée(s) définitivement avec succès.',
        'removed'             => 'Donnée(s) supprimée(s) définitivement avec succès.',
    ],

    'successfully' => [
        "logged_in"      => 'Connexion effectuée avec succès ! Bienvenue !!!',
        "logged_out"     => 'Déconnexion effectuée avec succès. A bientôt !!!',
        "verified_email" => "Votre email a été vérifié avec succès.",
    ],

    'account' => [
        "created"           => 'Votre compte a été créé avec succès.',
        "password_resetted" => 'Mot de passe réinitialisé avec succès.',
        "profile_updated"   => 'Profil mis à jour avec succès.',
        "password_updated"  => 'Mot de passe mis à jour avec succès.',
    ],

    "invalid" => [
        "token" => "Token invalide.",
    ],

    "auth" => [
        "login_success"  => "Salut ! Bienvenue !!!",
        "logout_success" => "Merci de votre visite. A bientôt !!!"
    ],

    'do_not_have_admin_rights'      => "Vous n'avez pas les droits.",
    'must_be_connected_to_continue' => 'Vous devez être connecté pour continuer.',

    'are_you_sure'                                    => 'Etes-vous sûre ?',
    'are_you_sure_you_want_to_do_this'                => 'Etres-vous sûre que vous voulez poursuivre cette opération ?',
    'are_you_sure_you_want_to_delete_this_data'       => 'Etes-vous sûre de vouloir supprimer cette donnée ?',
    'are_you_sure_you_want_to_force_delete_this_data' => 'Etes-vous sûre de vouloir supprimer cette donnée de façon définitive ?',

    'login_to_start' => 'Veuillez vous connecter pour démarrer votre session.',

    "status" => [
        'changed' => 'Statut changé avec succès.'
    ],

    'provided_credentials_do_not_match_records'       => "Les informations fournies ne correspondent pas à nos enregistrements.",
    'please_check_this_errors'                        => "Veuillez vérifier ces erreurs.",
    'contact_message_sent_successfully'               => "Votre message a été envoyé avec succès.",
    "country_and_city_do_not_match"                   => "Le pays et la ville ne correspondent pas.",
    "currencies_cannot_be_the_same"                   => "Les devises ne peuvent pas être les mêmes.",
    "cities_cannot_be_the_same"                       => "Les villes ne peuvent pas être les mêmes.",
    "your_are_not_allowed_to_perform_this_action"     => "Vous n'êtes pas autorisé à effectuer cette action.",
    "a_user_with_this_role_cannot_be_in_an_agency"    => "Un utilisateur ayant pour rôle :role ne peut être dans une agence.",
    "a_user_with_this_role_must_be_in_an_agency"      => "Un utilisateur ayant pour rôle :role doit être dans une agence.",
    "you_must_define_a_default_currency"              => "Il faut obligatoirement définir une devise par défaut.",
    "you_cannot_transfer_beyond_this_amount"          => "Vous ne pouvez pas transférer au-delà de ce montant.",
    "unable_to_complete_this_transaction"             => "Impossible d'effectuer cette transaction.",
    "no_exchange_rates_available"                     => "Aucun taux de change disponibles.",
    "transfer_completed_successfully"                 => "Transfert effectué avec succès.",
    "transaction_completed_successfully"              => "Transaction effectuée avec succès.",
    "a_problem_has_occured"                           => "Un problème est survenu.",
    "a_package_cannot_exceed_this_weight"             => "Un colis ne peut pas dépasser ce poids.",
    "invalid_amount"                                  => "Montant invalide.",
    "package_registered_successfully"                 => "Colis enregistré avec succès.",
    "package_moved_successfully"                      => "Colis déplacé avec succès.",
    "boarding_completed_successfully"                 => "Embarquement effectué avec succès.",
    "boarding_cannot_be_initiated_with_no_packages"   => "L'embarquement ne peut pas être lancé pour cette expédition car elle ne contient pas de colis.",
    "shipment_launched_successfully"                  => "Expédition lancée avec succès.",
    "shipment_arrival_confirmation_made_successfully" => "Confirmation d'arrivée de l'expédition effectuée avec succès.",
    "shipment_cancelled_successfully"                 => "Expédition annulée avec succès.",
    "shipment_already_has_packages_registered_in_it"  => "Cette expédition a déjà des colis qui y sont enregistrés.",
    "choose_a_shipment_to_transfer_packages"          => "Veuillez choisir une expédition sur laquelle transférer ces colis avant de procéder à l'annulation.",
];
