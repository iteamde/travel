<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Restaurants\RestaurantsTranslations;
use App\Models\Restaurants\RestaurantsMedias;

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
     * restaurants_trans table used to save restaurants translations to the database.
     */
    'restaurants_trans_table' => 'restaurants_trans',

    /*
     * RestaurantsTranslations model used to access RestaurantsTranslations relation from database.
     */
    'restaurants_trans' =>  RestaurantsTranslations::class,

    /*
     * RestaurantsMedias Model used to access RestaurantsMedias relation from database.
     */
    'restaurants_medias' =>  RestaurantsMedias::class,
    
];
