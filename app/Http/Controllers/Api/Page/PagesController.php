<?php

namespace App\Http\Controllers\Api\Page;

/* Dependencies */
use App\Models\Pages\ApiPages as Pages;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

/**
 * Class PagesController.
 */
class PagesController extends Controller
{
	/* Create Page Api */
	public function create(Request $request){

		$response = Pages::create($request);

		return $response;
	}

	/* Add Admin Api */
	public function add_admin(Request $request){

		$response = Pages::add_admin($request);

		return $response;
	}

	/* Remove Admin Api */
	public function remove_admin(Request $request){

		$response = Pages::remove_admin($request);

		return $response;
	}

	/* Deactivate Page Api */
	public function deactivate(Request $request){

		$response = Pages::deactivate($request);

		return $response;
	}

	/* Notification Settings Api */
	public function notification_settings(Request $request){

		$response = Pages::notification_settings($request);

		return $response;
	}
}