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
     * Holidays table used to save Holidays to the database.
     */
    'holidays_trans_table' => 'conf_holidays_trans',

    /*
     * HolidaysTranslations table used to save HolidaysTranslations to the database.
     */
    'holidays_trans' =>  HolidaysTranslations::class,
    
];
