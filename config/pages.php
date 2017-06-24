<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Pages\PagesTranslations;
use App\Models\Pages\PagesMedias;
use App\Models\Pages\PagesAdmins;
use App\Models\Pages\PagesFollowers;

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
     * Pages trans table used to save Pages translations to the database.
     */
    'pages_trans_table' => 'pages_trans',

    /*
     * PagesTranslations Model used to access PagesTranslations relation from database.
     */
    'pages_trans' =>  PagesTranslations::class,

    /*
     * PagesMedias Model used to access PagesMedias relation from database.
     */
    'pages_medias' =>  PagesMedias::class,

    /*
     * PagesAdmins Model used to access PagesAdmins relation from database.
     */
    'pages_admins' =>  PagesAdmins::class,

    /*
     * PagesFollowers Model used to access PagesFollowers relation from database.
     */
    'pages_followers' =>  PagesFollowers::class,


    /*
     * pages_categories table used to save pages categories to the database.
     */
    'pages_categories_table' => 'pages_categories',
    
];
