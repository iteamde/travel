<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* ----------------------------------------------------------------------- */

/*
 * Api Routes
 * Namespaces indicate folder structure
 */
Route::group(['prefix' => 'api'], function () {
/*
 * These routes need view-api permission
 * (good if you want to allow more than one group in the api,
 * then limit the api features by different roles or permissions)
 *
 */
// includeRouteFiles(__DIR__.'/Api/');

 /*
 * User Manager 
 */
Route::group([
    'prefix'     => 'users',
    'as'         => 'user.',
    'namespace'  => 'User' ,
], function () {

        /*
        * All User Related Api's Routes Will Be Defined Here 
        */
        /* Sign Up/Create New User Api */
        Route::post('/create' , 'UserController@create');
        /* Login Api */
        Route::post('/login'  , 'UserController@login');
        /* Logout Api */
        Route::post('/logout' , 'UserController@logout');
        /* Forgot Password Request Api */
        Route::post('/forgot' , 'UserController@forgot');
        /* Activate User Api */
        Route::get('/activate/{token}' , 'UserController@activate');
        /* Get User Information Api */
        Route::get('/info/{user_id}/{session_token}' , 'UserController@information');
        /* Reset Password Api */
        Route::get('/reset/{token}/{new_password}/{confirm_password}' , 'UserController@reset');
        /* Change Fullname Api */
        Route::post('/fullname', 'UserController@update_fullname');
        /* Update Mobile Number Api */
        Route::post('/mobile', 'UserController@update_mobile');
        /* Update Address Api */
        Route::post('/address', 'UserController@update_address');
        /* Update Age Api */
        Route::post('/age', 'UserController@update_age');
        /* Update Nationality Api */
        Route::put('/nationality/{user_id}/{session_token}/{nationality}', 'UserController@update_nationality');
        /* Get All User's Friends APi */
        Route::get('/friends/{user_id}/{session_token}' , 'UserController@friends');
        /* Delete User's Friend Api */
        Route::delete('/friends/{user_id}/{session_token}/{friends_id}' , 'UserController@delete_friends');
        /* Change Profile Picture Api */
        Route::post('/profilepicture/{user_id}/{session_token}' , 'UserController@update_profile_image');
        /* Change Password Api */
        Route::put('/password/{user_id}/{session_token}/{old_password}/{new_password}/{new_password_confirmation}' , 'UserController@change_password');
        /* Block List Api */
        Route::get('/blocklist/{user_id}/{session_token}' , 'UserController@block_list');
        /* UnBlock Friend List Api */
        Route::post('/unblock' , 'UserController@unblock_friend');
        /* Show Hidden Content Api */
        Route::get('/hiddencontent/{user_id}/{session_token}' , 'UserController@hidden_content');
        /* Update Online Status Api */
        Route::post('/onlinestatus' , 'UserController@change_online_status');
        /* Unhide A Content Api */
        Route::post('/unhideacontent' , 'UserController@unhide_content');
        /* Deactivate Account Api */
        Route::put('/deactivate/{user_id}/{session_token}/{password}/{password_confirmation}' , 'UserController@deactivate');
        /* Update Contact Privacy Api */
        Route::post('/contact_privacy', 'UserController@update_contact_privacy');
        /* Update Contact Privacy Api */
        Route::post('/notification_settings', 'UserController@update_notification_settings');
    }); 

/*
 * Medias Manager 
 */
Route::group([
    'prefix'     => 'medias',
    'as'         => 'media.',
    'namespace'  => 'Media' ,
], function () {

		/* Create Media Api */
        Route::post('/create', 'MediasController@create');
        /* Add Comment On Media Api */
        Route::post('/comment', 'MediasController@comment');
	});


});
