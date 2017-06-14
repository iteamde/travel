<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Regions\Regions;
use App\Models\Regions\RegionsTranslation;
use App\Models\SafetyDegree\SafetyDegreeTrans;
use App\Models\Country\CountriesTranslations;
use App\Models\City\CitiesTranslations;
use App\Models\City\CitiesAirports;
use App\Models\City\CitiesCurrencies;
use App\Models\City\CitiesEmergencyNumbers;
use App\Models\City\CitiesHolidays;
use App\Models\City\CitiesLanguagesSpoken;
use App\Models\PlaceTypes\PlaceTypes;
use App\Models\PlaceTypes\PlaceTypesTranslations;
use App\Models\Place\PlaceTranslations;

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
     * Cities table used to save cities to the database.
     */
    'cities_trans' =>  CitiesTranslations::class,

    /*
     * CitiesAirports table used to save CitiesAirports to the database.
     */
    'cities_airports_trans' =>  CitiesAirports::class,

     /*
     * CitiesCurrencies table used to save CitiesCurrencies to the database.
     */
    'cities_currencies_trans' =>  CitiesCurrencies::class,

    /*
     * CitiesEmergencyNumbers table used to save CitiesEmergencyNumbers to the database.
     */
    'cities_emergency_numbers_trans' =>  CitiesEmergencyNumbers::class,

    /*
     * CitiesHolidays table used to save CitiesHolidays to the database.
     */
    'cities_holidays_trans' =>  CitiesHolidays::class,

    /*
     * CitiesLanguagesSpoken table used to save CitiesLanguagesSpoken to the database.
     */
    'cities_languages_spoken_trans' =>  CitiesLanguagesSpoken::class,

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

    /*
     * Placetypes model used by Admin to create correct relations.
     * Update the permission if it is in a different namespace.
     */
    'place_types' => Placetypes::class,

    /*
     * Placetypes table used by Admin to save placetypes to the database.
     */
    'place_types_table' => 'conf_place_types',

    /*
     * placetypes_trans model used by Admin to create correct relations.
     * Update the permission if it is in a different namespace.
     */
    'place_types_trans' => PlaceTypesTranslations::class,

    /*
     * PlacetypesTranslation table used by Admin to save placetypes to the database.
     */
    'place_types_trans_table' => 'conf_place_types_trans',

     /*
     * Place table used by Admin to save place to the database.
     */
    'place_table' => 'places',

    /*
     * place_trans model used by Admin to create correct relations.
     * Update the permission if it is in a different namespace.
     */
    'place_trans' => PlaceTranslations::class,

    /*
     * PlaceTranslation table used by Admin to save placetypes to the database.
     */
    'place_trans_table' => 'places_trans',
    
];
