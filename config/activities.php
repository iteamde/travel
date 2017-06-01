<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Regions\Regions;
use App\Models\Regions\RegionsTranslation;
use App\Models\SafetyDegree\SafetyDegreeTrans;
use App\Models\ActivityTypes\ActivityTypesTranslations;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * Activities types table used to save Activities types to the database.
     */
    'activities_types_table' => 'conf_activities_types',

    /*
     * Activities types table used to save Activities types to the database.
     */
    'activities_types_trans_table' => 'conf_activities_types_trans',

    /*
     * Activities types table used to save Activities types to the database.
     */
    'activities_types_trans' =>  ActivityTypesTranslations::class,

];
