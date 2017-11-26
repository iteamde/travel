<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityMedia\Media;
use App\Models\Place\PlaceMedias;
use Illuminate\Support\Facades\DB;

class CronsController extends Controller {

    public function getPlacesMedia(Request $request) { // Oklahoma
        getPlacesMediaPerCities(array(722,641,642,643));
    }

    public function getPlacesMedia2(Request $request) {  // Ohio
        getPlacesMediaPerCities(array(634,635,636,637,638,639));
    }

    public function getPlacesMedia3(Request $request) { // North Dakota
        getPlacesMediaPerCities(array(631,632,633));
    }

    public function getPlacesMedia4(Request $request) { // North Carolina
        getPlacesMediaPerCities(array(624,625,626,627,628,629,630));
    }

    public function getPlacesMedia5(Request $request) { // New York
        getPlacesMediaPerCities(array(620,621,622,623));
    }

    public function getPlacesMedia6(Request $request) { // New Mexico
        getPlacesMediaPerCities(array(617,618,619));
    }

    public function getPlacesMedia7(Request $request) { // New Jersey
        getPlacesMediaPerCities(array(611,612,613,614,615,616));
    }

    public function getPlacesMedia8(Request $request) { // New Hampshire
        getPlacesMediaPerCities(array(608,609,610));
    }

    public function getPlacesMedia9(Request $request) { // Texas
        getPlacesMediaPerCities(array(666,667,668,669,670,671,672,673,674,675));
    }

    public function getPlacesMedia10(Request $request) { // Nevada
        getPlacesMediaPerCities(array(600,601,602,603,604,605,606,607));
    }











    public function getHotelsMedia(Request $request) { // Wyoming
        getHotelsMediaPerCities(array(702,703,704));
    }

    public function getHotelsMedia2(Request $request) { // Wisconsin
        getHotelsMediaPerCities(array(699,700,701));
    }

    public function getHotelsMedia3(Request $request) { // West Virginia
        getHotelsMediaPerCities(array(697,698));
    }

    public function getHotelsMedia4(Request $request) { // Washington, D.C
        getHotelsMediaPerCities(array(705));
    }

    public function getHotelsMedia5(Request $request) { // Washington
        getHotelsMediaPerCities(array(690,691,692,693,694,695,696));
    }

    public function getHotelsMedia6(Request $request) { // Virginia
        getHotelsMediaPerCities(array(682,683,684,685,686,687,688,689));
    }

    public function getHotelsMedia7(Request $request) { // Vermont
        getHotelsMediaPerCities(array(680,681));
    }

    public function getHotelsMedia8(Request $request) { // Utah
        getHotelsMediaPerCities(array(676,678,679,723));
    }

    public function getHotelsMedia9(Request $request) { // Texas
        getHotelsMediaPerCities(array(666,667,668,669,670,671,672,673,674,675));
    }

    public function getHotelsMedia10(Request $request) { // Tennessee
        getHotelsMediaPerCities(array(660,661,662,663,664,665));
    }






    public function getRestaurantsMedia(Request $request) { // Wyoming
        getRestaurantsMediaPerCities(array(702,703,704));
    }

    public function getRestaurantsMedia2(Request $request) { // Wisconsin
        getRestaurantsMediaPerCities(array(699,700,701));
    }

    public function getRestaurantsMedia3(Request $request) { // West Virginia
        getRestaurantsMediaPerCities(array(697,698));
    }

    public function getRestaurantsMedia4(Request $request) { // Germany
        getRestaurantsMediaPerCities(array(194,195,196,197,198,268,269,270,271,272,273,274,275,276));
    }

    public function getRestaurantsMedia5(Request $request) { // Washington, D.C.
        getRestaurantsMediaPerCities(array(705));
    }

    public function getRestaurantsMedia6(Request $request) { // Washington
        getRestaurantsMediaPerCities(array(690,691,692,693,694,695,696));
    }
    public function getRestaurantsMedia7(Request $request) { // Virginia
        getRestaurantsMediaPerCities(array(682,683,684,685,686,687,688,689));
    }

    public function getRestaurantsMedia8(Request $request) { // Vermont
        getRestaurantsMediaPerCities(array(680,681));
    }

    public function getRestaurantsMedia9(Request $request) { // Utah
        getRestaurantsMediaPerCities(array(676,678,679,723));
    }

    public function getRestaurantsMedia10(Request $request) { // Texas
        getRestaurantsMediaPerCities(array(666,667,668,669,670,671,672,673,674,675));
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
