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
        Route::get('country/jsoncities', 'CountryController@jsoncities')->name('country.jsoncities');

        /*
         * Country CRUD
         */
        Route::resource('country', 'CountryController');

        Route::post('country/delete-ajax', 'CountryController@delete_ajax')->name('country.delete_ajax');

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

    /*
     * Regions Manager
     **/

    Route::group(['namespace' => 'Regions'], function () {
        /*
         * For DataTables
         */
        Route::post('regions/get', 'RegionsTableController')->name('regions.get');

        /*
         * User CRUD
         */
        Route::resource('regions', 'RegionsController');

         /*
         * Deleted Region
         */
        Route::group(['prefix' => 'regions/{deletedRegions}'], function () {
            Route::delete('delete', 'RegionsController@delete')->name('regions.delete');
        });

        Route::post('regions/delete-ajax', 'RegionsController@delete_ajax')->name('regions.delete_ajax');

        /*
         * Specific Region
         */
        Route::group(['prefix' => 'regions/{region}'], function () {
            Route::get('mark/{status}', 'RegionsController@mark')->name('regions.mark')->where(['status' => '[1,2]']);
        });
    });

    /*
     * City Manager
     **/
    Route::group(['namespace' => 'City'], function () {
        /*
         * For DataTables
         */
        Route::post('city/get', 'CityTableController')->name('city.get');

        Route::get('city/countries/{term?}/{type?}/{q?}', 'CityTableController@getAddedCountries')->name('city.countries');
        /*
         * City CRUD
         */
        Route::resource('city', 'CityController');

        Route::post('city/delete-ajax', 'CityController@delete_ajax')->name('city.delete_ajax');
        
        /*
         * Deleted Specific City
         */
        Route::group(['prefix' => 'city/{deletedCity}'], function () {
            Route::delete('delete', 'CityController@delete')->name('city.delete');
        });


        /*
         * Enable/Disable Specific City
         */
        Route::group(['prefix' => 'city/{city}'], function () {
            Route::get('mark/{status}', 'CityController@mark')->name('city.mark')->where(['status' => '[1,2]']);
        });
    });

    /*
     * Place Type Manager
     **/
    Route::group(['namespace' => 'PlaceTypes'], function () {
        /*
         * For DataTables
         */
        Route::post('placetypes/get', 'PlaceTypesTableController')->name('placetypes.get');

        /*
         * PlaceTypes CRUD
         */
        Route::resource('placetypes', 'PlaceTypesController');

          /*
         * Deleted Specific PlaceTypes
         */
        Route::group(['prefix' => 'placetypes/{deletedPlacetypes}'], function () {
            Route::delete('delete', 'PlaceTypesController@delete')->name('placetypes.delete');
        });

    });

    /*
     * Place Manager
     **/
    Route::group(['namespace' => 'Place'], function () {
        /*
         * For DataTables
         */
        Route::post('place/get', 'PlaceTableController')->name('place.get');

        Route::get('place/countries/{term?}/{type?}/{q?}', 'PlaceTableController@getAddedCountries')->name('place.countries');
        Route::get('place/cities/{term?}/{type?}/{q?}', 'PlaceTableController@getAddedCities')->name('place.cities');
        Route::get('place/types/{term?}/{type?}/{q?}', 'PlaceTableController@getPlaceTypes')->name('place.types');

        Route::get('place/import', 'PlaceController@import')->name('place.import');
        Route::post('place/search', 'PlaceController@search')->name('place.search');
        Route::get('place/search/{admin_logs_id?}/{country_id?}/{city_id?}/{latlng?}', 'PlaceController@search')->name('place.search');
        Route::post('place/savesearch', 'PlaceController@savesearch')->name('place.savesearch');
        Route::get('place/return_search_history', 'PlaceController@return_search_history')
                ->name('place.searchhistory');

        /*
         * Place CRUD
         */
        Route::resource('place', 'HotelsController');

        /*
         * Deleted Specific Place
         */
        Route::group(['prefix' => 'place/{deletedPlace}'], function () {
            Route::delete('delete', 'PlaceController@delete')->name('place.delete');
        });

        /*
         * Enable/Disable Specific Place
         */
        Route::group(['prefix' => 'place/{place}'], function () {
            Route::get('mark/{status}', 'PlaceController@mark')->name('place.mark')->where(['status' => '[1,2]']);
        });

        Route::post('place/delete-ajax', 'PlaceController@delete_ajax')->name('place.delete_ajax');

    });

});