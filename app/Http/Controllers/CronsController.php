<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityMedia\Media;
use App\Models\Place\PlaceMedias;
use Illuminate\Support\Facades\DB;

class CronsController extends Controller {

    public function getPlacesMedia(Request $request) { // Switzerland
        getPlacesMediaPerCities(array(204,205,206,362,363,364,365,366,367,368,369,370));
    }

    public function getPlacesMedia2(Request $request) {  // Taiwan
        getPlacesMediaPerCities(array(115,116,378,379,380));
    }

    public function getPlacesMedia3(Request $request) { // Hungary
        getPlacesMediaPerCities(array(199,436,437,438,439));
    }

    public function getPlacesMedia4(Request $request) { // Ireland
        getPlacesMediaPerCities(array(165,166,347,348,349,350,351,352,353));
    }

    public function getPlacesMedia5(Request $request) { // Netherlands
        getPlacesMediaPerCities(array(201,202,203,331,332,333,334,335,336,337,338));
    }

    public function getPlacesMedia6(Request $request) { //india
        getPlacesMediaPerCities(array(303, 129, 304, 305, 131, 306, 307, 308, 309, 310, 311, 312));
    }

    public function getPlacesMedia7(Request $request) { //germany
        getPlacesMediaPerCities(array(194, 197, 198, 196, 195, 268, 269, 270, 271, 272, 273, 274, 275, 276));
    }

    public function getPlacesMedia8(Request $request) { // Singapore
        getPlacesMediaPerCities(array(460));
    }

    public function getPlacesMedia9(Request $request) { // Phillippines
        getPlacesMediaPerCities(array(142,339,340,341,342,343,344,345,346));
    }

    public function getPlacesMedia10(Request $request) { // Poland
        getPlacesMediaPerCities(array(147,149,150,461,462,463));
    }











    public function getHotelsMedia(Request $request) { // thailand
        getHotelsMediaPerCities(array(144,403,404,405,406,407,408));
    }

    public function getHotelsMedia2(Request $request) { // Taiwan
        getHotelsMediaPerCities(array(115,116,378,379,380));
    }

    public function getHotelsMedia3(Request $request) { // Switzerland
        getHotelsMediaPerCities(array(204,205,206,362,363,364,365,366,367,368,369,370));
    }

    public function getHotelsMedia4(Request $request) { // Spain
        getHotelsMediaPerCities(array(184,185,186,285,286,287,288,289,290,291,292,293,294));
    }

    public function getHotelsMedia5(Request $request) { // Singapore
        getHotelsMediaPerCities(array(460));
    }

    public function getHotelsMedia6(Request $request) { // Poland
        getHotelsMediaPerCities(array(147,149,150,461,462,463));
    }

    public function getHotelsMedia7(Request $request) { // Philippines
        getHotelsMediaPerCities(array(142,339,340,341,342,343,344,345,346));
    }

    public function getHotelsMedia8(Request $request) { // Netherlands
        getHotelsMediaPerCities(array(201,202,203,331,332,333,334,335,336,337,338));
    }

    public function getHotelsMedia9(Request $request) { // Japan
        getHotelsMediaPerCities(array(108,109,322,323,324,325,326,327,328,330));
    }

    public function getHotelsMedia10(Request $request) { // Jamaica
        getHotelsMediaPerCities(array(277,278,279,280,282,283,284));
    }











    public function getRestaurantsMedia(Request $request) { // Spain
        getRestaurantsMediaPerCities(array(184,185,186,285,286,287,288,289,290,291,292,293,294));
    }

    public function getRestaurantsMedia2(Request $request) { // Singapore
        getRestaurantsMediaPerCities(array(460));
    }

    public function getRestaurantsMedia3(Request $request) { // Poland
        getRestaurantsMediaPerCities(array(147,149,150,461,462,463));
    }

    public function getRestaurantsMedia4(Request $request) { // Philippines
        getRestaurantsMediaPerCities(array(142,339,340,341,342,343,344,345,346));
    }

    public function getRestaurantsMedia5(Request $request) { // Netherlands
        getRestaurantsMediaPerCities(array(201,202,203,331,332,333,334,335,336,337,338));
    }

    public function getRestaurantsMedia6(Request $request) { // Japan
        getRestaurantsMediaPerCities(array(108,109,322,323,324,325,326,327,328,330));
    }
    public function getRestaurantsMedia7(Request $request) { // Jamaica
        getRestaurantsMediaPerCities(array(277,278,279,280,282,283,284));
    }

    public function getRestaurantsMedia8(Request $request) { // Italy
        getRestaurantsMediaPerCities(array(177,178,179,180,181,260,261,262,263,264,265,266,267));
    }

    public function getRestaurantsMedia9(Request $request) { // Ireland
        getRestaurantsMediaPerCities(array(165,166,347,348,349,350,351,352,353));
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
