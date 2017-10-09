<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityMedia\Media;
use App\Models\Place\PlaceMedias;

class CronsController extends Controller {

    public function getPlacesMedia(Request $request) {
        $places_without_media = \App\Models\Place\Place::leftJoin('places_medias', 'places.id', '=', 'places_medias.places_id')
                ->whereNull('places_medias.places_id')
                ->orderBy('places.id', 'ASC')
                ->take(1)
                ->get();
        foreach ($places_without_media AS $pwm) {
            //var_dump($pwm->provider_id);
            if (time() % 2 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/places/media/go/' . $pwm->provider_id);
            } else {
                $json = file_get_contents('http://db.travooodev.com/public/places/media/go/' . $pwm->provider_id);
            }

            $photos = unserialize($json);

            $place = \App\Models\Place\Place::where('provider_id', $pwm->provider_id)->get()->first();

            var_dump($pwm->provider_id);
            dd($photos);

            foreach ($photos AS $p) {
                $media_file = 'places_media/' . $pwm->provider_id . '/' . sha1(microtime()) . '.jpg';
                Storage::disk('public')->put($media_file, $p);

                $media = new Media;
                $media->url = $media_file;
                $media->save();

                $place_media = new PlaceMedias;
                $place_media->places_id = $place->id;
                $place_media->medias_id = $media->id;
                $place_media->save();
            }

//            var_dump($photos);
        }
    }

}
