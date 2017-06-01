<?php
 /*
 * Locations Manager
 */
Route::group([
    'prefix'     => 'interest',
    'as'         => 'interest.',
], function () {

	/*
     * Interest Manager
     **/
    Route::group(['namespace' => 'Interest'], function () {
        /*
         * For DataTables
         */
        Route::post('interest/get', 'InterestTableController')->name('interest.get');

        /*
         * Interest CRUD
         */
        Route::resource('interest', 'InterestController');

          /*
         * Deleted Specific Interest
         */
        Route::group(['prefix' => 'interest/{deletedInterest}'], function () {
            Route::delete('delete', 'InterestController@delete')->name('interest.delete');     
        });

        /*
         * Enable/Disable Specific Interest
         */
        Route::group(['prefix' => 'interest/{interest}'], function () {
            Route::get('mark/{status}', 'InterestController@mark')->name('interest.mark')->where(['status' => '[1,2]']);
        });

    });
}); 