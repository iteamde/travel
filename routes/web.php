<?php
use Illuminate\Http\Request;
/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController@swap');

/* ----------------------------------------------------------------------- */

Route::post('test_login', function(Request $request){
            echo '<pre>';
            print_r($request->input());
            exit;
            $credentials = array('u_username' => 'user', 'password' => 'pass123');

            if(Auth::attempt($credentials, true)){
                // return 'You have successfully logged in :D';
                return Redirect::to('/');

            } else {
                return 'Sorry, but your Credentials seem to be wrong.';
            }

        });

Route::get('test_login', function(){
            return '<form action="http://travooo.com/test_login" method="post">
            
                <input type="text" name="test" value="test" />
                <input type="submit" />
            </form>';

});

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/Frontend/');
});

/* ----------------------------------------------------------------------- */

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