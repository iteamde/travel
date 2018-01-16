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
        $this->middleware('jwt.auth', ['except' => ['authenticate','get_countries']]);
    }

    public function show_country(Request $request) {
        
        $country_id = $request->get('country_id');
        $response   = Country::show_country($country_id);

        return $response;
    }

    public function get_countries(Request $request){

        $post = $request->input();

        $query     = null;
        $countries = null;
        $language  = 1; 


        $offset = 0;
        $limit  = 20;
        
        if(!isset($post['language_id']) || empty($post['language_id'])){
            return [
                'success' => false,
                'code'    => 400,
                'data'    => 'Language id not provided.'
            ];
        }

        if(isset($post['language_id']) && !empty($post['language_id'])){
            $language = $post['language_id'];
        }

        if(isset($post['query']) && !empty($post['query'])){
            $query = $post['query'];
        }

        if(isset($post['offset']) && !empty($post['offset'])){
            $offset = $post['offset'];
        }

        if(isset($post['limit']) && !empty($post['limit'])){
            $limit = $post['limit'];
        }

        $countries = Country::join('countries_trans', 'countries.id', '=', 'countries_trans.countries_id')->where(['active' => 1,'languages_id' => $language]);

        if(!empty($query)){
            $countries = $countries->where('title', 'REGEXP', $query);
        }

        $countries = $countries->orderBy('title', 'asc')->offset($offset)->limit($limit);
        $countries =  $countries->get();

        $countries_arr = [];

        foreach ($countries as $key => $value) {
            $countries_arr[] = $value->getResponse();   
        }

        return [
            'success' => true,
            'code'    => 200,
            'data'    => $countries_arr
        ];
    }

}
