<?php

namespace App\Http\Controllers\Backend\Place;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Place\PlaceRepository;
use App\Http\Requests\Backend\Place\ManagePlaceRequest;
use App\Models\PlaceTypes\PlaceTypes;
// use App\Models\Cities\City;
use App\Models\Place\Place;
use App\Models\City\Cities;
use App\Models\City\CitiesTranslations;
use App\Models\Country\Countries;
use App\Models\Country\CountriesTranslations;

/**
 * Class UserTableController.
 */
class PlaceTableController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $places;

    /**
     * @param PlaceRepository $places
     */
    public function __construct(PlaceRepository $places)
    {
        $this->places = $places;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {   
        $media = '3';
        if(isset($_POST['columns']) && isset($_POST['columns'][7]) && isset($_POST['columns'][7]['search']) && isset($_POST['columns'][7]['search']['value'])){
            $temp_media =  $_POST['columns'][7]['search']['value'].'';
            if($temp_media != ''){
                $media = $temp_media;
            } 
        }
        
        //\App\Models\City\Cities::
        return Datatables::of($this->places->getForDataTable($media))
            ->escapeColumns(['code'])
            ->addColumn('',function(){
                return null;
            })
            ->addColumn('place_id_title',function($place){
                // $temp = PlaceTypes::find($place->place_type);
                $temp = $place->place_type;
                // if(!empty($temp)){
                //     if(!empty($temp)){
                //         return $temp->transsingle->title;
                //     }
                // }
                return $temp;
            })
            ->addColumn('action', function ($place) {
                return $place->action_buttons;
            })
            ->addColumn('city_title', function ($place) {
                return $place->city->transsingle->title;
            })
            ->addColumn('country_title', function ($place) {
                return $place->country->transsingle->title;
            })
            ->addColumn('media_done_new', function ($place) {
                $medias = $place->medias;
                $flag = false;
                if(!empty($medias)){
                    foreach ($medias as $key => $value) {
                        if(!empty($value->media)){
                            if($value->media->featured == 1 || $value->media->featured == '1'){
                                $flag = true;
                                $place->media_done = 1;
                                $place->save();
                                return 'Yes';
                            }
                        }
                    }
                }
                
                if($place->media_done.'' == '1'){
                    return 'Yes';
                }else{
                    return 'No';
                }
                // if($flag == true){
                //     $place->media_done = 1;
                //     $place->save();
                //     return 'Yes';
                // }else{
                //     $place->media_done = 0;
                //     $place->save();
                //     return 'No';
                // }

                // if( $place->media_done == 1 ){ 
                //     return 'Yes';
                // }
                // return 'No';
            })
            ->withTrashed()
            ->make(true);
    }

    public function getAddedCountries(){

        $q = null;
        if(isset($_GET['q'])){
            $q = $_GET['q'];
        }

        $place = Place::distinct()->select('countries_id')->get();
        $temp_country = [];
        $filter_html = null;
        $json = [];

        if(!empty($place)){
            foreach ($place as $key => $value) {
                $country = null;
                if(empty($q)){
                    $country = Countries::find($value->countries_id);

                }else{
                    // $country = Countries::find($value->cities_id);
                    $country = Countries::leftJoin('countries_trans', function($join){
                        $join->on('countries_trans.countries_id', '=', 'countries.id');
                    })->where('countries_trans.title', 'LIKE', '%'.$q.'%')->where(['countries.id' => $value->countries_id])->first();
                }
                if(!empty($country)){

                    $transingle = CountriesTranslations::where(['countries_id' => $value->countries_id])->first();

                    if(!empty($transingle)){
                        // $temp_city[$city->id] = $city->transsingle->title;
                        $filter_html .= '<option value="'.$value->countries_id.'">'.$transingle->title.'</option>';
                        array_push($temp_country,$transingle->title);
                         $json[] = ['id' => $value->countries_id, 'text' => $transingle->title];
                    }
                }
            }
        }
        // exit;
        echo json_encode($json);
        // return $temp_city;
    }

    public function getAddedCities(){

        $q = null;
        if(isset($_GET['q'])){
            $q = $_GET['q'];
        }

        $place = Place::distinct()->select('cities_id')->get();
        $temp_city = [];
        $city_filter_html = null;
        $json = [];

        if(!empty($place)){
            foreach ($place as $key => $value) {
                $city = null;
                if(empty($q)){
                    $city = Cities::find($value->cities_id);

                }else{
                    // $city = Cities::find($value->cities_id);
                    $city = Cities::leftJoin('cities_trans', function($join){
                        $join->on('cities_trans.cities_id', '=', 'cities.id');
                    })->where('cities_trans.title', 'LIKE', '%'.$q.'%')->where(['cities.id' => $value->cities_id])->first();
                }
                if(!empty($city)){

                    $transingle = CitiesTranslations::where(['cities_id' => $value->cities_id])->first();

                    if(!empty($transingle)){
                        // $temp_city[$city->id] = $city->transsingle->title;
                        $city_filter_html .= '<option value="'.$value->cities_id.'">'.$transingle->title.'</option>';
                        array_push($temp_city,$transingle->title);
                         $json[] = ['id' => $value->cities_id, 'text' => $transingle->title];
                    }
                }
            }
        }
        // exit;
        echo json_encode($json);
        // return $temp_city;
    }

    public function getPlaceTypes(){

        $q = null;
        if(isset($_GET['q'])){
            $q = $_GET['q'];
        }

        if(!empty($q)){
            $place = Place::distinct()->select('place_type')->where('place_type', 'LIKE', '%'.$q.'%')->get();
        }else{
            $place = Place::distinct()->select('place_type')->get();
        }
        $temp_city = [];
        $city_filter_html = null;
        $json = [];

        if(!empty($place)){
            foreach ($place as $key => $value) {

                $json[] = [ 'id' => $value->place_type, 'text' => $value->place_type ];
            }
        }
        echo json_encode($json);
        // return $temp_city;
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        $this->query()
            // ->with('users', 'permissions')
            ->select([
                config('locations.place_table').'.id'
            ]);
    }
}
