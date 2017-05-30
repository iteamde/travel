<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Access\Regions\Regions;
use App\Models\Access\Regions\RegionsTranslation;
use App\Models\SafetyDegree\SafetyDegreeTrans;

return [
    /*
     * Users table used to store users
     */
    'users_table' => 'users',

    /*
     * Role model used by Access to create correct relations. Update the role if it is in a different namespace.
    */
    'role' => Role::class,

    /*
     * Roles table used by Access to save roles to the database.
     */
    'roles_table' => 'roles',

    /*
     * Languages table used by Access to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * Countries table used by Access to save roles to the database.
     */
    'country_table' => 'countries',

    /*
     * regions model used by Access to create correct relations.
     * Update the permission if it is in a different namespace.
     */
    'regions' => Regions::class,

    /*
     * Regions table used by Access to save roles to the database.
     */
    'regions_table' => 'conf_regions',

    /*
     * regions_trans model used by Access to create correct relations.
     * Update the permission if it is in a different namespace.
     */
    'regions_trans' => RegionsTranslation::class,

    /*
     * RegionsTranslation table used by Access to save roles to the database.
     */
    'regions_trans_table' => 'conf_regions_trans',
    /*
     * Permission model used by Access to create correct relations.
     * Update the permission if it is in a different namespace.
     */
    'permission' => Permission::class,

    /*
     * Permissions table used by Access to save permissions to the database.
     */
    'permissions_table' => 'permissions',

    /*
     * permission_role table used by Access to save relationship between permissions and roles to the database.
     */
    'permission_role_table' => 'permission_role',

    /*
     * role_user table used by Access to save assigned roles to the database.
     */
    'role_user_table' => 'role_user',

     /*
     * role_user table used by Access to save assigned roles to the database.
     */
    'safety_degree' => 'conf_safety_degrees',

     /*
     * role_user table used by Access to save assigned roles to the database.
     */
    'safety_degree_lang' => 'conf_safety_degrees_trans',

    /*
     * safety_degree_trans model used by Access to create correct relations.
     * Update the permission if it is in a different namespace.
     */
    'safety_degree_trans' => SafetyDegreeTrans::class,    

    /*
     * Configurations for the user
     */
    'users' => [
        /*
         * Whether or not public registration is on
         */
        'registration' => env('ENABLE_REGISTRATION', 'true'),

        /*
         * The role the user is assigned to when they sign up from the frontend, not namespaced
         */
        'default_role' => 'User',
        //'default_role' => 2,

        /*
         * Whether or not the user has to confirm their email when signing up
         */
        'confirm_email' => true,

        /*
         * Whether or not the users email can be changed on the edit profile screen
         */
        'change_email' => false,
    ],

    /*
     * Configuration for roles
     */
    'roles' => [
        /*
         * Whether a role must contain a permission or can be used standalone as a label
         */
        'role_must_contain_permission' => true,
    ],

    /*
     * Socialite session variable name
     * Contains the name of the currently logged in provider in the users session
     * Makes it so social logins can not change passwords, etc.
     */
    'socialite_session_name' => 'socialite_provider',

    /*
     * Application captcha specific settings
     */
    'captcha' => [
        /*
         * Whether the registration captcha is on or off
         */
        'registration' => env('REGISTRATION_CAPTCHA_STATUS', false),
    ],
];
