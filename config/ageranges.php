<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\AgeRanges\AgeRangesTranslations;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * age_ranges table used to save age_ranges to the database.
     */
    'age_ranges_table' => 'conf_age_ranges',

    /*
     * age_ranges_trans table used to save age_ranges translations to the database.
     */
    'ageranges_trans_table' => 'conf_age_ranges_trans',

    /*
     * AgeRangesTranslations Model used to access AgeRangesTranslations from database.
     */
    'ageranges_trans' =>  AgeRangesTranslations::class,
    
];
