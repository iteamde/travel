<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Interest\InterestTranslations;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * Interest table used to save interests to the database.
     */
    'interest_table' => 'conf_interests',

    /*
     * Interest_translations table used to save interest translations to the database.
     */
    'interest_trans_table' => 'conf_interestss_trans',

    /*
     * InterestTranslations Model used to access InterestTranslations from database.
     */
    'interest_trans' =>  InterestTranslations::class,
    
];
