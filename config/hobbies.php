<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Hobbies\HobbiesTranslations;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * hobbies table used to save hobbies to the database.
     */
    'hobbies_table' => 'conf_hobbies',

    /*
     * hobbies trans table used to save hobbies translations to the database.
     */
    'hobbies_trans_table' => 'conf_hobbies_trans',

    /*
     * HobbiesTranslations Model used to access HobbiesTranslations from database.
     */
    'hobbies_trans' =>  HobbiesTranslations::class,
    
];
