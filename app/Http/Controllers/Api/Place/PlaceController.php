<?php

namespace App\Http\Controllers\Api\Place;

/* Dependencies */

use App\Models\Place\ApiPlace as Place;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

/**
 * Class Api/CountryController.
 */
class PlaceController extends Controller {

    public function __construct() {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the authenticate method. We don't want to prevent
        // the user from retrieving their token if they don't already have it
        $this->middleware('jwt.auth', ['except' => ['authenticate','get_places']]);
    }

    public function get_places(Request $request){

        $post = $request->input();

        $query     = null;
        $places = null;
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

        $places = Place::select('places.id as pId','places_trans.title');

        $places = $places->join('places_trans', 'places.id', '=', 'places_trans.places_id')->where(['active' => 1,'languages_id' => $language]);

        if(!empty($query)){
            $places = $places->where('title', 'REGEXP', $query);
        }

        $places = $places->orderBy('rating', 'desc')->offset($offset)->limit($limit);
        $places = $places->get();
        
        $places_arr = [];

        foreach ($places as $key => $value) {
            $places_arr[] = $value->getResponse();   
        }

        // $places = json_encode($places_arr);
        $places = $places_arr;
        return [
            'success' => true,
            'code'    => 200,
            'data'    => $places
        ];
    }
}
