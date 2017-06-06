<?php
 /*
 * Locations Manager
 */
Route::group([
    'prefix'     => 'languagesspoken',
    'as'         => 'languagesspoken.',
], function () {

	/*
     * Languages Spoken Manager
     **/
    Route::group(['namespace' => 'LanguagesSpoken'], function () {
        /*
         * For DataTables
         */
        Route::post('languagesspoken/get', 'LanguagesSpokenTableController')->name('languagesspoken.get');

        /*
         * Languages Spoken CRUD
         */
        Route::resource('languagesspoken', 'LanguagesSpokenController');

          /*
         * Deleted Specific Languages Spoken
         */
        Route::group(['prefix' => 'languagesspoken/{deletedReligion}'], function () {
            Route::delete('delete', 'LanguagesSpokenController@delete')->name('languagesspoken.delete');     
        });

        /*
         * Enable/Disable Specific Languages Spoken
         */
        Route::group(['prefix' => 'languagesspoken/{languagesspoken}'], function () {
            Route::get('mark/{status}', 'LanguagesSpokenController@mark')->name('languagesspoken.mark')->where(['status' => '[1,2]']);
        });

    });
}); 