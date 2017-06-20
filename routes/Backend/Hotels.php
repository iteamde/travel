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

        /*
         * Hotels CRUD
         */
        Route::resource('hotels', 'HotelsController');

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