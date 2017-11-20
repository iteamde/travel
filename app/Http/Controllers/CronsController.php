<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityMedia\Media;
use App\Models\Place\PlaceMedias;
use Illuminate\Support\Facades\DB;

class CronsController extends Controller {

    public function getPlacesMedia(Request $request) { // South Dakota
        getPlacesMediaPerCities(array(658,659));
    }

    public function getPlacesMedia2(Request $request) {  // Wisconsin
        getPlacesMediaPerCities(array(699,700,701));
    }

    public function getPlacesMedia3(Request $request) { // South Carolina
        getPlacesMediaPerCities(array(654,655,656,657));
    }

    public function getPlacesMedia4(Request $request) { // Rhode Island
        getPlacesMediaPerCities(array(651,652,653));
    }

    public function getPlacesMedia5(Request $request) { // Washington
        getPlacesMediaPerCities(array(690,691,692,693,694,695,696));
    }

    public function getPlacesMedia6(Request $request) { //Virginia
        getPlacesMediaPerCities(array(682,683,684,685,686,687,688,689));
    }

    public function getPlacesMedia7(Request $request) { //Pennsylvania
        getPlacesMediaPerCities(array(648,649,650));
    }

    public function getPlacesMedia8(Request $request) { // Oregon
        getPlacesMediaPerCities(array(644,645,646,647));
    }

    public function getPlacesMedia9(Request $request) { // Texas
        getPlacesMediaPerCities(array(666,667,668,669,670,671,672,673,674,675));
    }

    public function getPlacesMedia10(Request $request) { // Tennessee
        getPlacesMediaPerCities(array(660,661,662,663,664,665));
    }











    public function getHotelsMedia(Request $request) { // Colombia
        getHotelsMediaPerCities(array(96,97,355,356,357,358,359,360,361));
    }

    public function getHotelsMedia2(Request $request) { // China
        getHotelsMediaPerCities(array(104,106,295,296,297,298,299,300,301));
    }

    public function getHotelsMedia3(Request $request) { // Canada
        getHotelsMediaPerCities(array(50,51,52,53,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237));
    }

    public function getHotelsMedia4(Request $request) { // Austria
        getHotelsMediaPerCities(array(187,396,397,398,399,400,401,402));
    }

    public function getHotelsMedia5(Request $request) { // Hong Kong
        getHotelsMediaPerCities(array(377));
    }

    public function getHotelsMedia6(Request $request) { // Greece
        getHotelsMediaPerCities(array(176,409,410,411,412,413,414,415));
    }

    public function getHotelsMedia7(Request $request) { // Germany
        getHotelsMediaPerCities(array(194,195,196,197,198,268,269,270,271,272,273,274,275,276));
    }

    public function getHotelsMedia8(Request $request) { // France
        getHotelsMediaPerCities(array(190,191,192,193,251,252,253,254,255,256,257,258,259));
    }

    public function getHotelsMedia9(Request $request) { // Czech
        getHotelsMediaPerCities(array(189,431,432,433,434,435));
    }

    public function getHotelsMedia10(Request $request) { // Costa Rica
        getHotelsMediaPerCities(array(54,313,314,315,316,317,318,319,320,321));
    }






    public function getRestaurantsMedia(Request $request) { // Hungary
        getRestaurantsMediaPerCities(array(199,436,437,438,439));
    }

    public function getRestaurantsMedia2(Request $request) { // Hong Kong
        getRestaurantsMediaPerCities(array(377));
    }

    public function getRestaurantsMedia3(Request $request) { // Greece
        getRestaurantsMediaPerCities(array(176,409,410,411,412,413,414,415));
    }

    public function getRestaurantsMedia4(Request $request) { // Germany
        getRestaurantsMediaPerCities(array(194,195,196,197,198,268,269,270,271,272,273,274,275,276));
    }

    public function getRestaurantsMedia5(Request $request) { // Czech Republic
        getRestaurantsMediaPerCities(array(189,431,432,433,434,435));
    }

    public function getRestaurantsMedia6(Request $request) { // Costa Rica
        getRestaurantsMediaPerCities(array(54,313,314,315,316,317,318,319,320,321));
    }
    public function getRestaurantsMedia7(Request $request) { // Colombia
        getRestaurantsMediaPerCities(array(96,97,355,356,357,358,359,360,361));
    }

    public function getRestaurantsMedia8(Request $request) { // China
        getRestaurantsMediaPerCities(array(104,106,295,296,297,298,299,300,301));
    }

    public function getRestaurantsMedia9(Request $request) { // Austria
        getRestaurantsMediaPerCities(array(187,396,397,398,399,400,401,402));
    }

    public function getRestaurantsMedia10(Request $request) { // India
        getRestaurantsMediaPerCities(array(129,131,303,304,305,306,307,308,309,310,311,312));
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
