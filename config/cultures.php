<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Cultures\CulturesTranslations;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * cultures table used to save cultures to the database.
     */
    'cultures_table' => 'conf_cultures',

    /*
     * cultures_trans_table used to save cultures translations to the database.
     */
    'cultures_trans_table' => 'conf_cultures_trans',

    /*
     * CulturesTranslations Model used to access CulturesTranslations from database.
     */
    'cultures_trans' =>  CulturesTranslations::class,
    
];
