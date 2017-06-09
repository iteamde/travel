<?php
 /*
 * Accommodations Manager
 */
Route::group([
    'prefix'     => 'accommodations',
    'as'         => 'accommodations.',
], function () {

	/*
     * Accommodations Manager
     **/
    Route::group(['namespace' => 'Accommodations'], function () {
        /*
         * For DataTables
         */
        Route::post('accommodations/get', 'AccommodationsTableController')->name('accommodations.get');

        /*
         * Accommodations CRUD
         */
        Route::resource('accommodations', 'AccommodationsController');

          /*
         * Deleted Specific Accommodation
         */
        Route::group(['prefix' => 'accommodations/{deletedAccommodations}'], function () {
            Route::delete('delete', 'AccommodationsController@delete')->name('accommodations.delete');     
        });

        /*
         * Enable/Disable Specific Accommodation
         */
        Route::group(['prefix' => 'accommodations/{accommodation}'], function () {
            Route::get('mark/{status}', 'AccommodationsController@mark')->name('accommodations.mark')->where(['status' => '[1,2]']);
        });

    });
}); 