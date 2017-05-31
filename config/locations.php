<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Access\Regions\Regions;
use App\Models\Access\Regions\RegionsTranslation;
use App\Models\SafetyDegree\SafetyDegreeTrans;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * Countries table used to save roles to the database.
     */
    'country_table' => 'countries',

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
