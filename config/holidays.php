<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Holidays\HolidaysTranslations;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * holidays table used to save holidays to the database.
     */
    'holidays_table' => 'conf_holidays',

    /*
     * holidays_trans used to save Holidays translations to the database.
     */
    'holidays_trans_table' => 'conf_holidays_trans',

    /*
     * HolidaysTranslations Model used to access HolidaysTranslationsrelation from database.
     */
    'holidays_trans' =>  HolidaysTranslations::class,
    
];
