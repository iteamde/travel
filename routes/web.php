<?php
use Illuminate\Http\Request;
/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */

Route::get('/', function () {
    // return view('frontend.index');
    return File::get(public_path() . '/myapp/index.html');
});

// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController@swap');

Route::get('crons/places/fixlostimages', 'CronsController@getFixLostImages');


Route::get('crons/places/media', 'CronsController@getPlacesMedia');
Route::get('crons/places/media2', 'CronsController@getPlacesMedia2');
Route::get('crons/places/media3', 'CronsController@getPlacesMedia3');
Route::get('crons/places/media4', 'CronsController@getPlacesMedia4');
Route::get('crons/places/media5', 'CronsController@getPlacesMedia5');
Route::get('crons/places/media6', 'CronsController@getPlacesMedia6');
Route::get('crons/places/media7', 'CronsController@getPlacesMedia7');
Route::get('crons/places/media8', 'CronsController@getPlacesMedia8');
Route::get('crons/places/media9', 'CronsController@getPlacesMedia9');
Route::get('crons/places/media10', 'CronsController@getPlacesMedia10');

Route::get('crons/restaurants/media', 'CronsController@getRestaurantsMedia');
Route::get('crons/restaurants/media2', 'CronsController@getRestaurantsMedia2');
Route::get('crons/restaurants/media3', 'CronsController@getRestaurantsMedia3');
Route::get('crons/restaurants/media4', 'CronsController@getRestaurantsMedia4');
Route::get('crons/restaurants/media5', 'CronsController@getRestaurantsMedia5');
Route::get('crons/restaurants/media6', 'CronsController@getRestaurantsMedia6');
Route::get('crons/restaurants/media7', 'CronsController@getRestaurantsMedia7');
Route::get('crons/restaurants/media8', 'CronsController@getRestaurantsMedia8');
Route::get('crons/restaurants/media9', 'CronsController@getRestaurantsMedia9');
Route::get('crons/restaurants/media10', 'CronsController@getRestaurantsMedia10');

Route::get('crons/hotels/media', 'CronsController@getHotelsMedia');
Route::get('crons/hotels/media2', 'CronsController@getHotelsMedia2');
Route::get('crons/hotels/media3', 'CronsController@getHotelsMedia3');
Route::get('crons/hotels/media4', 'CronsController@getHotelsMedia4');
Route::get('crons/hotels/media5', 'CronsController@getHotelsMedia5');
Route::get('crons/hotels/media6', 'CronsController@getHotelsMedia6');
Route::get('crons/hotels/media7', 'CronsController@getHotelsMedia7');
Route::get('crons/hotels/media8', 'CronsController@getHotelsMedia8');
Route::get('crons/hotels/media9', 'CronsController@getHotelsMedia9');
Route::get('crons/hotels/media10', 'CronsController@getHotelsMedia10');


Route::get('crons/places/details/{field}', 'CronsController@getPlacesDetails');
Route::get('crons/hotels/details/{field}', 'CronsController@getHotelsDetails');
Route::get('crons/restaurants/details/{field}', 'CronsController@getRestaurantsDetails');
Route::get('crons/embassies/details/{field}', 'CronsController@getEmbassiesDetails');

/* ----------------------------------------------------------------------- */

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
// Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
//     includeRouteFiles(__DIR__.'/Frontend/');
// });

/* ----------------------------------------------------------------------- */

/*
 * Admin Login Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend\Login', 'as' => 'frontend.','prefix' => 'admin'], function () {
    includeRouteFiles(__DIR__.'/AdminLogin/');
});

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    includeRouteFiles(__DIR__.'/Backend/');
});

// Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.'], function(){

    // Route::group(['namespace' => 'Auth','as' => 'auth.'], function () {
        // Route::get('logout-admin','LoginController@logoutAdmin')->name('logout-admin');
    // });
    /*
     * These routes require no user to be logged in
     */
    // Route::group(['middleware' => 'guest','namespace' => 'Auth','as' => 'auth.'], function () {

        // Authentication Routes
        // Route::get('login', 'LoginController@showLoginForm')->name('login');
        // Route::post('login', 'LoginController@loginAdmin')->name('login.post');
    // });

// });

/*
 * Api Routes
 * Namespaces indicate folder structure
 */
// Route::group(['namespace' => 'Api', 'as' => 'api.', 'middleware' => 'api'], function () {
    /*
     * These routes need view-api permission
     * (good if you want to allow more than one group in the api,
     * then limit the api features by different roles or permissions)
     *
     */
    // includeRouteFiles(__DIR__.'/Api/');
// });