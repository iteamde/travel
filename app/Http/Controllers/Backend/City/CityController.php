<?php

namespace App\Http\Controllers\Backend\City;

use App\Models\City\Cities;
use App\Models\City\CitiesTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;
use App\Http\Requests\Backend\City\ManageCityRequest;
use App\Http\Requests\Backend\City\StoreCityRequest;
use App\Repositories\Backend\City\CityRepository;
use App\Models\Country\Countries;
use App\Models\SafetyDegree\SafetyDegree;

class CityController extends Controller
{
    protected $cities;

    public function __construct(CityRepository $cities)
    {
        $this->cities = $cities;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageCountryrRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageCityRequest $request)
    {
        return view('backend.city.index');
    }

    /**
     * @param ManageCountryRequest $request
     *
     * @return mixed
     */
    public function create(ManageCityRequest $request)
    {   
        /* Get All Regions */
        $countries = Countries::where(['active' => 1])->get();
        $countries_arr = [];
        
        foreach ($countries as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $countries_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All safety Degrees */
        $degrees = SafetyDegree::get();
        $degrees_arr = [];
        
        foreach ($degrees as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){  
                $degrees_arr[$value->id] = $value->transsingle->title;
            }
        }
       
        return view('backend.city.create',[
            'countries' => $countries_arr,
            'degrees' => $degrees_arr,
        ]);
    }

    /**
     * @param StoreCountryRequest $request
     *
     * @return mixed
     */
    public function store(StoreCityRequest $request)
    {   
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
            $data[$language->id]['best_time_'.$language->id] = $request->input('best_time_'.$language->id);
            $data[$language->id]['best_place_'.$language->id] = $request->input('best_place_'.$language->id);
            $data[$language->id]['cost_of_living_'.$language->id] = $request->input('cost_of_living_'.$language->id);
            $data[$language->id]['geo_stats_'.$language->id] = $request->input('geo_stats_'.$language->id);
            $data[$language->id]['demographics_'.$language->id] = $request->input('demographics_'.$language->id);
            $data[$language->id]['suitable_for_'.$language->id] = $request->input('suitable_for_'.$language->id);
            $data[$language->id]['economy_'.$language->id] = $request->input('economy_'.$language->id);  
        }

        $location = explode(',',$request->input('lat_lng') ); 
        
        /* Check if active field is enabled or disabled */
        $active = null;
        if(empty($request->input('active')) || $request->input('active') == 0){
            $active = 2;
        }else{
            $active = 1;
        }

        /* Check if capital field is enabled or disabled */
        $is_capital = null;
        if(empty($request->input('is_capital')) || $request->input('is_capital') == 0){
            $is_capital = 2;
        }else{
            $is_capital = 1;
        }

        $extra = [
            'active' => $active,
            'is_capital' => $is_capital,
            'countries_id' =>  $request->input('countries_id'),
            'code' => $request->input('code'),
            'lat' => $location[0],
            'lng' => $location[1],
            'safety_degree_id' => $request->input('safety_degree_id')
        ];

        $this->cities->create($data, $extra);

        return redirect()->route('admin.location.city.index')->withFlashSuccess('City Created!');
    }

    /**
     * @param Country $id
     * @param ManageCountryRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageCityRequest $request)
    {
        $item = Countries::findOrFail($id);
        /* Delete Children Tables Data of this country */
        $child = CountriesTranslations::where(['countries_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.location.country.index')->withFlashSuccess('Country Deleted Successfully');
    }

    /**
     * @param Countries $id
     * @param ManageCountryRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageCityRequest $request)
    {   
        $data = [];
        $cities = Cities::findOrFail(['id' => $id]);
        $cities = $cities[0];

        foreach ($this->languages as $key => $language) {
            $model = CitiesTranslations::where([
                'languages_id' => $language->id,
                'cities_id'   => $id
            ])->get();

            $data['title_'.$language->id] = $model[0]->title;
            $data['description_'.$language->id] = $model[0]->description;
            $data['best_place_'.$language->id] = $model[0]->best_place;
            $data['best_time_'.$language->id] = $model[0]->best_time;
            $data['cost_of_living_'.$language->id] = $model[0]->cost_of_living;
            $data['geo_stats_'.$language->id] = $model[0]->geo_stats;
            $data['demographics_'.$language->id] = $model[0]->demographics;
            $data['economy_'.$language->id] = $model[0]->economy;
            $data['suitable_for_'.$language->id] = $model[0]->suitable_for;
        }

        $data['lat_lng'] = $cities['lat'] . ',' . $cities['lng'];
        $data['code'] = $cities['code'];
        $data['active'] = $cities['active'];
        $data['is_capital'] = $cities['is_capital'];
        $data['countries_id'] = $cities['countries_id'];
        $data['safety_degree_id'] = $cities['safety_degree_id'];

        $countries = Countries::where(['active' => 1])->get();
        $countries_arr = [];
        
        foreach ($countries as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $countries_arr[$value->id] = $value->transsingle->title;
            }
        }

         /* Get All safety Degrees */
        $degrees = SafetyDegree::get();
        $degrees_arr = [];
        
        foreach ($degrees as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){  
                $degrees_arr[$value->id] = $value->transsingle->title;
            }
        }

        return view('backend.city.edit')
            ->withLanguages($this->languages)
            ->withCity($cities)
            ->withCityid($id)
            ->withData($data)
            ->withCountries($countries_arr)
            ->withDegrees($degrees_arr);
    }

    /**
     * @param Countries            $id
     * @param ManageCountryRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageCityRequest $request)
    {   
        $country = Cities::findOrFail(['id' => $id]);
        
        $data = [];

        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
            $data[$language->id]['best_time_'.$language->id] = $request->input('best_time_'.$language->id);
            $data[$language->id]['best_place_'.$language->id] = $request->input('best_place_'.$language->id);
            $data[$language->id]['cost_of_living_'.$language->id] = $request->input('cost_of_living_'.$language->id);
            $data[$language->id]['geo_stats_'.$language->id] = $request->input('geo_stats_'.$language->id);
            $data[$language->id]['demographics_'.$language->id] = $request->input('demographics_'.$language->id);
            $data[$language->id]['suitable_for_'.$language->id] = $request->input('suitable_for_'.$language->id);
            $data[$language->id]['economy_'.$language->id] = $request->input('economy_'.$language->id);  
        }

        $location = explode(',',$request->input('lat_lng') ); 
        
        /* Check if active field is enabled or disabled */
        $active = null;
        if(empty($request->input('active')) || $request->input('active') == 0){
            $active = 2;
        }else{
            $active = 1;
        }

        /* Check if is_capital field is enabled or disabled */
        $is_capital = null;
        if(empty($request->input('is_capital')) || $request->input('is_capital') == 0){
            $is_capital = 2;
        }else{
            $is_capital = 1;
        }
        
        $extra = [
            'active' => $active,
            'is_capital' => $is_capital,
            'countries_id' =>  $request->input('countries_id'),
            'code' => $request->input('code'),
            'lat' => $location[0],
            'lng' => $location[1],
            'safety_degree_id' => $request->input('safety_degree_id')
        ];

        
        $this->cities->update($id , $country, $data , $extra);

        return redirect()->route('admin.location.city.index')
            ->withFlashSuccess('City updated Successfully!');
    }

    /**
     * @param Country        $id
     * @param ManageCountryRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageCityRequest $request)
    {   
        $city = Cities::findOrFail(['id' => $id]);
        $cityTrans = CitiesTranslations::where(['cities_id' => $id])->get();
        $city = $city[0];

        /* Get Country Information */
        $country = $city->country;
        $country = $country->transsingle;

        /* Get Safety Degrees Information */
        $safety_degree = $city->degree;
        $safety_degree = $safety_degree->transsingle;
       
        return view('backend.city.show')
            ->withCity($city)
            ->withCitytrans($cityTrans)
            ->withCountry($country)
            ->withDegree($safety_degree);
    }

    /**
     * @param Countries $countries
     * @param $status
     * @param ManageCountryRequest $request
     *
     * @return mixed
     */
    public function mark(Cities $city, $status, ManageCityRequest $request)
    {
        $city->active = $status;
        $city->save();
        return redirect()->route('admin.location.city.index')
            ->withFlashSuccess('City Status Updated!');
    }
}