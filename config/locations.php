<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;

/* Regions Models Start */
use App\Models\Regions\Regions;
use App\Models\Regions\RegionsTranslation;
use App\Models\Regions\RegionsMedias;
/* Regions Models End */

use App\Models\SafetyDegree\SafetyDegreeTrans;

/* Country Models */
use App\Models\Country\CountriesTranslations;
use App\Models\Country\CountriesAirports;
use App\Models\Country\CountriesCurrencies;
use App\Models\Country\CountriesCapitals;
use App\Models\Country\CountriesEmergencyNumbers;
use App\Models\Country\CountriesHolidays;
use App\Models\Country\CountriesLanguagesSpoken;
use App\Models\Country\CountriesLifestyles;
use App\Models\Country\CountriesMedias;
use App\Models\Country\CountriesReligions;
/* Country Models End */

/* City Models */
use App\Models\City\CitiesTranslations;
use App\Models\City\CitiesAirports;
use App\Models\City\CitiesCurrencies;
use App\Models\City\CitiesEmergencyNumbers;
use App\Models\City\CitiesHolidays;
use App\Models\City\CitiesLanguagesSpoken;
use App\Models\City\CitiesLifestyles;
use App\Models\City\CitiesMedias;
use App\Models\City\CitiesReligions;
/* City Models End */

/* Place Models : Start */
use App\Models\PlaceTypes\PlaceTypes;
use App\Models\PlaceTypes\PlaceTypesTranslations;
use App\Models\Place\PlaceTranslations;
use App\Models\Place\PlaceMedias;
/* Place Models : End */

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
     * CountriesAirports table used to save CountriesAirports to the database.
     */
    'country_airports_trans' =>  CountriesAirports::class,

    /*
     * CountriesAirports table used to save CountriesAirports to the database.
     */
    'country_currencies_trans' =>  CountriesCurrencies::class,

    /*
     * CountriesCapitals table used to save CountriesCapitals to the database.
     */
    'country_capitals_trans' =>  CountriesCapitals::class,

    /*
     * CountriesEmergencyNumbers table used to save CountriesEmergencyNumbers to the database.
     */
    'country_emergency_numbers_trans' =>  CountriesEmergencyNumbers::class,

    /*
     * CountriesHolidays table used to save CountriesHolidays to the database.
     */
    'country_holidays_trans' =>  CountriesHolidays::class,

    /*
     * CountriesLanguagesSpoken table used to save CountriesLanguagesSpoken to the database.
     */
    'country_languages_spoken_trans' =>  CountriesLanguagesSpoken::class,

    /*
     * CountriesLifestyles table used to save CountriesLifestyles to the database.
     */
    'country_lifestyles_trans' =>  CountriesLifestyles::class,

    /*
     * CountriesMedias table used to save CountriesMedias to the database.
     */
    'country_medias_trans' =>  CountriesMedias::class,

    /*
     * CountriesReligions table used to save CountriesReligions to the database.
     */
    'country_religions_trans' =>  CountriesReligions::class,

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
     * CitiesMedias table used to save CitiesMedias to the database.
     */
    'cities_medias_trans' =>  CitiesMedias::class,

    /*
     * CitiesLifestyles table used to save CitiesLifestyles to the database.
     */
    'cities_lifestyles_trans' =>  CitiesLifestyles::class,

    /*
     * CitiesReligions table used to save CitiesReligions to the database.
     */
    'cities_religions_trans' =>  CitiesReligions::class,

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
     * RegionsMedias table used by Access to save roles to the database.
     */
    'regions_medias' => RegionsMedias::class,

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
    
    /*
     * place_medias model used by Admin to create correct relations.
     * Update the permission if it is in a different namespace.
     */
    'place_medias' => PlaceMedias::class,
];
