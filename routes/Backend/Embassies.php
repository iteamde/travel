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
        Route::get('embassies/import', 'EmbassiesController@import')->name('embassies.import');
        Route::post('embassies/search', 'EmbassiesController@search')->name('embassies.search');
        Route::get('embassies/search/{admin_logs_id?}/{country_id?}/{city_id?}/{latlng?}', 'EmbassiesController@search')->name('embassies.search');
        Route::post('embassies/savesearch', 'EmbassiesController@savesearch')->name('embassies.savesearch');
        Route::get('embassies/return_search_history', 'EmbassiesController@return_search_history')
                ->name('embassies.searchhistory');

        /*
         * Embassies CRUD
         */
        Route::resource('embassies', 'EmbassiesController');

        Route::post('embassies/delete-ajax', 'EmbassiesController@delete_ajax')->name('embassies.delete_ajax');

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