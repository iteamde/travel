<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityMedia\Media;
use App\Models\Place\PlaceMedias;
use Illuminate\Support\Facades\DB;

class CronsController extends Controller {

    public function getPlacesMedia(Request $request) { // Idaho
        getPlacesMediaPerCities(array(537,538,539));
    }

    public function getPlacesMedia2(Request $request) {  // Hawaii
        getPlacesMediaPerCities(array(530,531,532,533,534,535,536));
    }

    public function getPlacesMedia3(Request $request) { // Georgia
        getPlacesMediaPerCities(array(524,525,526,527,529));
    }

    public function getPlacesMedia4(Request $request) { // Flordia
        getPlacesMediaPerCities(array(515,516,517,518,519,520,521,522,523));
    }

    public function getPlacesMedia5(Request $request) { // Delaware
        getPlacesMediaPerCities(array(511,512,513,514));
    }

    public function getPlacesMedia6(Request $request) { // Connecticut
        getPlacesMediaPerCities(array(506,507,508,509,510));
    }

    public function getPlacesMedia7(Request $request) { // Colorado
        getPlacesMediaPerCities(array(500,501,502,503,504,505));
    }

    public function getPlacesMedia8(Request $request) { // California
        getPlacesMediaPerCities(array(491,492,493,494,495,496,497,498,499));
    }

    public function getPlacesMedia9(Request $request) { // Arkansas
        getPlacesMediaPerCities(array(487,488,489));
    }

    public function getPlacesMedia10(Request $request) { // Arizona
        getPlacesMediaPerCities(array(479,480,481,482,483,484,485,486));
    }











    public function getHotelsMedia(Request $request) { // Idaho
        getHotelsMediaPerCities(array(537,538,539));
    }

    public function getHotelsMedia2(Request $request) { // Hawaii
        getHotelsMediaPerCities(array(530,531,532,533,534,535,536));
    }

    public function getHotelsMedia3(Request $request) { // Georgia
        getHotelsMediaPerCities(array(524,525,526,527,529));
    }

    public function getHotelsMedia4(Request $request) { // Flordia
        getHotelsMediaPerCities(array(515,516,517,518,519,520,521,522,523));
    }

    public function getHotelsMedia5(Request $request) { // Delaware
        getHotelsMediaPerCities(array(511,512,513,514));
    }

    public function getHotelsMedia6(Request $request) { // Connecticut
        getHotelsMediaPerCities(array(506,507,508,509,510));
    }

    public function getHotelsMedia7(Request $request) { // Colorado
        getHotelsMediaPerCities(array(500,501,502,503,504,505));
    }

    public function getHotelsMedia8(Request $request) { // California
        getHotelsMediaPerCities(array(490,491,492,493,494,495,496,497,498,499));
    }

    public function getHotelsMedia9(Request $request) { // Arkansas
        getHotelsMediaPerCities(array(487,488,489));
    }

    public function getHotelsMedia10(Request $request) { // Arizona
        getHotelsMediaPerCities(array(479,480,481,482,483,484,485,486));
    }






    public function getRestaurantsMedia(Request $request) { // New York
        getRestaurantsMediaPerCities(array(620,621,622,623));
    }

    public function getRestaurantsMedia2(Request $request) { // New Mexico
        getRestaurantsMediaPerCities(array(617,618,619));
    }

    public function getRestaurantsMedia3(Request $request) { // New Jersey
        getRestaurantsMediaPerCities(array(611,612,613,614,615,616));
    }

    public function getRestaurantsMedia4(Request $request) { // New Hampshire
        getRestaurantsMediaPerCities(array(608,609,610));
    }

    public function getRestaurantsMedia5(Request $request) { // Nevada
        getRestaurantsMediaPerCities(array(600,601,602,603,604,605,606,607));
    }

    public function getRestaurantsMedia6(Request $request) { // Nebraska
        getRestaurantsMediaPerCities(array(597,598,599));
    }
    public function getRestaurantsMedia7(Request $request) { // Montana
        getRestaurantsMediaPerCities(array(594,595,596));
    }

    public function getRestaurantsMedia8(Request $request) { // Missouri
        getRestaurantsMediaPerCities(array(589,590,591,592,593));
    }

    public function getRestaurantsMedia9(Request $request) { // Mississippi
        getRestaurantsMediaPerCities(array(587,588));
    }

    public function getRestaurantsMedia10(Request $request) { // Minnesota
        getRestaurantsMediaPerCities(array(583,584,585,586));
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
