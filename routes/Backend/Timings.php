<?php
 /*
 * Levels Manager
 */
Route::group([
    'prefix'     => 'timings',
    'as'         => 'timings.',
], function () {

    /*
     * Timings Manager
     **/
    Route::group(['namespace' => 'Timings'], function () {
        /*
         * For DataTables
         */
        Route::post('timings/get', 'TimingsTableController')->name('timings.get');

        /*
         * Timings CRUD
         */
        Route::resource('timings', 'TimingsController');

          /*
         * Deleted Specific Timings
         */
        Route::group(['prefix' => 'timings/{deletedTimings}'], function () {
            Route::delete('delete', 'TimingsController@delete')->name('timings.delete');     
        });
    });
}); 