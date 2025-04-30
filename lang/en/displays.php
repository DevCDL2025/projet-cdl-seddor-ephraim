<?php

declare(strict_types=1);

return [
    "resource" => [
        'admin'             => 'Administrator|Administrators',
        'user'              => 'User|Users',
        'customer'          => 'Customer|Customers',
        'role'              => 'Role|Roles',
        'permission'        => 'Permission|Permissions',
        'identity-document' => "Identity Document|Identity Documents",
        'setting'           => 'Settings|Settings',
        'speciality'        => 'Specialty|Specialties',
        'department-type'   => 'Department Type|Department Types',
        'department'        => 'Department|Departments',
        'position'          => 'Position|Positions',
        'staff'             => 'Staff|Staff',
        'doctor'            => 'Doctor|Doctors',
        'schedule'          => 'Schedule|Schedules',
        'nurse'             => 'Nurse|Nurses',
        'worker'            => 'Employee|Employees',
        'appointment'       => 'Appointment|Appointments',
    ],

    "manage" => [
        'label'           => 'Manage',
        'permissions'     => 'Permissions management',
        'users'           => 'Users management',
        'pricing'         => 'Fees management',
        'transfers'       => 'Transfers management',
        'packages'        => 'Packages management',
        'charges'         => 'Cash management',
        'department-type' => 'Department Type|Department Types',
        'department'      => 'Department|Departments',
        'speciality'      => 'Speciality|Specialities',
        'doctor'          => 'Doctor|Doctors',
        'schedule'        => 'Schedule|Schedules',
        'staffs'         => 'Manage Staff',
    ],

    "status" => [
        "label" => "Status",

        "pending" => [
            'label'       => 'Pending',
            'description' => 'Pending',
        ],

        "cancelled" => [
            'label'       => 'Cancel',
            'description' => 'Cancelled|Cancelled',
        ],

        "sent" => [
            'label'       => 'Send',
            'description' => 'Sent|Sent',
        ],

        "received" => [
            'label'       => 'Receive',
            'description' => 'Received|Received',
        ],

        "enabled" => [
            'label'       => 'Enable',
            'description' => 'Active|Active',
        ],

        "inactive" => [
            'label'       => 'Disable',
            'description' => 'Inactive|Inactive',
        ],

        "disabled" => [
            'label'       => 'Disable',
            'description' => 'Disabled|Disabled',
        ],

        "in-progress" => [
            'label'       => 'In Progress',
            'description' => 'In Progress|In Progress',
        ],

        "ready-to-ship" => [
            'label'       => "Ready to ship",
            'description' => "Ready to ship|Ready to ship",
        ],

        "shipped" => [
            'label'       => 'Shipped',
            'description' => 'Shipped|Shipped',
        ],

        "arrived" => [
            'label'       => 'Arrived',
            'description' => 'Arrived|Arrived',
        ],

        "awaiting-shipment" => [
            'label'       => "Awaiting shipment",
            'description' => "Awaiting shipment|Awaiting shipment",
        ],

        "registered" => [
            'label'       => 'Registered',
            'description' => 'Registered|Registered',
        ],

        "shipping" => [
            'label'       => "Shipping",
            'description' => "Shipping|Shipping",
        ],

        "retrieved" => [
            'label'       => 'Retrieved',
            'description' => 'Retrieved|Retrieved',
        ],

        "late" => [
            'label'       => 'Late',
            'description' => 'Late|Late',
        ],

        "payment-in-progress" => [
            'label'       => 'Payment in progress',
            'description' => 'Payment in progress|Payment in progress',
        ],

        "payment-made" => [
            'label'       => 'Payment made',
            'description' => 'Payment made|Payment made',
        ],
    ],

    "fees" => [
        "label" => "Fees",

        "type" => [
            "percentage" => "Percentage",
            "numeric"    => "Numeric",
            "forfeit"    => "Forfeit",
        ],
    ],

    "staff" => [
        "type" => [
            "doctor"    => "Doctor",
            "nurse" => "Nurse",
            "worker" => "Worker"
        ],
    ],

    "customer" => [
        "type_label" => "Customer Type",

        "type" => [
            "physical" => "Physical Person",
            "moral"    => "Moral Person",
        ]
    ],

    "sender"   => "Sender",
    "receiver" => "Recipient",

    "amount" => [
        "label"                => "Amount",
        "to_send"              => "Amount to send",
        "to_receive"           => "Amount to receive",
        "to_pay"               => "Amount to pay",
        "paid_on_deposit"      => "Amount paid on deposit",
        "remains_to_be_paid"   => "Remains to be paid",
        "remaining_to_be_paid" => "Remaining to be paid",
    ],

    "set_as_default_currency"                          => "Set as default currency",
    "date_and_hour"                                    => "Date & hour",
    "identity_document_number"                         => "N° ID",
    "shipping_calendar"                                => "Shipping Calendar",
    "choose_agency_that_will_confirm_shipment_arrival" => "Select the agency that will receive the shipment",

    "shipping" => [
        "new"              => "New shipment",
        "start-boarding"   => "Start boarding",
        "launch"           => "Start shipment",
        "confirm-arrival"  => "Confirm arrival",
        "move_on_this_one" => "Move on this shipment",
        "arrival"          => "Arrival of shipments",
        "cancel"           => "Cancel shipment",
        "report-delay"     => "Report a delay",
        "last_hundred"     => "Last 100 shippings",

        "creation" => [
            "mode-choice"       => "Choice of creation mode",
            "from-program"      => "Create shipments from a program",
            "from-this-program" => "Create from this program",
            "edit-before"       => "Edit before create",
            "over-a-period"     => "Create shipments over a period",
            "for-multi-date"    => "Create shipments for multiple dates",
            "for-specific-date" => "Create shipment for a specific date",
        ]
    ],

    "package" => [
        "new"                      => "New package",
        "collect"                  => "Collect package",
        "weight"                   => "Package weight",
        "details"                  => "Package details",
        "file"                     => "Package image",
        "final_destination"        => "Final destination",
        "fragility"                => "Fragility",
        "shipper"                  => "Shipper",
        "retriever"                => "Retriever",
        "registered_at"            => "Registered at",
        "retrieved_at"             => "Retrieved at",
        "shipping"                 => "Shipping",
        "retrieving"               => "Retrieving",
        "retrieve"                 => "Retrieve",
        "ship"                     => "Ship",
        "move_to_another_shipment" => "Move to another shipment",
        "fragile"                  => "Fragile package",
        "last_hundred"             => "Last 100 packages",
    ],

    "fragility" => [
        "rate"       => "Rate on fragility",
        "fee_amount" => "Fragility fee amount",
    ],

    "charge" => [
        "new"  => "New charge",
        "view" => "View charges",
    ],

    "manifest" => [
        "download" => "Download manifest",
    ],

    "total_fees" => "Total fees",
    "total_weight" => "Total weight",

    "benefit" => "Benefit",
    "loss" => "Loss",

    "details-incomes" => "Details incomes",
    "special-costs" => "Special costs",
    "define-special-charges" => "Define special charges",
    "special-rate" => "Special rate / percentage",
    "special-forfeit" => "Special forfeit",

    "statistics" => [
        "label" => "Statistics",
        "of"    => "Statistics of",
    ],

    "input_output_reports" => "Input / Output reports",
];
