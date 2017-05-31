<?php
 /*
 * Locations Manager
 */
Route::group([
    'prefix'     => 'location',
    'as'         => 'location.',
], function () {

	/*
     * Country Manager
     **/
    Route::group(['namespace' => 'Country'], function () {
        /*
         * For DataTables
         */
        Route::post('country/get', 'CountryTableController')->name('country.get');

        /*
         * Country CRUD
         */
        Route::resource('country', 'CountryController');

          /*
         * Deleted Specific Country
         */
        Route::group(['prefix' => 'country/{deletedCountry}'], function () {
            Route::delete('delete', 'CountryController@delete')->name('country.delete');     
        });

        /*
         * Enable/Disable Specific Country
         */
        Route::group(['prefix' => 'country/{country}'], function () {
            Route::get('mark/{status}', 'CountryController@mark')->name('country.mark')->where(['status' => '[1,2]']);
        });

    });

}); 