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
     * age_ranges table used to save age_ranges to the database.
     */
    'ageranges_trans_table' => 'conf_age_ranges_trans',

    /*
     * AgeRangesTranslations table used to save AgeRangesTranslations to the database.
     */
    'ageranges_trans' =>  AgeRangesTranslations::class,
    
];
