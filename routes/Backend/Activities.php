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

    /*
     * Activity Manager
     **/
    Route::group(['namespace' => 'Activity'], function () {
        /*
         * For DataTables
         */
        Route::post('activity/get', 'ActivityTableController')->name('activity.get');

        /*
         * Activity CRUD
         */
        Route::resource('activity', 'ActivityController');

          /*
         * Deleted Specific Activity
         */
        Route::group(['prefix' => 'activity/{deletedActivity}'], function () {
            Route::delete('delete', 'ActivityController@delete')->name('activity.delete');     
        });

        /*
         * Enable/Disable Specific Activity
         */
        Route::group(['prefix' => 'activity/{activity}'], function () {
            Route::get('mark/{status}', 'ActivityController@mark')->name('activity.mark')->where(['status' => '[1,2]']);
        });

    });

}); 