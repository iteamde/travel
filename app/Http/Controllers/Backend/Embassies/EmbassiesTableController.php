<?php

namespace App\Http\Controllers\Backend\Embassies;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Embassies\EmbassiesRepository;
use App\Http\Requests\Backend\User\ManageEmbassiesRequest;

use App\Models\Embassies\Embassies;
use App\Models\City\Cities;
use App\Models\Place\Place;
use App\Models\Hotels\Hotels;
use App\Models\PlaceTypes\PlaceTypes;
use App\Models\City\CitiesTranslations;

/**
 * Class EmbassiesTableController.
 */
class EmbassiesTableController extends Controller
{
    /**
     * @var EmbassiesRepository
     */
    protected $embassies;

    /**
     * @param EmbassiesRepository $embassies
     */
    public function __construct(EmbassiesRepository $embassies)
    {
        $this->embassies = $embassies;
    }

    /**
     * @param ManageEmbassiesRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->embassies->getForDataTable())
            // ->addColumn('',function(){
            //     return null;
            // })
            // ->addColumn('address',function($embassies){
            //     $place = Place::find($embassies->places_id);
            //     if(!empty($place)){
            //         if(!empty($place->transsingle)){
            //             return $place->transsingle->address;
            //         }
            //     }
            //     return null;
            // })
            // ->addColumn('city_title',function($embassies){
            //     $temp = Cities::find($embassies->cities_id);
            //     if(!empty($temp)){
            //         if(!empty($temp->transsingle)){
            //             return $temp->transsingle->title;
            //         }
            //     }
            //     return null;
            // })
            // ->addColumn('place_id_title',function($embassies){
            //     return $embassies->place_type;
            // })
            ->addColumn('action', function ($embassies) {
                return $embassies->action_buttons;
            })
            ->withTrashed()
            ->make(true);
    }

    public function getAddedCities(){

        $q = null;
        if(isset($_GET['q'])){
            $q = $_GET['q'];
        }

        $embassies = Embassies::distinct()->select('cities_id')->get();
        $temp_city = [];
        $city_filter_html = null;
        $json = [];

        if(!empty($embassies)){
            foreach ($embassies as $key => $value) {
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
            $embassies = Embassies::distinct()->select('place_type')->get();
        }else{
            $embassies = Embassies::distinct()->select('place_type')->where('place_type', 'LIKE', '%'.$q.'%')->get();
        }

        $temp_city = [];
        $city_filter_html = null;
        $json = [];

        if(!empty($embassies)){
            foreach ($embassies as $key => $value) {
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
                config('embassies.embassies_table').'.id',
                config('embassies.embassies_table').'.lat',
                config('embassies.embassies_table').'.lng',
                config('embassies.embassies_table').'.cities_id',
                config('embassies.embassies_table').'.active',
                config('embassies.embassies_table').'.place_type',
            ]);
    }
}
