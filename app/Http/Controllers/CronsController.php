<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CronsController extends Controller
{

    public function getPlacesMedia(Request $request) {
        $places_without_media = \App\Models\Place\Place::leftJoin('places_medias', 'places.id', '=', 'places_medias.places_id')
                ->whereNull('places_medias.places_id')
                ->orderBy('places.id', 'ASC')
                ->take(10)
                ->get();
        foreach($places_without_media AS $pwm) {
            //var_dump($pwm->provider_id);
            if (time() % 2 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/places/media/go/' . $pwm->provider_id);
            } else {
                $json = file_get_contents('http://db.travooodev.com/public/places/media/go/' . $pwm->provider_id);
            }

            dd($json);
        }
    }
}
