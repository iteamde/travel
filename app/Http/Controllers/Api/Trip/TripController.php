<?php

namespace App\Http\Controllers\Api\Trip;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TripPlans\TripPlans;
use App\Models\TripCities\TripCities;
use App\Models\City\Cities;
use App\Models\Place\Place;

class TripController extends Controller
{
    public function postNew(Request $request) {

        $post = $request->input();
        
        //$user_id = $post['user_id'];
        $user_id = 4;
        $title = $post['title'];
        $date = $post['date'];
        $privacy = $post['privacy'];
        $duration = $post['duration'];
        
        $trip = new TripPlans;
        $trip->users_id = $user_id;
        $trip->title = $title;
        $trip->start_date = date('Y-m-d H:i:s', time());
        $trip->privacy = $privacy;
        
        if($trip->save()) {
            return [
                'data' => [
                    'trip_id' => $trip->id
                ],
                'success' => true
            ];
        }
        else {
            return [
                'data' => [
                    'error' => 400,
                    'message' => 'Error saving Trip in DB.',
                ],
                'success' => false
            ];
        }
        
    }
    
    public function postAddCity(Request $request) {

        $post = $request->input();
        
        $trip_id = $post['trip_id'];
        $city_id = $post['city_id'];
        $order = $post['order'];
        $date = $post['date'];
        
        $trip = TripPlans::find($trip_id);
        if(!$trip) {
            return [
                'data' => [
                    'error' => 400,
                    'message' => 'Invalid Trip ID',
                ],
                'success' => false
            ];
        }
        
        $city = Cities::find($city_id);
        if(!$city) {
            return [
                'data' => [
                    'error' => 400,
                    'message' => 'Invalid City ID',
                ],
                'success' => false
            ];
        }
        
        if($trip->cities->where('id', $city_id)->count()>0) {
            return [
                'data' => [
                    'error' => 400,
                    'message' => 'City is already added before!',
                ],
                'success' => false
            ];
        }
        
        $att = $trip->cities()->attach($city_id,['order' => $order, 'date' => date('Y-m-d', $date)]);
        
        
            return [
                
                'success' => true
            ];
        
        
    }
    
    public function postAddPlace(Request $request) {

        $post = $request->input();
        
        isset($post['trip_id']) ? $trip_id = $post['trip_id'] : $trip_id = null;
        isset($post['place_id']) ? $place_id = $post['place_id'] : $place_id = null;
        isset($post['order']) ? $order = $post['order'] : $order = null;
        isset($post['date']) ? $date = $post['date'] : $date = null;
        isset($post['time']) ? $time = $post['time'] : $time = null;
        isset($post['duration']) ? $duration = $post['duration'] : $duration = null;
        isset($post['budget']) ? $budget = $post['budget'] : $budget = null;
        
        $trip = TripPlans::find($trip_id);
        if(!$trip) {
            return [
                'data' => [
                    'error' => 400,
                    'message' => 'Invalid Trip ID',
                ],
                'success' => false
            ];
        }
        
        $place = Place::find($place_id);
        if(!$place) {
            return [
                'data' => [
                    'error' => 400,
                    'message' => 'Invalid Place ID',
                ],
                'success' => false
            ];
        }
        
        if($trip->places->where('id', $place_id)->count()>0) {
            return [
                'data' => [
                    'error' => 400,
                    'message' => 'Place is already added before!',
                ],
                'success' => false
            ];
        }
        
        $att = $trip->places()->attach($place_id,['countries_id' => $place->country->id, 'cities_id' => $place->city->id
                , 'order' => $order, 'date' => date('Y-m-d', $date)
            , 'time' => $time, 'duration' => $duration, 'budget' => $budget]);
        
        
            return [
                
                'success' => true
            ];
        
        
    }
}