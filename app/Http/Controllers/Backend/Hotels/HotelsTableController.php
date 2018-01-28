<?php

namespace App\Http\Controllers\Backend\Hotels;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Hotels\HotelsRepository;
use App\Http\Requests\Backend\Hotels\ManageHotelsRequest;

use App\Models\Country\Countries;
use App\Models\Country\CountriesTranslations;
use App\Models\City\Cities;
use App\Models\Place\Place;
use App\Models\Hotels\Hotels;
use App\Models\PlaceTypes\PlaceTypes;
use App\Models\City\CitiesTranslations;

/**
 * Class HotelsTableController.
 */
class HotelsTableController extends Controller
{
    /**
     * @var HotelsRepository
     */
    protected $hotels;

    /**
     * @param HotelsRepository $hotels
     */
    public function __construct(HotelsRepository $hotels)
    {
        $this->hotels = $hotels;
    }

    /**
     * @param ManageHotelsRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->hotels->getForDataTable())
            // ->escapeColumns(['code'])
            ->addColumn('',function(){
                return null;
            })
            ->addColumn('address',function($hotels){
                $place = Place::find($hotels->places_id);
                if(!empty($place)){
                    if(!empty($place->transsingle)){
                        return $place->transsingle->address;
                    }
                }
                return null;
            })
            ->addColumn('city_title',function($hotels){
                $temp = Cities::find($hotels->cities_id);
                if(!empty($temp)){
                    if(!empty($temp->transsingle)){
                        return $temp->transsingle->title;
                    }
                }
                return null;
            })
            ->addColumn('country_title', function ($hotels) {

                $temp = Countries::find($hotels->countries_id);

                if(!empty($temp)){
                    if(!empty($temp->transsingle)){
                        return $temp->transsingle->title;
                    }
                }
            })
            ->addColumn('place_id_title',function($hotels){
                // $temp = Place::find($hotels->places_id);
                // if(!empty($temp)){
                //         return $temp->place_type;
                // }
                return $hotels->place_type;
            })
            ->addColumn('place_type',function($hotels){
                $place = Place::find($hotels->places_id);
                $temp = null;
                if(!empty($place)){
                    $temp = PlaceTypes::find($place->place_type);
                }
                if(!empty($temp)){
                    if(!empty($temp->transsingle)){
                        return $temp->id;
                    }
                }
                return null;
            })
            ->addColumn('action', function ($hotels) {
                return $hotels->action_buttons;
            })
            ->withTrashed()
            ->make(true);
    }

    public function getAddedCountries(){

        $q = null;
        if(isset($_GET['q'])){
            $q = $_GET['q'];
        }

        $hotel = Hotels::distinct()->select('countries_id')->get();
        $temp_country = [];
        $filter_html = null;
        $json = [];

        if(!empty($hotel)){
            foreach ($hotel as $key => $value) {
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

        $place = Hotels::distinct()->select('cities_id')->get();
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

        if(empty($q)){
            $place = Hotels::distinct()->select('place_type')->get();
        }else{
            $place = Hotels::distinct()->select('place_type')->where('place_type', 'LIKE', '%'.$q.'%')->get();
        }
        $temp_city = [];
        $city_filter_html = null;
        $json = [];

        if(!empty($place)){
            foreach ($place as $key => $value) {
                    $json[] = ['id' => $value->place_type, 'text' => $value->place_type];
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
                config('hotels.hotels_table').'.id',
                config('hotels.hotels_table').'.lat',
                config('hotels.hotels_table').'.lng',
                config('hotels.hotels_table').'.active'
            ]);
    }
}
