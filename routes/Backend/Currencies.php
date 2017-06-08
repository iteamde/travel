<?php
 /*
 * Currencies Manager
 */
Route::group([
    'prefix'     => 'currencies',
    'as'         => 'currencies.',
], function () {

    /*
     * Currencies Manager
     **/
    Route::group(['namespace' => 'Currencies'], function () {
        /*
         * For DataTables
         */
        Route::post('currencies/get', 'CurrenciesTableController')->name('currencies.get');

        /*
         * Currencies CRUD
         */
        Route::resource('currencies', 'CurrenciesController');

          /*
         * Deleted Specific Currencies
         */
        Route::group(['prefix' => 'currencies/{deletedCurrencies}'], function () {
            Route::delete('delete', 'CurrenciesController@delete')->name('currencies.delete');     
        });

         /*
         * Enable/Disable Specific Currency
         */
        Route::group(['prefix' => 'currencies/{currencies}'], function () {
            Route::get('mark/{status}', 'CurrenciesController@mark')->name('currencies.mark')->where(['status' => '[1,2]']);
        });
    });
}); 