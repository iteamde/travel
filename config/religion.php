<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Religion\ReligionTranslations;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * religion table used to save religion to the database.
     */
    'religion_table' => 'conf_religions',

    /*
     * religion_trans table used to save religion translations to the database.
     */
    'religion_trans_table' => 'conf_religions_trans',

    /*
     * ReligionTranslations model used to save ReligionTranslations relation from database.
     */
    'religion_trans' =>  ReligionTranslations::class,
    
];
