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
        Route::post('/logout' , 'UserController@logout');
        Route::post('/forgot' , 'UserController@forgot');
        Route::get('/activate/{token}' , 'UserController@activate');
        Route::get('/info/{user_id}/{session_token}' , 'UserController@information');
        Route::get('/reset/{token}/{new_password}/{confirm_password}' , 'UserController@reset');
        Route::put('/fullname/{user_id}/{session_token}/{fullname}', 'UserController@update_fullname');
        Route::put('/mobile/{user_id}/{session_token}/{mobile}', 'UserController@update_mobile');
        Route::put('/address/{user_id}/{session_token}/{address}', 'UserController@update_address');
        Route::put('/age/{user_id}/{session_token}/{age}', 'UserController@update_age');
        Route::put('/nationality/{user_id}/{session_token}/{nationality}', 'UserController@update_nationality');
        Route::get('/friends/{user_id}/{session_token}' , 'UserController@friends');
        Route::delete('/friends/{user_id}/{session_token}/{friends_id}' , 'UserController@delete_friends');
        Route::post('/profilepicture/{user_id}/{session_token}' , 'UserController@update_profile_image');
}); 
?>




