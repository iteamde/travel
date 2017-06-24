<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Weekdays\WeekdaysTranslations;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * weekdays table used to save weekdays to the database.
     */
    'weekdays_table' => 'conf_weekdays',

    /*
     * weekdays_trans table used to save weekdays translations to the database.
     */
    'weekdays_trans_table' => 'conf_weekdays_trans',

    /*
     * WeekdaysTranslations Model used to save WeekdaysTranslations relation from database.
     */
    'weekdays_trans' =>  WeekdaysTranslations::class,
    
];
