<?php

namespace App\Http\Controllers\Backend\City;

use App\Models\City\Cities;
use App\Models\Place\Place;
use App\Models\Country\Countries;
use App\Models\Holidays\Holidays;
use App\Models\Religion\Religion;
use App\Models\City\CitiesAirports;
use App\Models\Lifestyle\Lifestyle;
use App\Models\ActivityMedia\Media;
use App\Http\Controllers\Controller;
use App\Models\Currencies\Currencies;
use App\Models\City\CitiesTranslations;
use App\Models\Access\Language\Languages;
use App\Models\SafetyDegree\SafetyDegree;
use App\Models\LanguagesSpoken\LanguagesSpoken;
use App\Repositories\Backend\City\CityRepository;
use App\Models\EmergencyNumbers\EmergencyNumbers;
use App\Http\Requests\Backend\City\StoreCityRequest;
use App\Http\Requests\Backend\City\ManageCityRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminLogs\AdminLogs;

class CityController extends Controller
{
    /* CityRepository $cities */
    protected $cities;
    protected $languages;

    public function __construct(CityRepository $cities)
    {
        $this->cities = $cities;
        /* Get All Active Language */
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageCityRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageCityRequest $request)
    {
        return view('backend.city.index');
    }

    /**
     * @param ManageCityRequest $request
     *
     * @return mixed
     */
    public function create(ManageCityRequest $request)
    {
        /* Get All Regions */
        $countries = Countries::where(['active' => Countries::ACTIVE])->get();
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

        /* Get All Active Currencies */
        $currencies = Currencies::where([ 'active' => Currencies::ACTIVE ])->get();
        $currencies_arr = [];

        foreach ($currencies as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $currencies_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All Emergency Numbers */
        $emergency_numbers = EmergencyNumbers::get();
        $emergency_numbers_arr = [];

        foreach ($emergency_numbers as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $emergency_numbers_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Find All Holidays In The System */
        $holidays = Holidays::get();
        $holidays_arr = [];

        foreach ($holidays as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $holidays_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Find All LanguagesSpoken In The System */
        $languages_spoken = LanguagesSpoken::get();
        $languages_spoken_arr = [];

        foreach ($languages_spoken as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $languages_spoken_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Find All Lifestyles In The System */
        $lifestyles = Lifestyle::get();
        $lifestyles_arr = [];

        foreach ($lifestyles as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $lifestyles_arr[$value->id] = $value->transsingle->title;
            }
        }


        /* Find All Active Religions In The System */
        $religion = Religion::where([ 'active' => Religion::ACTIVE])->get();
        $religion_arr = [];

        foreach ($religion as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $religion_arr[$value->id] = $value->transsingle->title;
            }
        }

        return view('backend.city.create',[
            'countries' => $countries_arr,
            'degrees'   => $degrees_arr,
            //'places'    => $places_arr,
            'currencies'=> $currencies_arr,
            'languages_spoken' => $languages_spoken,
            'emergency_numbers' => $emergency_numbers_arr,
            'languages_spoken'  => $languages_spoken_arr,
            'holidays'  => $holidays_arr,
            'lifestyles' => $lifestyles_arr,
            //'medias' => $medias_arr,
            'religions' => $religion_arr,
        ]);
    }

    /**
     * @param StoreCityRequest $request
     *
     * @return mixed
     */
    public function store(StoreCityRequest $request)
    {
        $data = [];

        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id) ? $request->input('description_'.$language->id) : '';
            $data[$language->id]['best_time_'.$language->id] = $request->input('best_time_'.$language->id) ? $request->input('best_time_'.$language->id) : '';
            $data[$language->id]['best_place_'.$language->id] = $request->input('best_place_'.$language->id) ? $request->input('best_place_'.$language->id) : '';
            $data[$language->id]['cost_of_living_'.$language->id] = $request->input('cost_of_living_'.$language->id) ? $request->input('cost_of_living_'.$language->id) : '';
            $data[$language->id]['geo_stats_'.$language->id] = $request->input('geo_stats_'.$language->id) ? $request->input('geo_stats_'.$language->id) : '';
            $data[$language->id]['demographics_'.$language->id] = $request->input('demographics_'.$language->id) ? $request->input('demographics_'.$language->id) : '';
            $data[$language->id]['suitable_for_'.$language->id] = $request->input('suitable_for_'.$language->id) ? $request->input('suitable_for_'.$language->id) : '';
            $data[$language->id]['economy_'.$language->id] = $request->input('economy_'.$language->id) ? $request->input('economy_'.$language->id) : '';
        }

        $location = explode(',',$request->input('lat_lng') );

        /* Check if active field is enabled or disabled */
        $active = null;
        if(empty($request->input('active')) || $request->input('active') == 0){
            $active = Cities::DEACTIVE;
        }else{
            $active = Cities::ACTIVE;
        }

        /* Check if capital field is enabled or disabled */
        $is_capital = null;
        if(empty($request->input('is_capital')) || $request->input('is_capital') == 0){
            $is_capital = Cities::IS_NOT_CAPITAL;
        }else{
            $is_capital = Cities::IS_CAPITAL;
        }

        $files = null;
        if($request->hasFile('pictures')){
            $files = $request->file('pictures');
        }

        /* Pass All Relation and Common Fields Through $extra Array */
        $extra = [
            'active' => $active,
            'is_capital' => $is_capital,
            'countries_id' =>  $request->input('countries_id'),
            'code' => $request->input('code') ? $request->input('code') : 0,
            'lat' => $location[0] ? $location[0] : 0,
            'lng' => isset($location[1]) ? $location[1] : 0,
            //'places' => $request->input('places_id') ? $request->input('places_id') : '',
            'currencies' => $request->input('currencies_id') ? $request->input('currencies_id') : '',
            'emergency_numbers' => $request->input('emergency_numbers_id') ? $request->input('emergency_numbers_id') : '',
            'holidays'  => $request->input('holidays_id') ? $request->input('holidays_id') : '',
            'languages_spoken' => $request->input('languages_spoken_id') ? $request->input('languages_spoken_id') : '',
            'lifestyles'  => $request->input('lifestyles_id') ? $request->input('lifestyles_id') : '',
            //'medias'  => $request->input('medias_id') ? $request->input('medias_id') : '',
            'religions'  => $request->input('religions_id') ? $request->input('religions_id') : '',
            'safety_degree_id' => $request->input('safety_degree_id') ? $request->input('safety_degree_id') : '',
            'level_of_living_id' => $request->input('level_of_living_id') ? $request->input('level_of_living_id') : 0,
            'files' => $files,
        ];

        $this->cities->create($data, $extra);

        return redirect()->route('admin.location.city.index')->withFlashSuccess('City Created!');
    }

    /**
     * @param Cities $id
     * @param ManageCityRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageCityRequest $request)
    {
        /* $data array to pass data to view */
        $data = [];

        $cities = Cities::findOrFail(['id' => $id]);
        $cities = $cities[0];

        foreach ($this->languages as $key => $language) {
            /* Find The Translation Model For Current Language For This City */
            $model = CitiesTranslations::where([
                'languages_id' => $language->id,
                'cities_id'   => $id
            ])->get();
            /* If Model For Current Language Is Not Found For This City, Skip Its Data */
            if(!empty($model[0])) {
                /* Put All The Translation Data In $data Array To Be Used In Edit Form */
                $data['title_'.$language->id]           = $model[0]->title;
                $data['description_'.$language->id]     = $model[0]->description;
                $data['best_place_'.$language->id]      = $model[0]->best_place;
                $data['best_time_'.$language->id]       = $model[0]->best_time;
                $data['cost_of_living_'.$language->id]  = $model[0]->cost_of_living;
                $data['geo_stats_'.$language->id]       = $model[0]->geo_stats;
                $data['demographics_'.$language->id]    = $model[0]->demographics;
                $data['economy_'.$language->id]         = $model[0]->economy;
                $data['suitable_for_'.$language->id]    = $model[0]->suitable_for;
            }else{
                /* Put Null In  $data Array If Translation Not Found To Be Used In Edit Form */
                $data['title_'.$language->id]           = null;
                $data['description_'.$language->id]     = null;
                $data['best_place_'.$language->id]      = null;
                $data['best_time_'.$language->id]       = null;
                $data['cost_of_living_'.$language->id]  = null;
                $data['geo_stats_'.$language->id]       = null;
                $data['demographics_'.$language->id]    = null;
                $data['economy_'.$language->id]         = null;
                $data['suitable_for_'.$language->id]    = null;
            }
        }

        /* Put All Common Fields In $data Array To Be Used In Edit Form */
        $data['lat_lng'] = $cities['lat'] . ',' . $cities['lng'];
        $data['code'] = $cities['code'];
        $data['active'] = $cities['active'];
        $data['is_capital'] = $cities['is_capital'];
        $data['countries_id'] = $cities['countries_id'];
        $data['safety_degree_id'] = $cities['safety_degree_id'];

        /* Find All Active Countries */
        $countries = Countries::where(['active' => Countries::ACTIVE ])->get();
        $countries_arr = [];
        /* Get Title Id Pair For Each Model */
        foreach ($countries as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $countries_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All safety Degrees */
        $degrees = SafetyDegree::get();
        $degrees_arr = [];
        /* Get Title Id Pair For Each Model */
        foreach ($degrees as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $degrees_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get Selected Currencies */
        $selected_currencies = $cities->currencies;
        $selected_currencies_arr = [];
        /* Get Selected Id Pair From Each Model */
        foreach ($selected_currencies as $key => $value) {
            if(isset($value->currency->transsingle) && !empty($value->currency->transsingle)){
                // $selected_airports_arr[$value->place->id] = $value->place->transsingle->title;
                array_push($selected_currencies_arr,$value->currency->id);
            }
        }

        $data['selected_currencies'] = $selected_currencies_arr;

        /* Get All Currencies */
        $currencies = Currencies::where([ 'active' => Currencies::ACTIVE ])->get();
        $currencies_arr = [];
        /* Get Title Id Pair For Each Model */
        foreach ($currencies as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $currencies_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get Selected Emergency Numbers */
        $selected_numbers = $cities->emergency_numbers;
        $selected_numbers_arr = [];
        /* Get Selected Id Pair From Each Model */
        foreach ($selected_numbers as $key => $value) {
            if(isset($value->emergency_number->transsingle) && !empty($value->emergency_number->transsingle)){
                // $selected_airports_arr[$value->place->id] = $value->place->transsingle->title;
                array_push($selected_numbers_arr,$value->emergency_number->id);
            }
        }

        $data['emergency_numbers'] = $selected_numbers_arr;

         /* Get All Emergency Numbers */
        $emergency_numbers = EmergencyNumbers::get();
        $emergency_numbers_arr = [];
        /* Get Title Id Pair For Each Model */
        foreach ($emergency_numbers as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $emergency_numbers_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get Selected holidays */
        $selected_holidays = $cities->holidays;
        $selected_holidays_arr = [];
        /* Get Selected Id Pair From Each Model */
        foreach ($selected_holidays as $key => $value) {
            if(isset($value->holiday->transsingle) && !empty($value->holiday->transsingle)){
                // $selected_airports_arr[$value->place->id] = $value->place->transsingle->title;
                array_push($selected_holidays_arr,$value->holiday->id);
            }
        }

        $data['selected_holidays'] = $selected_holidays_arr;

        /* Find All Holidays In The System */
        $holidays = Holidays::get();
        $holidays_arr = [];
        /* Get Title Id Pair For Each Model */
        foreach ($holidays as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $holidays_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get Selected Languages Spoken */
        $selected_languages_spoken = $cities->languages_spoken;
        $selected_languages_spoken_arr = [];
        /* Get Selected Id Pair From Each Model */
        foreach ($selected_languages_spoken as $key => $value) {
            // if(isset($value->languages_spoken->transsingle) && !empty($value->languages_spoken->transsingle)){
                // $selected_airports_arr[$value->place->id] = $value->place->transsingle->title;
                array_push($selected_languages_spoken_arr,$value->languages_spoken->id);
            // }
        }

        $data['selected_languages_spoken'] = $selected_languages_spoken_arr;


        /* Find All LanguagesSpoken In The System */
        $languages_spoken = LanguagesSpoken::get();
        $languages_spoken_arr = [];
        /* Get Title Id Pair For Each Model */
        foreach ($languages_spoken as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $languages_spoken_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get Selected Lifestyles */
        $selected_lifestyles = $cities->lifestyles;
        $selected_lifestyles_arr = [];
        /* Get Selected Id Pair From Each Model */
        foreach ($selected_lifestyles as $key => $value) {
            // if(isset($value->languages_spoken->transsingle) && !empty($value->languages_spoken->transsingle)){
                // $selected_airports_arr[$value->place->id] = $value->place->transsingle->title;
                array_push($selected_lifestyles_arr,$value->lifestyle->id);
            // }
        }

        $data['selected_lifestyles'] = $selected_lifestyles_arr;

        /* Find All CitiesLifestyles In The System */
        $lifestyles = Lifestyle::get();
        $lifestyles_arr = [];
        /* Get Title Id Pair For Each Model */
        foreach ($lifestyles as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $lifestyles_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get Selected Medias */
        $selected_medias = $cities->medias;
        $selected_medias_arr = [];
        $selected_images = [];

        /* Get Selected Id Pair From Each Model */
        foreach ($selected_medias as $key => $value) {
            // if(isset($value->languages_spoken->transsingle) && !empty($value->languages_spoken->transsingle)){
                // $selected_airports_arr[$value->place->id] = $value->place->transsingle->title;
            $media = $value->medias;
            if($media->type != Media::TYPE_IMAGE){
                array_push($selected_medias_arr,$value->medias->id);
            }else{
                array_push($selected_images,[
                    'id' => $media->id,
                    'url' => $media->url
                ]);
            }
            // }
        }

        $data['selected_medias'] = $selected_medias_arr;


        /* Get Selected Religions */
        $selected_religions = $cities->religions;
        $selected_religions_arr = [];
        /* Get Selected Id Pair From Each Model */
        foreach ($selected_religions as $key => $value) {
            // if(isset($value->languages_spoken->transsingle) && !empty($value->languages_spoken->transsingle)){
                // $selected_airports_arr[$value->place->id] = $value->place->transsingle->title;
                array_push($selected_religions_arr,$value->religion->id);
            // }
        }

        $data['selected_religions'] = $selected_religions_arr;

        /* Find All Religions In The System */
        $religion = Religion::where([ 'active' => Religion::ACTIVE ])->get();
        $religion_arr = [];
        /* Get Title Id Pair For Each Model */
        foreach ($religion as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $religion_arr[$value->id] = $value->transsingle->title;
            }
        }

        return view('backend.city.edit')
            ->withLanguages($this->languages)
            ->withCity($cities)
            ->withCityid($id)
            ->withData($data)
            ->withCountries($countries_arr)
            ->withDegrees($degrees_arr)
            //->withPlaces($places_arr)
            ->withCurrencies($currencies_arr)
            ->withLanguages_spoken($languages_spoken_arr)
            ->withHolidays($holidays_arr)
            ->withEmergency_numbers($emergency_numbers_arr)
            ->withLifestyles($lifestyles_arr)
            ->withReligions($religion_arr)
            //->withMedias($medias_arr)
            ->withImages($selected_images);
    }

    /**
     * @param Cities           $id
     * @param ManageCityRequest $request
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
            $active = Cities::DEACTIVE;
        }else{
            $active = Cities::ACTIVE;
        }

        /* Check if is_capital field is enabled or disabled */
        $is_capital = null;
        if(empty($request->input('is_capital')) || $request->input('is_capital') == 0){
            $is_capital = Cities::IS_NOT_CAPITAL;
        }else{
            $is_capital = Cities::IS_CAPITAL;
        }

        $files = null;
        if($request->hasFile('pictures')){
            $files = $request->file('pictures');
        }

        $extra = [
            'active' => $active,
            'is_capital' => $is_capital,
            'countries_id' =>  $request->input('countries_id'),
            'code' => $request->input('code'),
            'lat' => $location[0],
            'lng' => $location[1],
            'places' => $request->input('places_id'),
            'currencies' => $request->input('currencies_id'),
            'holidays'  => $request->input('holidays_id'),
            'lifestyles'  => $request->input('lifestyles_id'),
            'emergency_numbers' => $request->input('emergency_numbers_id'),
            'languages_spoken' => $request->input('languages_spoken_id'),
            'medias' => $request->input('medias_id'),
            'religions'  => $request->input('religions_id'),
            'safety_degree_id' => $request->input('safety_degree_id'),
            'files'             => $files,
            'delete-images'     => $request->input('delete-images'),
        ];


        $this->cities->update($id , $country, $data , $extra);

        return redirect()->route('admin.location.city.index')
            ->withFlashSuccess('City updated Successfully!');
    }

    /**
     * @param City        $id
     * @param ManageCityRequest $request
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

        /*Get Airport Locations*/
        $airports = $city->airports;
        $airports_arr = [];

        /* If Model Exist, Get Translated Title For Each Model */
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

        /*Get Currencies*/
        $currencies = $city->currencies;
        $currencies_arr = [];

        /* If Model Exist, Get Translated Title For Each Model */
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

        /*Get EmergencyNumbers*/
        $emergency_numbers = $city->emergency_numbers;
        $emergency_numbers_arr = [];

        /* If Model Exist, Get Translated Title For Each Model */
        if(!empty($emergency_numbers)){
            foreach ($emergency_numbers as $key => $value) {

                $number = $value->emergency_number;

                if(!empty($number)){

                    $number = $number->transsingle;
                    if(!empty($number)){
                        array_push($emergency_numbers_arr,$number->title);
                    }
                }
            }
        }

        /* Get Holidays */
        $holidays = $city->holidays;
        $holidays_arr = [];

        /* If Model Exist, Get Translated Title For Each Model */
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

        /* Get Languages Spoken */
        $languages_spoken = $city->languages_spoken;
        $languages_spoken_arr = [];

        /* If Model Exist, Get Translated Title For Each Model */
        if(!empty($languages_spoken)){
            foreach ($languages_spoken as $key => $value) {

                $language_spoken = $value->languages_spoken;

                if(!empty($language_spoken)){

                    $language_spoken = $language_spoken->transsingle;
                    if(!empty($language_spoken)){
                        array_push($languages_spoken_arr,$language_spoken->title);
                    }
                }
            }
        }

        /* Get Languages Spoken */
        $lifestyles = $city->lifestyles;
        $lifestyles_arr = [];

        /* If Model Exist, Get Translated Title For Each Model */
        if(!empty($lifestyles)){
            foreach ($lifestyles as $key => $value) {

                $lifestyle = $value->lifestyle;

                if(!empty($lifestyle)){

                    $lifestyle = $lifestyle->transsingle;
                    if(!empty($lifestyle)){
                        array_push($lifestyles_arr,$lifestyle->title);
                    }
                }
            }
        }

        /* Get All Added Medias */
        $medias = $city->medias;
        $medias_arr = [];
        $images_arr = [];

        /* If Model Exist, Get Translated Title For Each Model */
        if(!empty($medias)){
            foreach ($medias as $key => $value) {

                $media = $value->medias;

                if(!empty($media)){

                    if($media->type != Media::TYPE_IMAGE){
                        $media = $media->transsingle;

                        if(!empty($media)){
                            array_push($medias_arr,$media->title);
                        }
                    }else{
                        array_push($images_arr,$media->url);
                    }
                }
            }
        }

        /* Get All Added Religions */
        $religions = $city->religions;
        $religions_arr = [];

        /* If Model Exist, Get Translated Title For Each Model */
        if(!empty($religions)){
            foreach ($religions as $key => $value) {

                $religion = $value->religion;

                if(!empty($religion)){

                    $religion = $religion->transsingle;

                    if(!empty($religion)){
                        array_push($religions_arr,$religion->title);
                    }
                }
            }
        }

        return view('backend.city.show')
            ->withCity($city)
            ->withCitytrans($cityTrans)
            ->withCountry($country)
            ->withDegree($safety_degree)
            ->withAirports($airports_arr)
            ->withCurrencies($currencies_arr)
            ->withHolidays($holidays_arr)
            ->withLifestyles($lifestyles_arr)
            ->withLanguages_spoken($languages_spoken_arr)
            ->withMedias($medias_arr)
            ->withImages($images_arr)
            ->withEmergencynumbers($emergency_numbers_arr)
            ->withReligions($religions_arr);
    }

    /**
     * @param Cities $id
     * @param ManageCityRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageCityRequest $request)
    {
        $item = Cities::findOrFail($id);
        $item->deleteTrans();
        // $item->deleteAirports();
        // $item->deleteCurrencies();
        // $item->deleteEmergency_numbers();
        // $item->deleteHolidays();
        // $item->deleteLanguagesSpoken();
        // $item->deleteLifestyles();
        // $item->deleteMedias();
        // $item->deleteReligions();
        $item->delete();

        return redirect()->route('admin.location.city.index')->withFlashSuccess('City Deleted Successfully');
    }

    /**
     * @param Cities $city
     * @param $status
     * @param ManageCityRequest $request
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

    public function delete_ajax(ManageCityRequest $request){

        $ids = $request->input('ids');
        // if(isset($request->input('ids')) && !empty($request->input('ids'))){
        // }
        if(!empty($ids)){
            $ids = explode(',',$request->input('ids'));
            foreach ($ids as $key => $value) {
                $this->delete_single_ajax($value);
            }
        }

        echo json_encode([
            'result' => true
        ]);
    }

    /**
     * @param City $id
     * @param ManageCityRequest $request
     *
     * @return mixed
     */
    public function delete_single_ajax($id) {
        $item = Cities::find($id);

        if(empty($item)){
            return false;
        }

        $item->deleteTrans();
        // $item->deleteAirports();
        // $item->deleteCurrencies();
        // $item->deleteEmergency_numbers();
        // $item->deleteHolidays();
        // $item->deleteLanguagesSpoken();
        // $item->deleteLifestyles();
        // $item->deleteMedias();
        // $item->deleteReligions();

        $item->delete();

        AdminLogs::create(['item_type' => 'cities', 'item_id' => $id, 'action' => 'delete', 'time' => time(), 'admin_id' => Auth::user()->id]);
    }
}