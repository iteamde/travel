<?php

namespace App\Http\Controllers\Api\Country;

/* Dependencies */

use App\Models\Country\ApiCountry as Country;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

/**
 * Class Api/CountryController.
 */
class CountryController extends Controller {

    public function __construct() {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the authenticate method. We don't want to prevent
        // the user from retrieving their token if they don't already have it
        $this->middleware('jwt.auth', ['except' => ['authenticate']]);
    }

    public function show_country(Request $request) {

        $country_id = $request->get('country_id');
        $response = Country::show_country($country_id);

        return $response;
    }

}
