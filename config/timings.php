<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Timings\TimingsTranslations;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * timings table used to save timings to the database.
     */
    'timings_table' => 'conf_timings',

    /*
     * timings translation table used to save timings translations to the database.
     */
    'timings_trans_table' => 'conf_timings_trans',

    /*
     * TimingsTranslations Model used to access TimingsTranslations relation from database.
     */
    'timings_trans' =>  TimingsTranslations::class,
];
