<?php
 /*
 * Safety Degrees Manager
 */
Route::group([
    'prefix'     => 'safety-degrees',
    'as'         => 'safety-degrees.',
    'namespace'  => 'SafetyDegrees',
], function () {

	
	/*
     * For DataTables
     */
    Route::post('/get', 'SafetyDegreesTableController')->name('get');

    /*
     * Safety Degrees CRUD
     */
    Route::resource('safety', 'SafetyDegreesController');

    /*
     * Deleted Safety Degrees
     */
    Route::delete('{deletedRegions}/delete', 'SafetyDegreesController@delete')->name('delete');     

}); 