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
use App\Models\Country\CountriesAdditionalLanguages;
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
use App\Models\City\CitiesAdditionalLanguages;
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
     * country_trans table used to save countries translations to the database.
     */
    'country_trans_table' => 'countries_trans',

    /*
     * CountriesTranslations Model used to access CountriesTranslations relation from database.
     */
    'country_trans' =>  CountriesTranslations::class,

    /*
     * CountriesAirports Model used to access CountriesAirports relation from database.
     */
    'country_airports_trans' =>  CountriesAirports::class,

    /*
     * CountriesCurrencies Model used to access CountriesCurrencies relation from database.
     */
    'country_currencies_trans' =>  CountriesCurrencies::class,

    /*
     * CountriesCapitals Model used to access CountriesCapitals relation from database.
     */
    'country_capitals_trans' =>  CountriesCapitals::class,

    /*
     * CountriesEmergencyNumbers Model used to access CountriesEmergencyNumbers relation from database.
     */
    'country_emergency_numbers_trans' =>  CountriesEmergencyNumbers::class,

    /*
     * CountriesHolidays Model used to access CountriesHolidays relation from database.
     */
    'country_holidays_trans' =>  CountriesHolidays::class,

    /*
     * CountriesLanguagesSpoken Model used to access CountriesLanguagesSpoken relation from database.
     */
    'country_languages_spoken_trans' =>  CountriesLanguagesSpoken::class,

    /*
     * CountriesAdditionalLanguages Model used to access CountriesAdditionalLanguages relation from database.
     */
    'country_additional_languages_spoken' =>  CountriesAdditionalLanguages::class,

    /*
     * CountriesLifestyles Model used to access CountriesLifestyles relation from database.
     */
    'country_lifestyles_trans' =>  CountriesLifestyles::class,

    /*
     * CountriesMedias Model used to access CountriesMedias relation from database.
     */
    'country_medias_trans' =>  CountriesMedias::class,

    /*
     * CountriesReligions Model used to save CountriesReligions relation from database.
     */
    'country_religions_trans' =>  CountriesReligions::class,

    /*
     * Cities table used to save cities to the database.
     */
    'city_table' => 'cities',

    /*
     * cities_translation table used to save cities translations to the database.
     */
    'city_trans_table' => 'cities_trans',

    /*
     * CitiesTranslations Model used to access CitiesTranslations relation from database.
     */
    'cities_trans' =>  CitiesTranslations::class,

    /*
     * CitiesAirports Model used to access CitiesAirports relation from database.
     */
    'cities_airports_trans' =>  CitiesAirports::class,

     /*
     * CitiesCurrencies Model used to access CitiesCurrencies relation from database.
     */
    'cities_currencies_trans' =>  CitiesCurrencies::class,

    /*
     * CitiesEmergencyNumbers Model used to access CitiesEmergencyNumbers relation from database.
     */
    'cities_emergency_numbers_trans' =>  CitiesEmergencyNumbers::class,

    /*
     * CitiesHolidays Model used to access CitiesHolidays relation from database.
     */
    'cities_holidays_trans' =>  CitiesHolidays::class,

    /*
     * CitiesMedias Model used to access CitiesMedias relation from database.
     */
    'cities_medias_trans' =>  CitiesMedias::class,

    /*
     * CitiesLifestyles Model used to access CitiesLifestyles relation from database.
     */
    'cities_lifestyles_trans' =>  CitiesLifestyles::class,

    /*
     * CitiesReligions Model used to access CitiesReligions relation from database.
     */
    'cities_religions_trans' =>  CitiesReligions::class,

    /*
     * CitiesLanguagesSpoken Model used to access CitiesLanguagesSpoken relation from database.
     */
    'cities_languages_spoken_trans' =>  CitiesLanguagesSpoken::class,

    /*
     * CitiesLanguagesSpoken Model used to access CitiesLanguagesSpoken relation from database.
     */
    'cities_additional_languages_spoken' =>  CitiesAdditionalLanguages::class,

    /*
     * Regions model used by Access to create correct relations.
     * Update the permission if it is in a different namespace.
     */
    'regions' => Regions::class,

    /*
     * regions table used to save regions to the database.
     */
    'regions_table' => 'conf_regions',

    /*
     * RegionsTranslation model used to access RegionTranslation relations.
     * Update the permission if it is in a different namespace.
     */
    'regions_trans' => RegionsTranslation::class,

    /*
     * regions_translation table used save regions translations to the database.
     */
    'regions_trans_table' => 'conf_regions_trans',

    /*
     * RegionsMedias Model used to save RegionsMedias relation to the database.
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
     * PlacetypesTranslation table used by Admin to save placetypes translation to the database.
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
     * PlaceTranslation table used by Admin to save place translations to the database.
     */
    'place_trans_table' => 'places_trans',
    
    /*
     * place_medias model used by Admin to create correct relations.
     * Update the permission if it is in a different namespace.
     */
    'place_medias' => PlaceMedias::class,
];
