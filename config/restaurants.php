<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Restaurants\RestaurantsTranslations;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * restaurants table used to save restaurants to the database.
     */
    'restaurants_table' => 'restaurants',

    /*
     * restaurants table used to save restaurants to the database.
     */
    'restaurants_trans_table' => 'restaurants_trans',

    /*
     * RestaurantsTranslations table used to save RestaurantsTranslations to the database.
     */
    'restaurants_trans' =>  RestaurantsTranslations::class,
    
];
