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
        //\App\Models\City\Cities::

        return Datatables::of($this->places->getForDataTable())
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
            ->withTrashed()
            ->make(true);
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
