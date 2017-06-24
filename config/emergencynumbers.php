<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\EmergencyNumbers\EmergencyNumbersTranslations;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * emergencynumbers table used to save emergency_numbers to the database.
     */
    'emergencynumbers_table' => 'conf_emergency_numbers',

    /*
     * emergencynumbers_trans table used to save emergency_numbers translations to the database.
     */
    'emergencynumbers_trans_table' => 'conf_emergency_numbers_trans',

    /*
     * EmergencyNumbersTranslations Model used to access EmergencyNumbersTranslations to the database.
     */
    'emergencynumbers_trans' =>  EmergencyNumbersTranslations::class,
    
];
