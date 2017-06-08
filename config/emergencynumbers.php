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
     * emergencynumbers table used to save emergency_numbers to the database.
     */
    'emergencynumbers_trans_table' => 'conf_emergency_numbers_trans',

    /*
     * EmergencyNumbersTranslations table used to save EmergencyNumbersTranslations to the database.
     */
    'emergencynumbers_trans' =>  EmergencyNumbersTranslations::class,
    
];
