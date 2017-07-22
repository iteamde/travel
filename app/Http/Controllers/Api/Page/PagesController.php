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
}