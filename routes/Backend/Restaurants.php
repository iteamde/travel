<?php
 /*
 * Currencies Manager
 */
Route::group([
    'prefix'     => 'restaurants',
    'as'         => 'restaurants.',
], function () {

    /*
     * Restaurants Manager
     **/
    Route::group(['namespace' => 'Restaurants'], function () {
        /*
         * For DataTables
         */
        Route::post('Restaurants/get', 'RestaurantsTableController')->name('restaurants.get');
        Route::get('Restaurants/import', 'RestaurantsController@import')->name('restaurants.import');

        Route::get('Restaurants/cities/{term?}/{type?}/{q?}', 'RestaurantsTableController@getAddedCities')->name('restaurants.cities');
        Route::get('Restaurants/types', 'RestaurantsTableController@getPlaceTypes')->name('restaurants.types');

        Route::post('Restaurants/search', 'RestaurantsController@search')->name('restaurants.search');
        Route::get('Restaurants/search/{admin_logs_id?}/{country_id?}/{city_id?}/{latlng?}', 'RestaurantsController@search')->name('restaurants.search');
        Route::post('Restaurants/savesearch', 'RestaurantsController@savesearch')->name('restaurants.savesearch');
        Route::get('Restaurants/return_search_history', 'RestaurantsController@return_search_history')
                ->name('restaurants.searchhistory');

        /*
         * Restaurants CRUD
         */
        Route::resource('restaurants', 'RestaurantsController');

        Route::post('restaurants/delete-ajax', 'RestaurantsController@delete_ajax')->name('restaurants.delete_ajax');

        /*
         * Deleted Specific Restaurants
         */
        Route::group(['prefix' => 'restaurants/{deletedRestaurants}'], function () {
            Route::delete('delete', 'RestaurantsController@delete')->name('restaurants.delete');
        });

         /*
         * Enable/Disable Specific Restaurants
         */
        Route::group(['prefix' => 'destaurants/{destaurants}'], function () {
            Route::get('mark/{status}', 'RestaurantsController@mark')->name('restaurants.mark')->where(['status' => '[1,2]']);
        });
    });
});