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






    public function getRestaurantsMedia(Request $request) { // Michigan
        getRestaurantsMediaPerCities(array(577,578,579,580,581));
    }

    public function getRestaurantsMedia2(Request $request) { // Massachusetts
        getRestaurantsMediaPerCities(array(572,573,574,575,576));
    }

    public function getRestaurantsMedia3(Request $request) { // Maryland
        getRestaurantsMediaPerCities(array(569,570,571));
    }

    public function getRestaurantsMedia4(Request $request) { // Maine
        getRestaurantsMediaPerCities(array(566,567,568));
    }

    public function getRestaurantsMedia5(Request $request) { // Louisiana
        getRestaurantsMediaPerCities(array(561,562,563,564,565));
    }

    public function getRestaurantsMedia6(Request $request) { // Kentucky
        getRestaurantsMediaPerCities(array(558,559,560));
    }
    public function getRestaurantsMedia7(Request $request) { // Kansas
        getRestaurantsMediaPerCities(array(553,554,555,556,557));
    }

    public function getRestaurantsMedia8(Request $request) { // Iowa
        getRestaurantsMediaPerCities(array(550,551,552));
    }

    public function getRestaurantsMedia9(Request $request) { // Indiana
        getRestaurantsMediaPerCities(array(546,547,548,549));
    }

    public function getRestaurantsMedia10(Request $request) { // Illinois
        getRestaurantsMediaPerCities(array(540,541,542,543,544,545));
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
