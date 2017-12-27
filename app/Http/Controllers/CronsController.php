<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityMedia\Media;
use App\Models\Place\PlaceMedias;
use Illuminate\Support\Facades\DB;
use Illuminate\Filesystem\Filesystem;

class CronsController extends Controller {

    public function getPlacesMedia(Request $request) { // Alaska
        getPlacesMediaPerCities(1);
    }

    public function getPlacesMedia2(Request $request) {  // Alabama
        getPlacesMediaPerCities(2);
    }

    public function getPlacesMedia3(Request $request) { // Georgia
        getPlacesMediaPerCities(3);
    }

    public function getPlacesMedia4(Request $request) { // Flordia
        getPlacesMediaPerCities(4);
    }

    public function getPlacesMedia5(Request $request) { // Delaware
        getPlacesMediaPerCities(5);
    }

    public function getPlacesMedia6(Request $request) { // Connecticut
        getPlacesMediaPerCities(6);
    }

    public function getPlacesMedia7(Request $request) { // Colorado
        getPlacesMediaPerCities(7);
    }

    public function getPlacesMedia8(Request $request) { // California
        getPlacesMediaPerCities(8);
    }

    public function getPlacesMedia9(Request $request) { // Arkansas
        getPlacesMediaPerCities(9);
    }

    public function getPlacesMedia10(Request $request) { // Arizona
        getPlacesMediaPerCities(10);
    }
    
    
    

    public function getFixLostImages(Request $request) { // Arizona
        $f = new Filesystem;
        $files = $f->directories('/home/travooo/public_html/storage/app/public/places_media');
        echo count($files) . "<br />";
        foreach ($files as $file) {
            echo (string) dirname($file). "<br />";
        }
    }
    
    
    

    public function getHotelsMedia(Request $request) { // Alaska
        getHotelsMediaPerCities(1);
    }

    public function getHotelsMedia2(Request $request) { // Alabama
        getHotelsMediaPerCities(2);
    }

    public function getHotelsMedia3(Request $request) { // Georgia
        getHotelsMediaPerCities(3);
    }

    public function getHotelsMedia4(Request $request) { // Flordia
        getHotelsMediaPerCities(4);
    }

    public function getHotelsMedia5(Request $request) { // Delaware
        getHotelsMediaPerCities(5);
    }

    public function getHotelsMedia6(Request $request) { // Connecticut
        getHotelsMediaPerCities(6);
    }

    public function getHotelsMedia7(Request $request) { // Colorado
        getHotelsMediaPerCities(7);
    }

    public function getHotelsMedia8(Request $request) { // California
        getHotelsMediaPerCities(8);
    }

    public function getHotelsMedia9(Request $request) { // Arkansas
        getHotelsMediaPerCities(9);
    }

    public function getHotelsMedia10(Request $request) { // Arizona
        getHotelsMediaPerCities(10);
    }

    public function getRestaurantsMedia(Request $request) { // Alabama
        getRestaurantsMediaPerCities(1);
    }

    public function getRestaurantsMedia2(Request $request) { // Alaska
        getRestaurantsMediaPerCities(2);
    }

    public function getRestaurantsMedia3(Request $request) { // Georgia
        getRestaurantsMediaPerCities(3);
    }

    public function getRestaurantsMedia4(Request $request) { // Flordia
        getRestaurantsMediaPerCities(4);
    }

    public function getRestaurantsMedia5(Request $request) { // Delaware
        getRestaurantsMediaPerCities(5);
    }

    public function getRestaurantsMedia6(Request $request) { // Connecticut
        getRestaurantsMediaPerCities(6);
    }

    public function getRestaurantsMedia7(Request $request) { // Colorado
        getRestaurantsMediaPerCities(7);
    }

    public function getRestaurantsMedia8(Request $request) { // California
        getRestaurantsMediaPerCities(8);
    }

    public function getRestaurantsMedia9(Request $request) { // Arkansas
        getRestaurantsMediaPerCities(9);
    }

    public function getRestaurantsMedia10(Request $request) { // Arizona
        getRestaurantsMediaPerCities(10);
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
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/places/details/go/' . $pmd->provider_id);
                echo 'http://db.travooodev.com/public/places/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/places/details/go/' . $pmd->provider_id);
                echo 'http://db.travoooapi.com/public/places/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/places/details/go/' . $pmd->provider_id);
                echo 'http://db.travoooapi.net/public/places/details/go/' . $pmd->provider_id . ' ';
            }

            $details = json_decode($json);
            echo $pmd->provider_id . ' ';

            if (is_object($details)) {
                $types = @join(",", $details->types);
                echo $types;
            }
            if (!isset($types)) {
                $types = '';
            }
            echo '<br />';

            $pmd->place_type = $types;
            $pmd->save();
        }
    }

    public function getEmbassiesDetails($field, Request $request) {

        $places_missing_details = \App\Models\Embassies\Embassies::whereNull($field)
                ->orderBy('id', 'ASC')
                ->take(100)
                ->get();

        foreach ($places_missing_details AS $pmd) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/embassies/details/go/' . $pmd->provider_id);
                echo 'http://db.travooo.com/public/embassies/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/embassies/details/go/' . $pmd->provider_id);
                echo 'http://db.travooodev.com/public/embassies/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/embassies/details/go/' . $pmd->provider_id);
                echo 'http://db.travoooapi.com/public/embassies/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/embassies/details/go/' . $pmd->provider_id);
                echo 'http://db.travoooapi.net/public/embassies/details/go/' . $pmd->provider_id . ' ';
            }

            $details = json_decode($json);
            echo $pmd->provider_id . ' ';

            if (is_object($details)) {
                $types = @join(",", $details->types);
                echo $types;
            }
            if (!isset($types)) {
                $types = '';
            }
            echo '<br />';

            $pmd->place_type = $types;
            $pmd->save();
        }
    }

    public function getHotelsDetails($field, Request $request) {


        $places_missing_details = \App\Models\Hotels\Hotels::whereNull($field)
                ->orderBy('id', 'ASC')
                ->take(100)
                ->get();

        foreach ($places_missing_details AS $pmd) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/hotels/details/go/' . $pmd->provider_id);
                echo 'http://db.travooo.com/public/hotels/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/hotels/details/go/' . $pmd->provider_id);
                echo 'http://db.travooodev.com/public/hotels/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/hotels/details/go/' . $pmd->provider_id);
                echo 'http://db.travoooapi.com/public/hotels/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/hotels/details/go/' . $pmd->provider_id);
                echo 'http://db.travoooapi.net/public/hotels/details/go/' . $pmd->provider_id . ' ';
            }

            $details = json_decode($json);
            echo $pmd->provider_id . ' ';

            if (is_object($details)) {
                $types = @join(",", $details->types);
                echo $types;
            }
            if (!isset($types)) {
                $types = '';
            }
            echo '<br />';

            $pmd->place_type = $types;
            $pmd->save();
        }
    }

    public function getRestaurantsDetails($field, Request $request) {


        $places_missing_details = \App\Models\Restaurants\Restaurants::whereNull($field)
                ->orderBy('id', 'ASC')
                ->take(100)
                ->get();

        foreach ($places_missing_details AS $pmd) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/restaurants/details/go/' . $pmd->provider_id);
                echo 'http://db.travooo.com/public/restaurants/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/restaurants/details/go/' . $pmd->provider_id);
                echo 'http://db.travooodev.com/public/restaurants/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/restaurants/details/go/' . $pmd->provider_id);
                echo 'http://db.travoooapi.com/public/restaurants/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/restaurants/details/go/' . $pmd->provider_id);
                echo 'http://db.travoooapi.net/public/restaurants/details/go/' . $pmd->provider_id . ' ';
            }

            $details = json_decode($json);
            echo $pmd->provider_id . ' ';

            if (is_object($details)) {
                $types = @join(",", $details->types);
                echo $types;
            }
            if (!isset($types)) {
                $types = '';
            }
            echo '<br />';

            $pmd->place_type = $types;
            $pmd->save();
        }
    }

}
