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
     * Interest table used to save countries to the database.
     */
    'interest_table' => 'conf_interests',

    /*
     * Interest table used to save interest to the database.
     */
    'interest_trans_table' => 'conf_interestss_trans',

    /*
     * InterestTranslations table used to save InterestTranslations to the database.
     */
    'interest_trans' =>  InterestTranslations::class,
    
];
