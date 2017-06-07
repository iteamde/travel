<?php
 /*
 * Weekdays Manager
 */
Route::group([
    'prefix'     => 'weekdays',
    'as'         => 'weekdays.',
], function () {

    /*
     * Weekdays Manager
     **/
    Route::group(['namespace' => 'Weekdays'], function () {
        /*
         * For DataTables
         */
        Route::post('weekdays/get', 'WeekdaysTableController')->name('weekdays.get');

        /*
         * Weekdays CRUD
         */
        Route::resource('weekdays', 'WeekdaysController');

          /*
         * Deleted Specific Weekdays
         */
        Route::group(['prefix' => 'weekdays/{deletedWeekdays}'], function () {
            Route::delete('delete', 'WeekdaysController@delete')->name('weekdays.delete');     
        });
    });
}); 