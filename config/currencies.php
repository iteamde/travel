<?php

use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use App\Models\Currencies\CurrenciesTranslations;

return [
    
    /*
     * Languages table used to save roles to the database.
     */
    'language_table' => 'conf_languages',

    /*
     * currencies table used to save currencies to the database.
     */
    'currencies_table' => 'conf_currencies',

    /*
     * currencies table used to save currencies to the database.
     */
    'currencies_trans_table' => 'conf_currencies_trans',

    /*
     * CurrenciesTranslations table used to save CurrenciesTranslations to the database.
     */
    'currencies_trans' =>  CurrenciesTranslations::class,
    
];
