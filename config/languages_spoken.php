<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\LanguagesSpoken\LanguagesSpokenTranslation;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * Languages Spoken table used to save Languages Spoken to the database.
     */
    'languages_spoken_table' => 'conf_languages_spoken',

    /*
     * languages_spoken_trans table used to save languages_spoken translations to the database.
     */
    'languages_spoken_trans_table' => 'conf_languages_spoken_trans',

    /*
     * LanguagesSpokenTranslations Model used to access LanguagesSpokenTranslation from database.
     */
    'languages_spoken_trans' =>  LanguagesSpokenTranslation::class,
    
];
