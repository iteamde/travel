<?php

namespace App\Http\Controllers\Api\Embassies;

/* Dependencies */
use App\Models\Embassies\ApiEmbassy as Embassy;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

/**
 * Class EmbassyController.
 */
class EmbassyController extends Controller
{
	/* Show Embassies Api */
	public function show_embassies($user_id, $session_token, $country_id, $embassy_id = 0){
		
		$response = Embassy::show_embassies($user_id, $session_token, $country_id, $embassy_id);

		return $response;
	}
}