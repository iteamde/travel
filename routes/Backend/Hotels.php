<?php
 /*
 * Hotels Manager
 */
Route::group([
    'prefix'     => 'hotels',
    'as'         => 'hotels.',
], function () {

    /*
     * Hotels Manager
     **/
    Route::group(['namespace' => 'Hotels'], function () {
        /*
         * For DataTables
         */
        Route::post('hotels/get', 'HotelsTableController')->name('hotels.get');
        Route::get('hotels/import', 'HotelsController@import')->name('hotels.import');

        Route::get('hotels/cities', 'HotelsTableController@getAddedCities')->name('hotels.cities');
        Route::get('hotels/types', 'HotelsTableController@getPlaceTypes')->name('hotels.types');

        Route::post('hotels/search', 'HotelsController@search')->name('hotels.search');
        Route::get('hotels/search/{admin_logs_id?}/{country_id?}/{city_id?}/{latlng?}', 'HotelsController@search')->name('hotels.search');
        Route::post('hotels/savesearch', 'HotelsController@savesearch')->name('hotels.savesearch');
        Route::get('hotels/return_search_history', 'HotelsController@return_search_history')
                ->name('hotels.searchhistory');

        /*
         * Hotels CRUD
         */
        Route::resource('hotels', 'HotelsController');

        Route::post('hotels/delete-ajax', 'HotelsController@delete_ajax')->name('hotels.delete_ajax');

        /*
         * Deleted Specific Hotels
         */
        Route::group(['prefix' => 'hotels/{deletedHotels}'], function () {
            Route::delete('delete', 'HotelsController@delete')->name('hotels.delete');
        });

         /*
         * Enable/Disable Specific Hotels
         */
        Route::group(['prefix' => 'hotels/{hotels}'], function () {
            Route::get('mark/{status}', 'HotelsController@mark')->name('hotels.mark')->where(['status' => '[1,2]']);
        });
    });
});