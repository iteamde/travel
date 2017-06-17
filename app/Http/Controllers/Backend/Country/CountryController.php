<?php

namespace App\Http\Controllers\Backend\Country;

use App\Models\Country\Countries;
use App\Models\Country\CountriesTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;
use App\Http\Requests\Backend\Country\ManageCountryRequest;
use App\Http\Requests\Backend\Country\StoreCountryRequest;
use App\Repositories\Backend\Country\CountryRepository;
use App\Models\Regions\Regions;
use App\Models\SafetyDegree\SafetyDegree;
use App\Models\Place\Place;
use App\Models\Currencies\Currencies;
use App\Models\City\Cities;
use App\Models\EmergencyNumbers\EmergencyNumbers;
use App\Models\Holidays\Holidays;

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
        return view('backend.country.index');
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
        
        /* Get All Places For Airports*/
        $places = Place::where(['active' => 1])->get();
        $places_arr = [];
        
        foreach ($places as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $places_arr[$value->id] = $value->transsingle->title;
            }
        }
       
        /* Get All Currencies */
        $currencies = Currencies::where(['active' => 1])->get();
        $currencies_arr = [];
        
        foreach ($currencies as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $currencies_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All Cities */
        $cities = Cities::where(['active' => 1])->get();
        $cities_arr = [];
        
        foreach ($cities as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $cities_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All EmergencyNumbers */
        $emergency_numbers = EmergencyNumbers::get();
        $emergency_numbers_arr = [];
        
        foreach ($emergency_numbers as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $emergency_numbers_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All Holidays */
        $holidays = Holidays::get();
        $holidays_arr = [];
        
        foreach ($holidays as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $holidays_arr[$value->id] = $value->transsingle->title;
            }
        }


        return view('backend.country.create',[
            'regions' => $regions_arr,
            'degrees' => $degrees_arr,
            'places'  => $places_arr,
            'currencies' => $currencies_arr,
            'cities' => $cities_arr,
            'emergency_numbers' => $emergency_numbers_arr,
            'holidays' => $holidays_arr,
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
            'places' => $request->input('places_id'),
            'currencies' => $request->input('currencies_id'),
            'cities' => $request->input('cities_id'),
            'emergency_numbers' => $request->input('emergency_numbers_id'),
            'holidays' => $request->input('holidays_id'),
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
        $item->deleteTrans();
        $item->deleteAirports();
        $item->deleteCurrencies();
        $item->deleteCapitals();
        $item->deleteEmergencyNumbers();
        $item->deleteHolidays(); 
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

            /* If Translation For Current Language Is Empty, Put Null in All The Fields */
            if(!empty($model[0])){

                $data['title_'.$language->id]           = $model[0]->title;
                $data['description_'.$language->id]     = $model[0]->description;
                $data['nationality_'.$language->id]     = $model[0]->nationality;
                $data['population_'.$language->id]      = $model[0]->population;
                $data['best_place_'.$language->id]      = $model[0]->best_place;
                $data['best_time_'.$language->id]       = $model[0]->best_time;
                $data['cost_of_living_'.$language->id]  = $model[0]->cost_of_living;
                $data['geo_stats_'.$language->id]       = $model[0]->geo_stats;
                $data['demographics_'.$language->id]    = $model[0]->demographics;
                $data['economy_'.$language->id]         = $model[0]->economy;
                $data['suitable_for_'.$language->id]    = $model[0]->suitable_for;
            }else{
                $data['title_'.$language->id]           = null;
                $data['description_'.$language->id]     = null;
                $data['nationality_'.$language->id]     = null;
                $data['population_'.$language->id]      = null;
                $data['best_place_'.$language->id]      = null;
                $data['best_time_'.$language->id]       = null;
                $data['cost_of_living_'.$language->id]  = null;
                $data['geo_stats_'.$language->id]       = null;
                $data['demographics_'.$language->id]    = null;
                $data['economy_'.$language->id]         = null;
                $data['suitable_for_'.$language->id]    = null;
            }
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

        $selected_places = $country->airports;
        $selected_places_arr = [];

        if(!empty($selected_places)){
            foreach ($selected_places as $key => $value) {
                $place = $value->place;

                if(!empty($place)){
                    array_push($selected_places_arr,$place->id);
                }
            }
        }

        $data['selected_places'] = $selected_places_arr;

        /* Get Active Places */
        $places = Place::where(['active' => 1])->get();
        $places_arr = [];
        
        foreach ($places as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){  
                $places_arr[$value->id] = $value->transsingle->title;
            }
        }

        $selected_currencies = $country->currencies;
        $selected_currencies_arr = [];

        if(!empty($selected_currencies)){
            foreach ($selected_currencies as $key => $value) {
                $currency = $value->currency;

                if(!empty($currency)){
                    array_push($selected_currencies_arr,$currency->id);
                }
            }
        }

        $data['selected_currencies'] = $selected_currencies_arr;

        /* Get All Currencies */
        $currencies = Currencies::where(['active' => 1])->get();
        $currencies_arr = [];
        
        foreach ($currencies as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $currencies_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get Selected Cities */
        $selected_capitals = $country->capitals;
        $selected_capitals_arr = [];

        if(!empty($selected_capitals)){
            foreach ($selected_capitals as $key => $value) {
                $capital = $value->city;

                if(!empty($capital)){
                    array_push($selected_capitals_arr,$capital->id);
                }
            }
        }

        $data['selected_cities'] = $selected_capitals_arr;

        /* Get All Cities */
        $cities = Cities::where(['active' => 1])->get();
        $cities_arr = [];
        
        foreach ($cities as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $cities_arr[$value->id] = $value->transsingle->title;
            }
        }


        /* Get Selected Numbers */
        $selected_numbers = $country->emergency_numbers;
        $selected_numbers_arr = [];

        if(!empty($selected_numbers)){
            foreach ($selected_numbers as $key => $value) {
                $numbers = $value->emergency_number;

                if(!empty($numbers)){
                    array_push($selected_numbers_arr,$numbers->id);
                }
            }
        }

        $data['selected_numbers'] = $selected_numbers_arr;

        /* Get All EmergencyNumbers */
        $emergency_numbers = EmergencyNumbers::get();
        $emergency_numbers_arr = [];
        
        foreach ($emergency_numbers as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $emergency_numbers_arr[$value->id] = $value->transsingle->title;
            }
        }

        $selected_holidays = $country->holidays;
        $selected_holidays_arr = [];

        if(!empty($selected_holidays)){
            foreach ($selected_holidays as $key => $value) {
                $holiday = $value->holiday;

                if(!empty($holiday)){
                    array_push($selected_holidays_arr,$holiday->id);
                }
            }
        }

        $data['selected_holidays'] = $selected_holidays_arr;
        
        /* Get All Holidays */
        $holidays = Holidays::get();
        $holidays_arr = [];
        
        foreach ($holidays as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $holidays_arr[$value->id] = $value->transsingle->title;
            }
        }



        return view('backend.country.edit')
            ->withLanguages($this->languages)
            ->withCountry($country)
            ->withCountryid($id)
            ->withData($data)
            ->withRegions($regions_arr)
            ->withDegrees($degrees_arr)
            ->withPlaces($places_arr)
            ->withCurrencies($currencies_arr)
            ->withCities($cities_arr)
            ->withEmergency_numbers($emergency_numbers_arr)
            ->withHolidays($holidays_arr);
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
            'places' => $request->input('places_id'),
            'currencies' => $request->input('currencies_id'),
            'cities' => $request->input('cities_id'),
            'holidays' => $request->input('holidays_id'),
            'emergency_numbers' => $request->input('emergency_numbers_id'),
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
       
        $airports = $country->airports;
        $airports_arr = [];

        if(!empty($airports)){
            foreach ($airports as $key => $value) {
                $place = $value->place;

                if(!empty($place)){
                    $place = $place->transsingle;

                    if(!empty($place)){
                        array_push($airports_arr,$place->title);
                    }
                }
            }
        }

        $currencies = $country->currencies;
        $currencies_arr = [];

        if(!empty($currencies)){
            foreach ($currencies as $key => $value) {
                $currency = $value->currency;

                if(!empty($currency)){
                    $currency = $currency->transsingle;

                    if(!empty($currency)){
                        array_push($currencies_arr,$currency->title);
                    }
                }
            }
        }

        $capitals = $country->capitals;
        $capitals_arr = [];

        if(!empty($capitals)){
            foreach ($capitals as $key => $value) {
                $capital = $value->city;

                if(!empty($capital)){
                    $capital = $capital->transsingle;

                    if(!empty($capital)){
                        array_push($capitals_arr,$capital->title);
                    }
                }
            }
        }

        $emergency_numbers = $country->emergency_numbers;
        $emergency_numbers_arr = [];

        if(!empty($emergency_numbers)){
            foreach ($emergency_numbers as $key => $value) {
                $emergency_number = $value->emergency_number;

                if(!empty($emergency_number)){
                    $emergency_number = $emergency_number->transsingle;

                    if(!empty($emergency_number)){
                        array_push($emergency_numbers_arr,$emergency_number->title);
                    }
                }
            }
        }

        $holidays = $country->holidays;
        $holidays_arr = [];

        if(!empty($holidays)){
            foreach ($holidays as $key => $value) {
                $holiday = $value->holiday;

                if(!empty($holiday)){
                    $holiday = $holiday->transsingle;

                    if(!empty($holiday)){
                        array_push($holidays_arr,$holiday->title);
                    }
                }
            }
        }


        return view('backend.country.show')
            ->withCountry($country)
            ->withCountrytrans($countryTrans)
            ->withRegion($region)
            ->withDegree($safety_degree)
            ->withAirports($airports_arr)
            ->withCurrencies($currencies_arr)
            ->withCapitals($capitals_arr)
            ->withEmergency_numbers($emergency_numbers_arr)
            ->withHolidays($holidays_arr);
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