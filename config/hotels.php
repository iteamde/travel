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
     * Hotels_trans table used to save Hotels translations to the database.
     */
    'hotels_trans_table' => 'hotels_trans',

    /*
     * HotelsTranslations Model used to access HotelsTranslations from database.
     */
    'hotels_trans' =>  HotelsTranslations::class,

    /*
     * HotelsMedias Model used to access HotelsMedias relation from database.
     */
    'hotels_medias' =>  HotelsMedias::class,
    
];
