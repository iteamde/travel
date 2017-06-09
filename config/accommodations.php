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
     * accommodations table used to save accommodations to the database.
     */
    'accommodations_trans_table' => 'conf_accommodations_trans',

    /*
     * accommodationsTranslations table used to save accommodationsTranslations to the database.
     */
    'accommodations_trans' =>  AccommodationsTranslations::class,
    
];
