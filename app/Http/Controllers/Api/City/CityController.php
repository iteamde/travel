<?php

namespace App\Http\Controllers\Api\City;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City\Cities;

class CityController extends Controller
{
    public function postSearch(Request $request){

        $post = $request->input();
        
        if(!isset($post['language_id']) || empty($post['language_id'])){
            return [
                'success' => false,
                'code'    => 400,
                'data'    => 'Language id not provided.'
            ];
        }
        else {
            $language_id = $post['language_id'];
        }
        
        if(isset($post['query']) && !empty($post['query'])){
            $query = $post['query'];
        }
        else {
            $query = null;
        }

        $cities = null;
        
        $offset = 0;
        $limit  = 20;
        
        

        $cities = Cities::select('cities.id as cId','cities.*','cities_trans.*');

        $cities = $cities->join('cities_trans', 'cities.id', '=', 'cities_trans.cities_id')->where(['active' => 1,'languages_id' => $language_id]);

        if(!empty($query)){
            $cities = $cities->where('title', 'REGEXP', $query);
        }

        $cities = $cities->orderBy('title', 'asc')->offset($offset)->limit($limit);
        $cities = $cities->get();
        
        
        $cities = json_encode($cities);
        //dd($cities);
        
        return [
            'success' => true,
            'code'    => 200,
            'data'    => $cities
        ];
    }
}
