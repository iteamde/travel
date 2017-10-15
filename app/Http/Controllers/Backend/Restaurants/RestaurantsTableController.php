<?php

namespace App\Http\Controllers\Backend\Restaurants;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Restaurants\RestaurantsRepository;
use App\Http\Requests\Backend\Restaurants\ManageRestaurantsRequest;

use App\Models\City\Cities;
use App\Models\Place\Place;
use App\Models\PlaceTypes\PlaceTypes;
use App\Models\Restaurants\Restaurants;
use App\Models\City\CitiesTranslations;

/**
 * Class RestaurantsTableController.
 */
class RestaurantsTableController extends Controller
{
    /**
     * @var RestaurantsRepository
     */
    protected $restaurants;

    /**
     * @param RestaurantsRepository $countries
     */
    public function __construct(RestaurantsRepository $restaurants)
    {
        $this->restaurants = $restaurants;
    }

    /**
     * @param ManageRestaurantsRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {   
        /* Get Data To Populate Datatable In Restaurants Page */
        return Datatables::of($this->restaurants->getForDataTable())
            ->addColumn('',function(){
                return null;
            })
            ->addColumn('address',function($restaurants){
                $place = Place::find($restaurants->places_id);
                if(!empty($place)){
                    if(!empty($place->transsingle)){
                        return $place->transsingle->address;
                    }
                }
                return null;
            })
            ->addColumn('city_title',function($restaurants){
                $place = Place::find($restaurants->places_id);
                $temp = null;
                // if(!empty($place)){
                    $temp = Cities::find($restaurants->cities_id);
                // }
                if(!empty($temp)){
                    if(!empty($temp->transsingle)){
                        return $temp->transsingle->title;
                    }
                }
                return null;
            })
            ->addColumn('place_id_title',function($restaurants){
                $temp = Place::find($restaurants->places_id);
                // $temp = $place;
                // if(!empty($place)){
                //     $temp = PlaceTypes::find($place->place_type);
                // }
                if(!empty($temp)){
                    // if(!empty($temp->transsingle)){
                    //     return $temp->transsingle->title;
                    // }
                    return $temp->place_type;
                }
                return null;
            })
            ->addColumn('action', function ($restaurants) {
                return $restaurants->action_buttons;
            })
            ->withTrashed()
            ->make(true);
    }

    public function getAddedCities(){

        $q = null;
        if(isset($_GET['q'])){
            $q = $_GET['q'];
        }

        $place = Restaurants::distinct()->select('cities_id')->get();
        $temp_city = [];
        $city_filter_html = null;
        $json = [];

        if(!empty($place)){
            foreach ($place as $key => $value) {
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

        echo json_encode($json);
        // return $temp_city;
    }

    public function getPlaceTypes(){

        $q = null;
        if(isset($_GET['q'])){
            $q = $_GET['q'];
        }

        $place = Restaurants::distinct()->select('places_id')->get();
        $temp_city = [];
        $city_filter_html = null;
        $json = [];

        if(!empty($place)){
            foreach ($place as $key => $value) {
                if(!empty($q)){
                    $temp_place = Place::where([ 'id' => $value->places_id ])->where('place_type', 'LIKE', '%'.$q.'%')->first();
                }else{
                    $temp_place = Place::find($value->places_id);
                }
                if(!empty($temp_place)){
                    
                    $json[] = ['id' => $temp_place->place_type, 'text' => $temp_place->place_type];
                    
                }
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
        return $this->query()
            // ->with('users', 'permissions')
            ->select([
                config('restaurants.restaurants_table').'.id',
                config('restaurants.restaurants_table').'.lat',
                config('restaurants.restaurants_table').'.lng',
                config('restaurants.restaurants_table').'.active'
            ]);
    }
}
