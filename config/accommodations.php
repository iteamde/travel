<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Accommodations\AccommodationsTranslations;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * accommodations table used to save accommodations to the database.
     */
    'accommodations_table' => 'conf_accommodations',

    /*
     * accommodations_trans table used to save accommodations translations to the database.
     */
    'accommodations_trans_table' => 'conf_accommodations_trans',

    /*
     * accommodationsTranslations Model used to access accommodationsTranslations relation from database.
     */
    'accommodations_trans' =>  AccommodationsTranslations::class,
    
];
