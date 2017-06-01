<?php
 /*
 * Locations Manager
 */
Route::group([
    'prefix'     => 'religion',
    'as'         => 'religion.',
], function () {

	/*
     * Religion Manager
     **/
    Route::group(['namespace' => 'Religion'], function () {
        /*
         * For DataTables
         */
        Route::post('religion/get', 'ReligionTableController')->name('religion.get');

        /*
         * Religion CRUD
         */
        Route::resource('religion', 'ReligionController');

          /*
         * Deleted Specific Religion
         */
        Route::group(['prefix' => 'religion/{deletedReligion}'], function () {
            Route::delete('delete', 'ReligionController@delete')->name('religion.delete');     
        });

        /*
         * Enable/Disable Specific Religion
         */
        Route::group(['prefix' => 'religion/{religion}'], function () {
            Route::get('mark/{status}', 'ReligionController@mark')->name('religion.mark')->where(['status' => '[1,2]']);
        });

    });
}); 