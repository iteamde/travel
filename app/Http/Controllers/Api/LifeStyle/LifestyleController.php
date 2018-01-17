<?php

namespace App\Http\Controllers\Api\LifeStyle;

/* Dependencies */

use App\Models\Lifestyle\ApiLifestyle as Lifestyle;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

/**
 * Class Api/LifeStyleController.
 */
class LifeStyleController extends Controller {

    public function __construct() {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the authenticate method. We don't want to prevent
        // the user from retrieving their token if they don't already have it
        $this->middleware('jwt.auth', ['except' => ['authenticate','get_lifestyles']]);
    }

    public function get_lifestyles(Request $request){

        $post = $request->input();

        $query      = null;
        $lifestyles = null;
        $language   = 1; 


        $offset =  0;
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

        $lifestyles = Lifestyle::select('conf_lifestyles.id as lId','conf_lifestyles_trans.title');

        $lifestyles = $lifestyles->join('conf_lifestyles_trans', 'conf_lifestyles.id', '=', 'conf_lifestyles_trans.lifestyles_id')->where(['languages_id' => $language]);

        if(!empty($query)){
            $lifestyles = $lifestyles->where('title', 'REGEXP', $query);
        }

        $lifestyles = $lifestyles->orderBy('title', 'asc')->offset($offset)->limit($limit);
        $lifestyles = $lifestyles->get();
        
        $lifestyles_arr = [];

        foreach ($lifestyles as $key => $value) {
            $lifestyles_arr[] = $value->getResponse();   
        }

        // $places = json_encode($places_arr);
        $lifestyles = $lifestyles_arr;
        return [
            'success' => true,
            'code'    => 200,
            'data'    => $lifestyles
        ];
    }
}
