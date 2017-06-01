<?php
 /*
 * Activities Manager
 */
Route::group([
    'prefix'     => 'activities',
    'as'         => 'activities.',
], function () {

	/*
     * Activity Types Manager
     **/
    Route::group(['namespace' => 'ActivityTypes'], function () {
        /*
         * For DataTables
         */
        Route::post('activitytypes/get', 'ActivityTypesTableController')->name('activitytypes.get');

        /*
         * Activity Types CRUD
         */
        Route::resource('activitytypes', 'ActivityTypesController');

          /*
         * Deleted Specific Activity Types
         */
        Route::group(['prefix' => 'activitytypes/{deletedActivitytype}'], function () {
            Route::delete('delete', 'ActivityTypesController@delete')->name('activitytypes.delete');     
        });

        /*
         * Enable/Disable Specific Activity Types
         */
        Route::group(['prefix' => 'activitytypes/{activitytypes}'], function () {
            Route::get('mark/{status}', 'ActivityTypesController@mark')->name('activitytypes.mark')->where(['status' => '[1,2]']);
        });

    });

}); 