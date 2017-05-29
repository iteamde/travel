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
     * User CRUD
     */
    Route::resource('/', 'SafetyDegreesController');

});