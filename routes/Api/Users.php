<?php 
	
 /*
 * User Manager
 */
Route::group([
    'prefix'     => 'users',
    'as'         => 'user.',
    'namespace'  => 'User' ,
], function () {

        /*
         * Accommodations CRUD
         */
        // Route::resource('accommodations', 'AccommodationsController');

        // /*
        //  * Enable/Disable Specific Accommodation
        //  */
        // Route::group(['prefix' => 'accommodations/{accommodation}'], function () {
        //     Route::get('mark/{status}', 'AccommodationsController@mark')->name('accommodations.mark')->where(['status' => '[1,2]']);
        // });

        Route::post('/create' , 'UserController@create');
        Route::post('/login' , 'UserController@login');
}); 
?>