<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Hotels\HotelsTranslations;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * Hotels table used to save Hotels to the database.
     */
    'hotels_table' => 'hotels',

    /*
     * Hotels table used to save Hotels to the database.
     */
    'hotels_trans_table' => 'hotels_trans',

    /*
     * HotelsTranslations table used to save HotelsTranslations to the database.
     */
    'hotels_trans' =>  HotelsTranslations::class,
    
];
