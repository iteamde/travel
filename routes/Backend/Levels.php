<?php
 /*
 * Levels Manager
 */
Route::group([
    'prefix'     => 'levels',
    'as'         => 'levels.',
], function () {

	/*
     * Levels Manager
     **/
    Route::group(['namespace' => 'Levels'], function () {
        /*
         * For DataTables
         */
        Route::post('levels/get', 'LevelsTableController')->name('levels.get');

        /*
         * Levels CRUD
         */
        Route::resource('levels', 'LevelsController');

          /*
         * Deleted Specific Levels
         */
        Route::group(['prefix' => 'levels/{deletedReligion}'], function () {
            Route::delete('delete', 'LevelsController@delete')->name('levels.delete');     
        });

        /*
         * Enable/Disable Specific Levels
         */
        Route::group(['prefix' => 'levels/{levels}'], function () {
            Route::get('mark/{status}', 'LevelsController@mark')->name('levels.mark')->where(['status' => '[1,2]']);
        });

    });
}); 