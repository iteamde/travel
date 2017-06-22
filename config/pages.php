<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Pages\PagesTranslations;
use App\Models\Pages\PagesMedias;
use App\Models\Pages\PagesAdmins;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * pages table used to save pages to the database.
     */
    'pages_table' => 'pages',

    /*
     * Pages table used to save Pages to the database.
     */
    'pages_trans_table' => 'pages_trans',

    /*
     * PagesTranslations table used to save PagesTranslations to the database.
     */
    'pages_trans' =>  PagesTranslations::class,

    /*
     * PagesMedias table used to save PagesMedias to the database.
     */
    'pages_medias' =>  PagesMedias::class,

    /*
     * PagesAdmins table used to save PagesAdmins to the database.
     */
    'pages_admins' =>  PagesAdmins::class,

    /*
     * pages_categories table used to save pages to the database.
     */
    'pages_categories_table' => 'pages_categories',
    
];
