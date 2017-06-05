<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Levels\LevelsTranslations;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * levels table used to save levels to the database.
     */
    'levels_table' => 'conf_levels',

    /*
     * levels table used to save levels to the database.
     */
    'levels_trans_table' => 'conf_levels_trans',

    /*
     * levelsTranslations table used to save levelsTranslations to the database.
     */
    'levels_trans' =>  LevelsTranslations::class,
    
];
