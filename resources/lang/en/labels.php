<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all'     => 'All',
        'yes'     => 'Yes',
        'no'      => 'No',
        'custom'  => 'Custom',
        'actions' => 'Actions',
        'active'  => 'Active',
        'buttons' => [
            'save'   => 'Save',
            'update' => 'Update',
        ],
        'hide'              => 'Hide',
        'inactive'          => 'Inactive',
        'none'              => 'None',
        'show'              => 'Show',
        'toggle_navigation' => 'Toggle Navigation',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create'     => 'Create Role',
                'edit'       => 'Edit Role',
                'management' => 'Role Management',

                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions'     => 'Permissions',
                    'role'            => 'Role',
                    'sort'            => 'Sort',
                    'total'           => 'role total|roles total',
                ],
            ],
            'language' => [
                'management' => 'Language Management'
            ],
            'users' => [
                'active'              => 'Active Users',
                'all_permissions'     => 'All Permissions',
                'change_password'     => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'create'              => 'Create User',
                'deactivated'         => 'Deactivated Users',
                'deleted'             => 'Deleted Users',
                'edit'                => 'Edit User',
                'management'          => 'User Management',
                'no_permissions'      => 'No Permissions',
                'no_roles'            => 'No Roles to set.',
                'permissions'         => 'Permissions',
                'age'                 => 'Age',
                'table' => [
                    'confirmed'      => 'Confirmed',
                    'created'        => 'Created',
                    'email'          => 'E-mail',
                    'id'             => 'ID',
                    'last_updated'   => 'Last Updated',
                    'name'           => 'Name',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted'     => 'No Deleted Users',
                    'roles'          => 'Roles',
                    'total'          => 'user total|users total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history'  => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'Avatar',
                            'confirmed'    => 'Confirmed',
                            'created_at'   => 'Created At',
                            'deleted_at'   => 'Deleted At',
                            'email'        => 'E-mail',
                            'last_updated' => 'Last Updated',
                            'name'         => 'Name',
                            'status'       => 'Status',
                        ],
                    ],
                ],

                'view' => 'View User',
            ],
        ],
        'languages' => [
            'languages_manager' => 'Languages Manager',
            'languages_management'=> 'Languages Management'
        ],
        'levels' => [
            'levels' => 'Leves',
            'levels_manager' => 'Levels Manager',
        ],
        'locations' => [
            'locations_manager' => 'Locations Manager',
            'regions' => 'Regions',
            'countries' => 'Countries',
            'cities' => 'Cities',
            'place_types' => 'Place Types',
            'places' => 'Places'
        ],
        'safety_degrees' => [
            'safety_degrees_manager' => 'Safety Degrees manager',
            'safety_degrees' => 'Safety Degrees',
        ],
        'activities' => [
            'activities_manager' => 'Activities Manager',
            'activity_types' => 'Activity Types',
            'activities' => 'Activities',
            'activity_media' => 'Activity Media',
        ],
        'interests' => [
            'interests_manager' => 'Interests Manager',
            'interests' => 'Interests'
        ],
        'religions' => [
            'religions_manager' => 'Religions Manager',
            'religions' => 'Religions'
        ],
        'lifestyles' => [
            'lifestyles_manager' => 'Life Styles Manager',
            'lifestyles' => 'Life Styles'
        ],
        'languages_spoken' => [
            'languages_spoken_manager' => 'Languages Spoken Manager',
            'languages_spoken' => 'Languages Spoken'
        ],
        'timings' => [
            'timings_manager' => 'Timings Manager',
            'timings' => 'Timings'
        ],
        'weekdays' => [
            'weekdays_manager' => 'Weekdays Manager',
            'weekdays' => 'Weekdays'
        ],
        'holidays' => [
            'holidays_manager' => 'Holidays Manager',
            'holidays' => 'Holidays'
        ],
        'hobbies' => [
            'hobbies_manager' => 'Hobbies Manager',
            'hobbies' => 'Hobbies'
        ],
        'emergency_numbers' => [
            'emergency_numbers_manager' => 'Emergency Numbers Manager',
            'emergency_numbers' => 'Emergency Numbers'
        ],
        'currencies' => [
            'currencies_manager' => 'Currencies Manager',
            'currencies' => 'Currencies'
        ],
        'cultures' => [
            'cultures_manager' => 'Cultures Manager',
            'cultures' => 'Cultures'
        ],
        'accommodations' => [
            'accommodations_manager' => 'Accommodations Manager',
            'accommodations' => 'Accommodations'
        ],
        'age_ranges' => [
            'age_ranges_manager' => 'Age Ranges Manager',
            'age_ranges' => 'Age Ranges'
        ],
        'cities' => [
            'cities_manager' => 'Cities Manager',
            'active_cities' => 'Active Cities',
        ],
        'embassies' => [
            'embassies_manager' => 'Embassies Manager',
            'active_embassies' => 'Active Embassies',
            'embassies' => 'Embassies'
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title'    => 'Login',
            'login_button'       => 'Login',
            'login_with'         => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button'    => 'Register',
            'remember_me'        => 'Remember Me',
        ],

        'passwords' => [
            'forgot_password'                 => 'Forgot Your Password?',
            'reset_password_box_title'        => 'Reset Password',
            'reset_password_button'           => 'Reset Password',
            'send_password_reset_link_button' => 'Send Password Reset Link',
        ],

        'macros' => [
            'country' => [
                'alpha'   => 'Country Alpha Codes',
                'alpha2'  => 'Country Alpha 2 Codes',
                'alpha3'  => 'Country Alpha 3 Codes',
                'numeric' => 'Country Numeric Codes',
            ],

            'macro_examples' => 'Macro Examples',

            'state' => [
                'mexico' => 'Mexico State List',
                'us'     => [
                    'us'       => 'US States',
                    'outlying' => 'US Outlying Territories',
                    'armed'    => 'US Armed Forces',
                ],
            ],

            'territories' => [
                'canada' => 'Canada Province & Territories List',
            ],

            'timezone' => 'Timezone',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar'             => 'Avatar',
                'created_at'         => 'Created At',
                'edit_information'   => 'Edit Information',
                'email'              => 'E-mail',
                'last_updated'       => 'Last Updated',
                'name'               => 'Name',
                'update_information' => 'Update Information',
            ],
        ],

    ],
];
