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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/* ----------------------------------------------------------------------- */

/*
 * Api Routes
 * Namespaces indicate folder structure
 */
// Route::group([ 'as' => 'api.'], function () {
    /*
     * These routes need view-api permission
     * (good if you want to allow more than one group in the api,
     * then limit the api features by different roles or permissions)
     *
     */
    // includeRouteFiles(__DIR__.'/Api/');
// });
