<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\ActivityMedia\MediaTranslations;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * media table used to save media to the database.
     */
    'media_table' => 'medias',

    /*
     * media trans table used to save media translations to the database.
     */
    'media_trans_table' => 'medias_trans',

    /*
     * MediaTranslations Model used to access MediaTranslations relation from database.
     */
    'media_trans' =>  MediaTranslations::class,
    
];
