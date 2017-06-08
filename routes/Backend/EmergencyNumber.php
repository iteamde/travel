<?php
 /*
 * Emergency Numbers Manager
 */
Route::group([
    'prefix'     => 'emergencynumbers',
    'as'         => 'emergencynumbers.',
], function () {

    /*
     * EmergencyNumbers Manager
     **/
    Route::group(['namespace' => 'EmergencyNumbers'], function () {
        /*
         * For DataTables
         */
        Route::post('emergencynumbers/get', 'EmergencyNumbersTableController')->name('emergencynumbers.get');

        /*
         * EmergencyNumbers CRUD
         */
        Route::resource('emergencynumbers', 'EmergencyNumbersController');

          /*
         * Deleted Specific EmergencyNumbers
         */
        Route::group(['prefix' => 'emergencynumbers/{deletedEmergencynumbers}'], function () {
            Route::delete('delete', 'EmergencyNumbersController@delete')->name('emergencynumbers.delete');     
        });
    });
}); 