<?php

namespace App\Http\Controllers\Backend\Country;

use App\Models\Country\Countries;
use App\Models\Country\CountriesTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;
use App\Http\Requests\Backend\Country\ManageCountryRequest;
use App\Http\Requests\Backend\Country\StoreCountryRequest;
use App\Repositories\Backend\Country\CountryRepository;
use App\Models\Access\Regions\Regions;
use App\Models\SafetyDegree\SafetyDegree;

class CountryController extends Controller
{
    protected $countries;

    public function __construct(CountryRepository $countries)
    {
        $this->countries = $countries;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageCountryrRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageCountryRequest $request)
    {
        return view('backend.access.country.index');
    }

    /**
     * @param ManageCountryRequest $request
     *
     * @return mixed
     */
    public function create(ManageCountryRequest $request)
    {   
        /* Get All Regions */
        $regions = Regions::where(['active' => 1])->get();
        $regions_arr = [];
        
        foreach ($regions as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $regions_arr[$value->id] = $value->transsingle->title;
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
       
        return view('backend.access.country.create',[
            'regions' => $regions_arr,
            'degrees' => $degrees_arr,
        ]);
    }

    /**
     * @param StoreCountryRequest $request
     *
     * @return mixed
     */
    public function store(StoreCountryRequest $request)
    {   
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
            $data[$language->id]['nationality_'.$language->id] = $request->input('nationality_'.$language->id);
            $data[$language->id]['population_'.$language->id] = $request->input('population_'.$language->id);
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

        $extra = [
            'active' => $active,
            'region_id' =>  $request->input('region_id'),
            'code' => $request->input('code'),
            'lat' => $location[0],
            'lng' => $location[1],
            'safety_degree_id' => $request->input('safety_degree_id')
        ];

        $this->countries->create($data, $extra);

        return redirect()->route('admin.location.country.index')->withFlashSuccess('Country Created!');
    }

    /**
     * @param Country $id
     * @param ManageCountryRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageCountryRequest $request)
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
    public function edit($id, ManageCountryRequest $request)
    {   
        
        $data = [];
        $country = Countries::findOrFail(['id' => $id]);
        $country = $country[0];

        foreach ($this->languages as $key => $language) {
            $model = CountriesTranslations::where([
                'languages_id' => $language->id,
                'countries_id'   => $id
            ])->get();

            $data['title_'.$language->id] = $model[0]->title;
            $data['description_'.$language->id] = $model[0]->description;
            $data['nationality_'.$language->id] = $model[0]->nationality;
            $data['population_'.$language->id] = $model[0]->population;
            $data['best_place_'.$language->id] = $model[0]->best_place;
            $data['best_time_'.$language->id] = $model[0]->best_time;
            $data['cost_of_living_'.$language->id] = $model[0]->cost_of_living;
            $data['geo_stats_'.$language->id] = $model[0]->geo_stats;
            $data['demographics_'.$language->id] = $model[0]->demographics;
            $data['economy_'.$language->id] = $model[0]->economy;
            $data['suitable_for_'.$language->id] = $model[0]->suitable_for;
        }

        $data['lat_lng'] = $country['lat'] . ',' . $country['lng'];
        $data['code'] = $country['code'];
        $data['active'] = $country['active'];
        $data['regions_id'] = $country['regions_id'];
        $data['safety_degree_id'] = $country['safety_degree_id'];

        $regions = Regions::where(['active' => 1])->get();
        $regions_arr = [];
        
        foreach ($regions as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $regions_arr[$value->id] = $value->transsingle->title;
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

        return view('backend.access.country.edit')
            ->withLanguages($this->languages)
            ->withCountry($country)
            ->withCountryid($id)
            ->withData($data)
            ->withRegions($regions_arr)
            ->withDegrees($degrees_arr);
    }

    /**
     * @param Countries            $id
     * @param ManageCountryRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageCountryRequest $request)
    {   
        $country = Countries::findOrFail(['id' => $id]);
        
        $data = [];

       $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
            $data[$language->id]['nationality_'.$language->id] = $request->input('nationality_'.$language->id);
            $data[$language->id]['population_'.$language->id] = $request->input('population_'.$language->id);
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
        
        $extra = [
            'active' => $active,
            'region_id' =>  $request->input('region_id'),
            'code' => $request->input('code'),
            'lat' => $location[0],
            'lng' => $location[1],
            'safety_degree_id' => $request->input('safety_degree_id')
        ];

        
        $this->countries->update($id , $country, $data , $extra);

        return redirect()->route('admin.location.country.index')
            ->withFlashSuccess('Country updated Successfully!');
    }

    /**
     * @param Country        $id
     * @param ManageCountryRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageCountryRequest $request)
    {   
        $country = Countries::findOrFail(['id' => $id]);
        $countryTrans = CountriesTranslations::where(['countries_id' => $id])->get();
        $country = $country[0];

        /* Get Regions Information */
        $region = $country->region;
        $region = $region->transsingle;
        
        /* Get Safety Degrees Information */
        $safety_degree = $country->degree;
        $safety_degree = $safety_degree->transsingle;
       
        return view('backend.access.country.show')
            ->withCountry($country)
            ->withCountrytrans($countryTrans)
            ->withRegion($region)
            ->withDegree($safety_degree);
    }

    /**
     * @param Countries $countries
     * @param $status
     * @param ManageCountryRequest $request
     *
     * @return mixed
     */
    public function mark(Countries $country, $status, ManageCountryRequest $request)
    {
        $country->active = $status;
        $country->save();
        return redirect()->route('admin.location.country.index')
            ->withFlashSuccess('Country Status Updated!');
    }
}