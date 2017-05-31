<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Regions\Regions;
use App\Models\Regions\RegionsTranslation;
use App\Models\SafetyDegree\SafetyDegreeTrans;
use App\Models\Country\CountriesTranslations;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * Countries table used to save countries to the database.
     */
    'country_table' => 'countries',

    /*
     * Countries table used to save countries to the database.
     */
    'country_trans_table' => 'countries_trans',

    /*
     * Countries table used to save countries to the database.
     */
    'country_trans' =>  CountriesTranslations::class,

    /*
     * Cities table used to save cities to the database.
     */
    'city_table' => 'cities',

    /*
     * Cities table used to save cities to the database.
     */
    'city_trans_table' => 'cities_trans',

    /*
     * regions model used by Access to create correct relations.
     * Update the permission if it is in a different namespace.
     */
    'regions' => Regions::class,

    /*
     * Regions table used by Access to save roles to the database.
     */
    'regions_table' => 'conf_regions',

    /*
     * regions_trans model used by Access to create correct relations.
     * Update the permission if it is in a different namespace.
     */
    'regions_trans' => RegionsTranslation::class,

    /*
     * RegionsTranslation table used by Access to save roles to the database.
     */
    'regions_trans_table' => 'conf_regions_trans',
    
];
