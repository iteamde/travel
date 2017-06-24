<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Lifestyle\LifestyleTrans;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * Lifestyle table used to save Lifestyle to the database.
     */
    'lifestyle_table' => 'conf_lifestyles',

    /*
     * lifestyle_trans_table used to save lifestyle translation to the database.
     */
    'lifestyle_trans_table' => 'conf_lifestyles_trans',

    /*
     * LifestyleTranslations Model used to access LifestyleTranslations relation from database.
     */
    'lifestyle_trans' =>  LifestyleTrans::class,
    
];
