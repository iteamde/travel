<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Embassies\EmbassiesTranslations;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * Embassies table used to save Embassies to the database.
     */
    'embassies_table' => 'embassies',

    /*
     * Embassies table used to save Embassies to the database.
     */
    'embassies_trans_table' => 'embassies_trans',

    /*
     * EmbassiesTranslations table used to save EmbassiesTranslations to the database.
     */
    'embassies_trans' =>  EmbassiesTranslations::class,
    
];
