<?php

declare(strict_types=1);

return [
    'data' => [
        'created'             => 'Data created successfully.',
        'saved'               => 'Data saved successfully.',
        'updated'             => 'Data updated successfully.',
        'edited'              => 'Data modified successfully.',
        'changed'             => 'Data changed successfully.',
        'deleted'             => 'Data deleted successfully.',
        'destroyed'           => 'Data deleted successfully.',
        'restored'            => 'Data restored successfully.',
        'deleted_permanently' => 'Data permanently deleted successfully.',
        'removed'             => 'Data permanently deleted successfully.',
    ],

    'successfully' => [
        "logged_in"      => 'Login successfully! Welcome!!!',
        "logged_out"     => 'Logout successfully. See you soon !!!',
        "verified_email" => "Your email has been successfully verified.",
    ],

    'account' => [
        "created"           => 'Your account has been successfully created.',
        "password_resetted" => 'Password reset successfully.',
        "profile_updated"   => 'Profile updated successfully.',
        "password_updated"  => 'Password updated successfully.',
    ],

    "invalid" => [
        "token" => "Invalid token.",
    ],

    "auth" => [
        "login_success"  => "Hello! Welcome!!!",
        "logout_success" => "Thanks for your visit. See you soon!!!"
    ],

    'do_not_have_admin_rights'      => "You do not have the rights.",
    'must_be_connected_to_continue' => 'You must be connected to continue.',

    'are_you_sure'                                    => 'Are you sure?',
    'are_you_sure_you_want_to_do_this'                => 'Are you sure you want to proceed with this operation?',
    'are_you_sure_you_want_to_delete_this_data'       => 'Are you sure you want to delete this data?',
    'are_you_sure_you_want_to_force_delete_this_data' => 'Are you sure you want to permanently delete this data?',

    'login_to_start' => 'Please log in to start your session.',

    "status" => [
        'changed' => 'Status changed successfully.'
    ],

    'provided_credentials_do_not_match_records'       => "The information provided does not match our records.",
    'please_check_this_errors'                        => "Please check these errors.",
    'contact_message_sent_successfully'               => "Your message has been sent successfully.",
    "country_and_city_do_not_match"                   => "Country and city do not match.",
    "currencies_cannot_be_the_same"                   => "Currencies cannot be the same.",
    "cities_cannot_be_the_same"                       => "Cities cannot be the same.",
    "your_are_not_allowed_to_perform_this_action"     => "You are not allowed to perform this action.",
    "a_user_with_this_role_cannot_be_in_an_agency"    => "A user with the role :role cannot be in an agency.",
    "a_user_with_this_role_must_be_in_an_agency"      => "A user with the role :role must be in an agency.",
    "you_must_define_a_default_currency"              => "You must define a default currency.",
    "you_cannot_transfer_beyond_this_amount"          => "You cannot transfer beyond this amount.",
    "unable_to_complete_this_transaction"             => "Unable to complete this transaction.",
    "no_exchange_rates_available"                     => "No exchange rates available.",
    "transfer_completed_successfully"                 => "Transfer completed successfully.",
    "transaction_completed_successfully"              => "Transaction completed successfully.",
    "a_problem_has_occured"                           => "A problem has occurred.",
    "a_package_cannot_exceed_this_weight"             => "A package cannot exceed this weight.",
    "invalid_amount"                                  => "Invalid amount.",
    "package_registered_successfully"                 => "Package registered successfully.",
    "package_moved_successfully"                      => "Package moved successfully.",
    "boarding_completed_successfully"                 => "Boarding completed successfully.",
    "boarding_cannot_be_initiated_with_no_packages"   => "Boarding cannot be initiated for this shipment because it does not contain any packages.",
    "shipment_launched_successfully"                  => "Shipment launched successfully.",
    "shipment_arrival_confirmation_made_successfully" => "Shipment arrival confirmation made successfully.",
    "shipment_cancelled_successfully"                 => "Shipment cancelled successfully.",
    "shipment_already_has_packages_registered_in_it"  => "This shipment already has packages registered to it.",
    "choose_a_shipment_to_transfer_packages"          => "Please choose a shipment to transfer these packages to before canceling.",
];
