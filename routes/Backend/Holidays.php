<?php
 /*
 * Holidays Manager
 */
Route::group([
    'prefix'     => 'holidays',
    'as'         => 'holidays.',
], function () {

    /*
     * Holidays Manager
     **/
    Route::group(['namespace' => 'Holidays'], function () {
        /*
         * For DataTables
         */
        Route::post('holidays/get', 'HolidaysTableController')->name('holidays.get');

        /*
         * Holidays CRUD
         */
        Route::resource('holidays', 'HolidaysController');

          /*
         * Deleted Specific Holidays
         */
        Route::group(['prefix' => 'holidays/{deletedHolidays}'], function () {
            Route::delete('delete', 'HolidaysController@delete')->name('holidays.delete');     
        });
    });
}); 