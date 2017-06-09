<?php
 /*
 * Cultures Manager
 */
Route::group([
    'prefix'     => 'cultures',
    'as'         => 'cultures.',
], function () {

    /*
     * Cultures Manager
     **/
    Route::group(['namespace' => 'Cultures'], function () {
        /*
         * For DataTables
         */
        Route::post('cultures/get', 'CulturesTableController')->name('cultures.get');

        /*
         * Cultures CRUD
         */
        Route::resource('cultures', 'CulturesController');

          /*
         * Deleted Specific Cultures
         */
        Route::group(['prefix' => 'cultures/{deletedCultures}'], function () {
            Route::delete('delete', 'CulturesController@delete')->name('cultures.delete');     
        });
    });
}); 