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

    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');

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
        'prefix' => 'users',
        'as' => 'user.',
        'namespace' => 'User',
        ], function () {

        /*
         * All User Related Api's Routes Will Be Defined Here
         */
        /* Sign Up/Login - Facebook */
        Route::post('create/facebook', 'UserController@FacebookSocialLogin');
        /* Sign Up/Login - Facebook */
        Route::get('create/facebook', 'UserController@FacebookSocialLogin');
        /* Sign Up/Login - Twitter  */
        Route::post('create/twitter', 'UserController@TwitterSocialLogin');
        /* Sign Up/Login - Twitter  */
        Route::get('create/twitter', 'UserController@TwitterSocialLogin');
        /* Sign Up/Login - Twitter  */
        Route::get('create/twitter/login', 'UserController@TwitterSocialLoginPage');
        /* Twitter Acces Token APi */
        Route::post('create/twitter', 'UserController@TwitterSocialLoginSend');
        /* Sign Up/Create New User Api - 1 */
        Route::post('/create', 'UserController@createStep1');
        /* Sign Up/Create New User Api - 2 */
        Route::post('/create/step2', 'UserController@createStep2');
        /* Sign Up/Create New User Api - 3 */
        Route::post('set/fav_countries', 'UserController@createStep3');
        /* Sign Up/Create New User Api - 4 */
        Route::post('set/fav_places', 'UserController@createStep4');
        /* Sign Up/Create New User Api - 5 */
        Route::post('set/travel_styles', 'UserController@createStep5');
        /* Login Api */
        Route::post('/login', 'UserController@login');
        /* Logout Api */
        Route::post('/logout', 'UserController@logout');
        /* Forgot Password Request Api */
        Route::post('/forgot', 'UserController@forgot');
        /* Activate User Api */
        Route::get('/activate/{token}', 'UserController@activate');
        /* Get User Information Api */
        Route::get('/info/{user_id}/{session_token}', 'UserController@information');
        /* Reset Password Api */
        Route::post('/reset', 'UserController@reset');
        /* Change Fullname Api */
        Route::post('/fullname', 'UserController@update_fullname');
        /* Update Mobile Number Api */
        Route::post('/mobile', 'UserController@update_mobile');
        /* Update Address Api */
        Route::post('/address', 'UserController@update_address');
        /* Update Age Api */
        Route::post('/age', 'UserController@update_age');
        /* Update Nationality Api */
        Route::post('/nationality', 'UserController@update_nationality');
        /* Get All User's Friends APi */
        Route::get('/friends/{user_id}/{session_token}', 'UserController@friends');
        /* Delete User's Friend Api */
        Route::delete('/friends/{user_id}/{session_token}/{friends_id}', 'UserController@delete_friends');
        /* Change Profile Picture Api */
        Route::post('/profilepicture/{user_id}/{session_token}', 'UserController@update_profile_image');
        /* Change Password Api */
        Route::post('/password', 'UserController@change_password');
        /* Block List Api */
        Route::get('/blocklist/{user_id}/{session_token}', 'UserController@block_list');
        /* UnBlock Friend List Api */
        Route::post('/unblock', 'UserController@unblock_friend');
        /* Show Hidden Content Api */
        Route::get('/hiddencontent/{user_id}/{session_token}', 'UserController@hidden_content');
        /* Update Online Status Api */
        Route::post('/onlinestatus', 'UserController@change_online_status');
        /* Unhide A Content Api */
        Route::post('/unhidecontent', 'UserController@unhide_content');
        /* Deactivate Account Api */
        Route::post('/deactivate', 'UserController@deactivate');
        /* Update Contact Privacy Api */
        Route::post('/contact_privacy', 'UserController@update_contact_privacy');
        /* Update Contact Privacy Api */
        Route::post('/notification_settings', 'UserController@update_notification_settings');
        /* Tagging Friends Api */
        Route::get('/tag/{user_id}/{session_token}/{query}', 'UserController@tag');
        /* Send Friend Request Api */
        Route::post('/friend_request', 'UserController@friend_request');
        /* Display Friend Request Api */
        Route::get('/my_friend_requests/{user_id}/{session_token}', 'UserController@my_friend_requests');
        /* Accept Friend Request Api */
        Route::post('/accept_friend_request', 'UserController@accept_friend_request');
        /* Block User Api */
        Route::post('/block', 'UserController@block_user');
        /* Show Profile Picture Api */
        Route::get('/profilepicture/{user_id}/{session_token}', 'UserController@show_profile_picture');
        /* Add to favourites Api */
        Route::post('/add_favourites', 'UserController@add_favourites');
        /* Remove Favourties Api */
        Route::post('/remove_favourites', 'UserController@remove_favourites');
        /* Show Favourties Api */
        Route::get('/favourites/{user_id}/{session_token}', 'UserController@show_favourites');
    });

    /*
     * Medias Manager
     */
    Route::group([
        'prefix' => 'medias',
        'as' => 'media.',
        'namespace' => 'Media',
            ], function () {

        /* Create Media Api */
        Route::post('/create', 'MediasController@create');
        /* Add Comment On Media Api */
        Route::post('/comment', 'MediasController@comment');
        /* Liking Media Api */
        Route::post('/like', 'MediasController@like');
        /* Unliking Media Api */
        Route::post('/unlike', 'MediasController@unlike');
        /* Sharing Media Api */
        Route::post('/share', 'MediasController@share');
        /* Deleting Media Api */
        Route::post('/delete', 'MediasController@delete');
        /* Hiding Media Api */
        Route::post('/hide', 'MediasController@hide');
        /* Reporting Media Api */
        Route::post('/report', 'MediasController@report');
        /* Display Media Activities Api */
        Route::post('/activity', 'MediasController@activity');
        /* Updating Media Description Api */
        Route::post('/description', 'MediasController@update_description');
        /* List User's Media Api */
        Route::get('/listbyuser/{user_id}/{session_token}/{media_user_id}', 'MediasController@listbyuser');
    });

    /*
     * Medias Manager
     */
    Route::group([
        'prefix' => 'pages',
        'as' => 'page.',
        'namespace' => 'Page',
            ], function () {

        /* Create a Page Api */
        Route::post('/create', 'PagesController@create');
        /* Add Page Admin Api */
        Route::post('/add_admin', 'PagesController@add_admin');
        /* Remove Page Admin Api */
        Route::post('/remove_admin', 'PagesController@remove_admin');
        /* Deactivate Page Api */
        Route::post('/deactivate', 'PagesController@deactivate');
        /* Page Notification Settings Api */
        Route::post('/notification_settings', 'PagesController@notification_settings');
    });

    /*
     * Embassy Manager
     */
    Route::group([
        'prefix' => 'embassy',
        'as' => 'embassy.',
        'namespace' => 'Embassies',
            ], function () {

        /* Show Embassies */
        Route::get('/{user_id}/{session_token}/{country_id}/{embassy_id?}', 'EmbassyController@show_embassies');
    });

    /*
     * Country Manager
     */
    Route::group([
        'prefix' => 'countries',
        'as' => 'countries.',
        'namespace' => 'Country',
            ], function () {

        /* Show Country */
        Route::get('/', 'CountryController@show_country');
        /* Get All Countries */
        Route::post('/search', 'CountryController@get_countries');
        /* Get All Country Places */
        Route::post('/places', 'CountryController@get_places');
    });

    /*
     * Place Manager
     */
    Route::group([
        'prefix' => 'places',
        'as' => 'places.',
        'namespace' => 'Place',
            ], function () {

        /* Get All Places */
        Route::post('/search', 'PlaceController@get_places');
    });

    /*
     * Lifestyle Manager
     */
    Route::group([
        'prefix' => 'travelstyles',
        'as' => 'travelstyles.',
        'namespace' => 'LifeStyle',
            ], function () {

        /* Get All Lifestyles */
        Route::post('/search', 'LifestyleController@get_lifestyles');
    });
    
    /*
     * Trip Planner
     */
    Route::group([
        'prefix' => 'trips',
        'as' => 'trips.',
        'namespace' => 'Trips',
            ], function () {

        /* Get All Lifestyles */
        Route::post('/search', 'LifestyleController@get_lifestyles');
    });
});
