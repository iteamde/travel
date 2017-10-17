<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityMedia\Media;
use App\Models\Place\PlaceMedias;

class CronsController extends Controller {

    public function getPlacesMedia(Request $request) {
        $places_without_media = \App\Models\Place\Place::whereNull('media_done')
                ->orderBy('id', 'ASC')
                ->take(5)
                ->get();

        foreach ($places_without_media AS $pwm) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/places/media/go/' . $pwm->provider_id);
            }

            $photos = unserialize($json);

            echo $pwm->provider_id . ' ';
            if (is_array($photos)) {
                foreach ($photos AS $p) {
                    $media_file = 'places_media/' . $pwm->provider_id . '/' . sha1(microtime()) . '.jpg';
                    Storage::disk('public')->put($media_file, $p);

                    $media = new Media;
                    $media->url = $media_file;
                    $media->save();

                    $place_media = new PlaceMedias;
                    $place_media->places_id = $pwm->id;
                    $place_media->medias_id = $media->id;
                    $place_media->save();
                }
                echo count($photos);
            }
            echo '<br />';

            $pwm->media_done = 1;
            $pwm->save();
        }
    }

    public function getPlacesDetails($field, Request $request) {

        $places_missing_details = \App\Models\Place\Place::whereNull($field)
                ->orderBy('id', 'ASC')
                ->take(100)
                ->get();

        foreach ($places_missing_details AS $pmd) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/places/details/go/' . $pmd->provider_id);
                echo 'http://db.travooo.com/public/places/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 1)  {
                $json = file_get_contents('http://db.travooodev.com/public/places/details/go/' . $pmd->provider_id);
                echo 'http://db.travooodev.com/public/places/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 2)  {
                $json = file_get_contents('http://db.travoooapi.com/public/places/details/go/' . $pmd->provider_id);
                echo 'http://db.travoooapi.com/public/places/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 3)  {
                $json = file_get_contents('http://db.travoooapi.net/public/places/details/go/' . $pmd->provider_id);
                echo 'http://db.travoooapi.net/public/places/details/go/' . $pmd->provider_id . ' ';
            }

            $details = json_decode($json);
            echo $pmd->provider_id . ' ';

            if (is_object($details)) {
                $types = @join(",", $details->types);
                echo $types;
            }
            if(!isset($types)) {
                $types = '';
            }
            echo '<br />';

            $pmd->place_type = $types;
            $pmd->save();
        }
    }

}
