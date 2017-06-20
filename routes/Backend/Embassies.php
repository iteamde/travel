<?php
 /*
 * Currencies Manager
 */
Route::group([
    'prefix'     => 'embassies',
    'as'         => 'embassies.',
], function () {

    /*
     * Embassies Manager
     **/
    Route::group(['namespace' => 'Embassies'], function () {
        /*
         * For DataTables
         */
        Route::post('embassies/get', 'EmbassiesTableController')->name('embassies.get');

        /*
         * Embassies CRUD
         */
        Route::resource('embassies', 'EmbassiesController');

          /*
         * Deleted Specific Embassies
         */
        Route::group(['prefix' => 'embassies/{deletedEmbassies}'], function () {
            Route::delete('delete', 'EmbassiesController@delete')->name('embassies.delete');     
        });

         /*
         * Enable/Disable Specific Embassies
         */
        Route::group(['prefix' => 'embassies/{embassies}'], function () {
            Route::get('mark/{status}', 'EmbassiesController@mark')->name('embassies.mark')->where(['status' => '[1,2]']);
        });
    });
}); 