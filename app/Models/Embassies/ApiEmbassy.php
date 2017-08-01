<?php

namespace App\Models\Embassies;

use App\Models\Embassies\Embassies;
use App\Models\User\ApiUser as User;
use App\Models\System\Session;
use App\Models\Country\Countries;

class ApiEmbassy extends Embassies
{
    public static function show_embassies($user_id, $session_token, $country_id, $embassy_id){

        if(! is_numeric($user_id) ){
            return Self::generateErrorMessage(false, 400, 'User id should be an integer.');
        }

        $user = User::where(['id' => $user_id])->first();

        if(empty($user)){
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        $session = Session::where(['id' => $session_token])->first();

        if(empty($session)){
            return Self::generateErrorMessage(false, 400, 'Wrong session token provided.');
        }

        if($session->user_id != $user_id){
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        if(!is_numeric($country_id)){
            return Self::generateErrorMessage(false, 400, 'Country id should be an integer.');
        }

        $country = Countries::where(['id' => $country_id])->first();

        if(empty($country)){
            return Self::generateErrorMessage(false, 400, 'Wrong country id provided.');
        }

        if(!empty($embassy_id)){
            
            if(!is_numeric($embassy_id)){
                return Self::generateErrorMessage(false, 400, 'Embassy id should be an integer.');
            }

            $embassies = Self::where(['id' => $embassy_id])->first();

            if(empty($embassies)){
                return Self::generateErrorMessage(false, 400, 'Wrong embassy id provided.');
            }

            if($embassies->active != Self::ACTIVE){
                return Self::generateErrorMessage(false, 400, 'This embassy is deactivated.')
            }

            $embassies_trans = [];
            if(!empty($embassies->trans)){
                foreach ($embassies->trans as $key => $value) {
                    $embassies_trans[$value->languages_id] = [
                        'title'         => $value->title,
                        'description'   => $value->description
                    ];
                }
            }

            return [
                'status' => true,
                'data'   => [
                    'embassies' => [
                        'id'          => $embassies->id,
                        'lat'         => $embassies->lat,
                        'lng'         => $embassies->lng,
                        'active'      => $embassies->active,
                        'translation' => $embassies_trans
                    ]
                ]
            ];
        }

        $embassies_arr = [];

        $embassies = Self::where(['countries_id' => $country_id, 'active' => Self::ACTIVE])->get();
        
        if(!empty($embassies[0])){
            
            $embassies_translation = [];

            foreach ($embassies as $key => $value) {
                
                if(!empty($value->trans)){
                    foreach ($value->trans as $key_trans => $value_trans) {
                        $embassies_translation[$value_trans->languages_id] = [
                            'title'       => $value_trans->title,
                            'description' => $value_trans->description
                        ];
                    }
                }

                array_push($embassies_arr,[
                    'id'     => $value->id,
                    'lat'    => $value->lat,
                    'lng'    => $value->lng,
                    'active' => $value->active,
                    'translations' => $embassies_translation,
                ]);
            }      
        }

        if(!empty($embassies_arr)){
            return [
                'status' => false,
                'data'   => [
                    'embassies' => $embassies_arr
                ]
            ];
        }else{
            return [
                'status' => false,
                'data'   => [
                    'embassies' => $embassies_arr,
                    'message'   => 'No embassy found for provided country id.'
                ]
            ];
        }
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
