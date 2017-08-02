<?php

namespace App\Http\Controllers\Api\Country;

/* Dependencies */
use App\Models\Country\ApiCountry as Country;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

/**
 * Class CountryController.
 */
class CountryController extends Controller
{
	/* Show Country Api */
	public function show_country($user_id, $session_token, $country_id){
		
		$response = Country::show_country($user_id, $session_token, $country_id);

		return $response;
	}
}