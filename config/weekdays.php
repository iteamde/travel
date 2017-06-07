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
     * weekdays table used to save weekdays to the database.
     */
    'weekdays_trans_table' => 'conf_weekdays_trans',

    /*
     * WeekdaysTranslations table used to save WeekdaysTranslations to the database.
     */
    'weekdays_trans' =>  WeekdaysTranslations::class,
    
];
