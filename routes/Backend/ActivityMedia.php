<?php
 /*
 * Activity Media Manager
 */
Route::group([
    'prefix'     => 'activitymedia',
    'as'         => 'activitymedia.',
], function () {

    /*
     * Activity Media Manager
     **/
    Route::group(['namespace' => 'ActivityMedia'], function () {
        /*
         * For DataTables
         */
        Route::post('activitymedia/get', 'ActivityMediaTableController')->name('activitymedia.get');

        /*
         * ActivityMedia CRUD
         */
        Route::resource('activitymedia', 'ActivityMediaController');

          /*
         * Deleted Specific ActivityMedia
         */
        Route::group(['prefix' => 'activitymedia/{deletedActivityMedia}'], function () {
            Route::delete('delete', 'ActivityMediaController@delete')->name('activitymedia.delete');     
        });
    });
}); 