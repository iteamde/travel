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

        /*
         * Restaurants CRUD
         */
        Route::resource('restaurants', 'RestaurantsController');

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