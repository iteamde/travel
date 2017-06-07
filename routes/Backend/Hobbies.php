<?php
 /*
 * Hobbies Manager
 */
Route::group([
    'prefix'     => 'hobbies',
    'as'         => 'hobbies.',
], function () {

    /*
     * Hobbies Manager
     **/
    Route::group(['namespace' => 'Hobbies'], function () {
        /*
         * For DataTables
         */
        Route::post('hobbies/get', 'HobbiesTableController')->name('hobbies.get');

        /*
         * Hobbies CRUD
         */
        Route::resource('hobbies', 'HobbiesController');

          /*
         * Deleted Specific Hobbies
         */
        Route::group(['prefix' => 'hobbies/{deletedHobbies}'], function () {
            Route::delete('delete', 'HobbiesController@delete')->name('hobbies.delete');     
        });
    });
}); 