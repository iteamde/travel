<?php
 /*
 * Levels Manager
 */
Route::group([
    'prefix'     => 'lifestyle',
    'as'         => 'lifestyle.',
], function () {

    /*
     * Lifestyle Manager
     **/
    Route::group(['namespace' => 'Lifestyle'], function () {
        /*
         * For DataTables
         */
        Route::post('lifestyle/get', 'LifestyleTableController')->name('lifestyle.get');

        /*
         * Lifestyle CRUD
         */
        Route::resource('lifestyle', 'LifestyleController');

          /*
         * Deleted Specific Lifestyle
         */
        Route::group(['prefix' => 'lifestyle/{deletedLifestyle}'], function () {
            Route::delete('delete', 'LifestyleController@delete')->name('lifestyle.delete');     
        });
    });
}); 