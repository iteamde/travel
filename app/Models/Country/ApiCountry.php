<?php

namespace App\Models\Country;

use App\Models\Country\Countries;
use App\Models\User\ApiUser as User;
use App\Models\System\Session;

/* Api Country Model */
class ApiCountry extends Countries
{
    /* Show Country Function */
    public static function show_country($country_id){

        /* If Country Id Is Not An Integer, Return Error */
        if(! is_numeric($country_id)){
            return Self::generateErrorMessage(false, 400, 'Country id should be an integer.');
        }

        /* Find Country For The Provided Country Id */
        $country = Self::where(['id' => $country_id])->first();

        /* If Country Not Found, Return Error */
        if(empty($country)){
            return Self::generateErrorMessage(false, 400, 'Wrong country id provided.');
        }

        /* Get Country Information In Array Format */
        $country_arr = $country->getArrayResponse();

        /* Return Success Status, And Country Information */
        return [
            'status' => true,
            'data'   => [
                'country_info' => $country_arr
            ]
        ];

    }

    public function getArrayResponse(){

        /* Container For Country Translations */
        $country_translations = [];

        /* If Country Translations Exist, Get Translation Information In Array Format */
        if(!empty($this->trans)){
            foreach ($this->trans as $key => $value) {
                $country_translations[$value->languages_id] = [
                    'title'         => $value->title,
                    'description'   => $value->description,
                    'nationality'   => $value->nationality,
                    'population'    => $value->population,
                    'best_place'    => $value->best_place,
                    'best_time'     => $value->best_time,
                    'cost_of_living'=> $value->cost_of_living,
                    'geo_stats'     => $value->geo_stats,
                    'demographics'  => $value->demographics,
                    'economy'       => $value->economy,
                    'suitable_for'  => $value->suitable_for,
                    'user_rating'   => $value->user_rating,
                    'num_cities'    => $value->num_cities
                ];
            }
        }

        /* Container For Country Media Information */
        $country_media_arr = [];

        /* If Country Media Exists, Get Media Information In Array Format */
        if(!empty($this->medias)){
            foreach ($this->medias as $key => $value) {
                array_push($country_media_arr,$value->media->getArrayResponse());
            }
        }

        /* Return Array Response */
        return [
            'id'               => $this->id,
            'regions_id'       => $this->id,
            'code'             => $this->code,
            'lat'              => $this->lat,
            'lng'              => $this->lng,
            'safety_degree_id' => $this->safety_degree_id,
            'active'           => $this->active,
            'translations'     => $country_translations,
            'country_medias'   => $country_media_arr
        ];
    }

    /* Generate Error Message With provided "status", "code" and "message" */
    public static function generateErrorMessage($status, $code, $message){

        $response = [];
        /* If Code == null */
        if( $code ){
            $response = [
                'data' => [
                    'error'     => $code,
                    'message'   => $message,
                ],
                'status'    => $status
            ];
        }else{
            $response = [
                'data' => [
                    'message'   => $message,
                ],
                'status'    => $status
            ];
        }

        return $response;
    }
}
