<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityMedia\Media;
use App\Models\Place\PlaceMedias;
use Illuminate\Support\Facades\DB;

class CronsController extends Controller {

    public function getPlacesMedia(Request $request) { // Nebraska
        getPlacesMediaPerCities(array(597,598,599));
    }

    public function getPlacesMedia2(Request $request) {  // Maine
        getPlacesMediaPerCities(array(566,567,568));
    }

    public function getPlacesMedia3(Request $request) { // Louisiana
        getPlacesMediaPerCities(array(561,562,563,564,565));
    }

    public function getPlacesMedia4(Request $request) { // Kentucky
        getPlacesMediaPerCities(array(558,559,560));
    }

    public function getPlacesMedia5(Request $request) { // Kansas
        getPlacesMediaPerCities(array(553,554,555,556,557));
    }

    public function getPlacesMedia6(Request $request) { // Iowa
        getPlacesMediaPerCities(array(550,551,552));
    }

    public function getPlacesMedia7(Request $request) { // Indiana
        getPlacesMediaPerCities(array(546,547,548,549));
    }

    public function getPlacesMedia8(Request $request) { // Michigan
        getPlacesMediaPerCities(array(577,578,579,580,581));
    }

    public function getPlacesMedia9(Request $request) { // Illinois
        getPlacesMediaPerCities(array(540,541,542,543,544,545));
    }

    public function getPlacesMedia10(Request $request) { // Maryland
        getPlacesMediaPerCities(array(569,570,571));
    }











    public function getHotelsMedia(Request $request) { // New Mexico
        getHotelsMediaPerCities(array(617,618,619));
    }

    public function getHotelsMedia2(Request $request) { // New Jersey
        getHotelsMediaPerCities(array(611,612,613,614,615,616));
    }

    public function getHotelsMedia3(Request $request) { // New Hampshire
        getHotelsMediaPerCities(array(608,609,610));
    }

    public function getHotelsMedia4(Request $request) { // Nevada
        getHotelsMediaPerCities(array(600,601,602,603,604,605,606,607));
    }

    public function getHotelsMedia5(Request $request) { // Nebraska
        getHotelsMediaPerCities(array(597,598,599));
    }

    public function getHotelsMedia6(Request $request) { // Montana
        getHotelsMediaPerCities(array(594,595,596));
    }

    public function getHotelsMedia7(Request $request) { // Missouri
        getHotelsMediaPerCities(array(589,590,591,592,593));
    }

    public function getHotelsMedia8(Request $request) { // North Dakota
        getHotelsMediaPerCities(array(631,632,633));
    }

    public function getHotelsMedia9(Request $request) { // Mississippi
        getHotelsMediaPerCities(array(587,588));
    }

    public function getHotelsMedia10(Request $request) { // Minnesota
        getHotelsMediaPerCities(array(583,584,585,586));
    }






    public function getRestaurantsMedia(Request $request) { // Tennessee
        getRestaurantsMediaPerCities(array(660,661,662,663,664,665));
    }

    public function getRestaurantsMedia2(Request $request) { // South Dakota
        getRestaurantsMediaPerCities(array(658,659));
    }

    public function getRestaurantsMedia3(Request $request) { // South Carolina
        getRestaurantsMediaPerCities(array(654,655,656,657));
    }

    public function getRestaurantsMedia4(Request $request) { // Rhode Island
        getRestaurantsMediaPerCities(array(651,652,653));
    }

    public function getRestaurantsMedia5(Request $request) { // Pennsylvania
        getRestaurantsMediaPerCities(array(648,649,650));
    }

    public function getRestaurantsMedia6(Request $request) { // Oregon
        getRestaurantsMediaPerCities(array(644,645,646,647));
    }
    public function getRestaurantsMedia7(Request $request) { // Oklahoma
        getRestaurantsMediaPerCities(array(641,642,643,722));
    }

    public function getRestaurantsMedia8(Request $request) { // Ohio
        getRestaurantsMediaPerCities(array(634,635,636,637,638,639));
    }

    public function getRestaurantsMedia9(Request $request) { // North Dakota
        getRestaurantsMediaPerCities(array(631,632,633));
    }

    public function getRestaurantsMedia10(Request $request) { // North Carolina
        getRestaurantsMediaPerCities(array(624,625,626,627,628,629,630));
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
