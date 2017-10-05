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
                if(!empty($place)){
                    $temp = Cities::find($place->cities_id);
                }
                if(!empty($temp)){
                    if(!empty($temp->transsingle)){
                        return $temp->transsingle->title;
                    }
                }
                return null;
            })
            ->addColumn('place_id_title',function($restaurants){
                $place = Place::find($restaurants->places_id);
                $temp = null;
                if(!empty($place)){
                    $temp = PlaceTypes::find($place->place_type);
                }
                if(!empty($temp)){
                    if(!empty($temp->transsingle)){
                        return $temp->transsingle->title;
                    }
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

        $place = Restaurants::distinct()->select('cities_id')->get();
        $temp_city = [];
        $city_filter_html = null;
        $json = [];

        if(!empty($place)){
            foreach ($place as $key => $value) {
                $city = Cities::find($value->cities_id);
                if(!empty($city)){
                    if(!empty($city->transsingle)){
                        // $temp_city[$city->id] = $city->transsingle->title;
                        $city_filter_html .= '<option value="'.$city->id.'">'.$city->transsingle->title.'</option>';
                        array_push($temp_city,$city->transsingle->title);
                         $json[] = ['id'=>$city->id, 'text'=>$city->transsingle->title];
                    }
                }
            }
        }

        echo json_encode($json);
        // return $temp_city;
    }

    public function getPlaceTypes(){

        $place = Restaurants::distinct()->select('places_id')->get();
        $temp_city = [];
        $city_filter_html = null;
        $json = [];

        if(!empty($place)){
            foreach ($place as $key => $value) {
                $temp_place = Place::find($value->places_id);
                if(!empty($temp_place)){
                    $temp_type = PlaceTypes::find($temp_place->place_type);
                    if(!empty($temp_type)){
                        if(!empty($temp_type->transsingle)){
                            // $temp_city[$city->id] = $city->transsingle->title;
                            $city_filter_html .= '<option value="'.$temp_type->id.'">'.$temp_type->transsingle->title.'</option>';
                            array_push($temp_city,$temp_type->transsingle->title);
                             $json[] = ['id'=>$temp_type->id, 'text'=>$temp_type->transsingle->title];
                        }    
                    }
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
