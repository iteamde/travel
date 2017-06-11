<?php
 /*
 * AgeRanges Manager
 */
Route::group([
    'prefix'     => 'ageranges',
    'as'         => 'ageranges.',
], function () {

    /*
     * AgeRanges Manager
     **/
    Route::group(['namespace' => 'AgeRanges'], function () {
        /*
         * For DataTables
         */
        Route::post('ageranges/get', 'AgeRangesTableController')->name('ageranges.get');

        /*
         * AgeRanges CRUD
         */
        Route::resource('ageranges', 'AgeRangesController');

          /*
         * Deleted Specific AgeRange
         */
        Route::group(['prefix' => 'ageranges/{deletedAgeRanges}'], function () {
            Route::delete('delete', 'AgeRangesController@delete')->name('ageranges.delete');     
        });

         /*
         * Enable/Disable Specific Age Range
         */
        Route::group(['prefix' => 'ageranges/{ageRanges}'], function () {
            Route::get('mark/{status}', 'AgeRangesController@mark')->name('ageranges.mark')->where(['status' => '[1,2]']);
        });
    });
}); 