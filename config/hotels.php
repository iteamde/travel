<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Hotels\HotelsTranslations;
use App\Models\Hotels\HotelsMedias;

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

    /*
     * HotelsMedias table used to save HotelsMedias to the database.
     */
    'hotels_medias' =>  HotelsMedias::class,
    
];
