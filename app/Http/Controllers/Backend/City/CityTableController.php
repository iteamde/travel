<?php

namespace App\Http\Controllers\Backend\City;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\City\CityRepository;
use App\Http\Requests\Backend\City\ManageCityRequest;
use App\Models\City\Cities;
use App\Models\Country\Countries;
use App\Models\Country\CountriesTranslations;

/**
 * Class CityTableController.
 */
class CityTableController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $cities;

    /**
     * @param CountryRepository $countries
     */
    public function __construct(CityRepository $cities)
    {
        $this->cities = $cities;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->cities->getForDataTable())
            ->escapeColumns(['code'])
            ->addColumn('',function(){
                return null;
            })
            ->addColumn('country',function($city){
                return $city->country->transsingle->title;
            })
            ->addColumn('action', function ($city) {
                return $city->action_buttons;
            })
            ->withTrashed()
            ->make(true);
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            // ->with('users', 'permissions')
            ->select([
                config('locations.city_table').'.id',
                config('locations.city_table').'.code',
                config('locations.city_table').'.lat',
                config('locations.city_table').'.lng',
                config('locations.city_table').'.active'
            ]);
    }

    public function getAddedCountries(){

        $q = null;
        if(isset($_GET['q'])){
            $q = $_GET['q'];
        }

        $place = Cities::distinct()->select('countries_id')->get();
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
}
