<?php

namespace App\Http\Controllers\Backend\Country;

use App\Models\Country\Countries;
use App\Models\Country\CountriesTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\Language\Languages;
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
use App\Models\LanguagesSpoken\LanguagesSpoken;
use App\Models\Lifestyle\Lifestyle;
use App\Models\ActivityMedia\Media;
use App\Models\Religion\Religion;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminLogs\AdminLogs;

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

        /* Get All LanguagesSpoken */
        $languages_spoken = LanguagesSpoken::where(['active' => 1])->get();
        $languages_spoken_arr = [];

        foreach ($languages_spoken as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $languages_spoken_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All Lifestyles */
        $lifestyles = Lifestyle::get();
        $lifestyles_arr = [];

        foreach ($lifestyles as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $lifestyles_arr[$value->id] = $value->transsingle->title;
            }
        }



        /* Get All Religions */
        $religions = Religion::where([ 'active' => 1 ])->get();
        $religions_arr = [];

        foreach ($religions as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $religions_arr[$value->id] = $value->transsingle->title;
            }
        }

        return view('backend.country.create',[
            'regions' => $regions_arr,
            'degrees' => $degrees_arr,
            //'places'  => $places_arr,
            'currencies' => $currencies_arr,
            'cities' => $cities_arr,
            'emergency_numbers' => $emergency_numbers_arr,
            'holidays' => $holidays_arr,
            'languages_spoken' => $languages_spoken_arr,
            'lifestyles' => $lifestyles_arr,
            //'medias' => $medias_arr,
            'religions' => $religions_arr
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
            // $data[$language->id]['best_time_'.$language->id] = $request->input('best_time_'.$language->id);
            // $data[$language->id]['best_place_'.$language->id] = $request->input('best_place_'.$language->id);
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

        $files = null;
        if($request->hasFile('pictures')){
            $files = $request->file('pictures');
        }

        $cover = null;
        if($request->hasFile('cover_image')){
            $cover = $request->file('cover_image');
        }
        
        /* Send All Relations and Common Fields Through $extra array */
        $extra = [
            'active' => $active,
            'region_id' =>  $request->input('region_id'),
            'code' => $request->input('code'),
            'lat' => isset($location[0]) && $location[0]>0 ? $location[0] : 0,
            'lng' => isset($location[1]) && $location[1]>0 ? $location[1] : 0,
            //'places' => $request->input('places_id'),
            'currencies' => $request->input('currencies_id'),
            'cities' => $request->input('cities_id'),
            'emergency_numbers' => $request->input('emergency_numbers_id'),
            'holidays' => $request->input('holidays_id'),
            'languages_spoken' => $request->input('languages_spoken_id'),
            'lifestyles' => $request->input('lifestyles_id'),
            //'medias' => $request->input('medias_id'),
            'religions' => $request->input('religions_id'),
            // 'safety_degree_id' => $request->input('safety_degree_id'),
            'files' => $files,
            'cover_image' => $cover
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
        // $item->deleteAirports();
        // $item->deleteCurrencies();
        // $item->deleteCapitals();
        // $item->deleteEmergencyNumbers();
        // $item->deleteHolidays();
        // $item->deleteLanguagesSpoken();
        // $item->deleteLifestyles();
        // $item->deleteReligions();
        // $item->deleteMedias();
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

        /* Get All Selected Currencies */
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

        /* Get All Currencies For Dropdown */
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

        /* Get All Cities For Dropdown*/
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

        /* Get All EmergencyNumbers For Dropdown */
        $emergency_numbers = EmergencyNumbers::get();
        $emergency_numbers_arr = [];

        foreach ($emergency_numbers as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $emergency_numbers_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All Selected Holidays */
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

        /* Get All Holidays For Dropdown*/
        $holidays = Holidays::get();
        $holidays_arr = [];

        foreach ($holidays as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $holidays_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get Selected Languages Spoken */
        $selected_languages_spoken = $country->languages_spoken;
        $selected_languages_spoken_arr = [];

        if(!empty($selected_languages_spoken)){
            foreach ($selected_languages_spoken as $key => $value) {
                $language_spoken = $value->language_spoken;

                if(!empty($language_spoken)){
                    array_push($selected_languages_spoken_arr,$language_spoken->id);
                }
            }
        }

        $data['selected_languages_spoken'] = $selected_languages_spoken_arr;

        /* Get All LanguagesSpoken For Dropdown */
        $languages_spoken = LanguagesSpoken::where(['active' => 1])->get();
        $languages_spoken_arr = [];

        foreach ($languages_spoken as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $languages_spoken_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get Selected Lifestyles */
        $selected_lifestyles = $country->lifestyles;
        $selected_lifestyles_arr = [];

        if(!empty($selected_lifestyles)){
            foreach ($selected_lifestyles as $key => $value) {
                $lifestyle = $value->lifestyle;

                if(!empty($lifestyle)){
                    array_push($selected_lifestyles_arr,$lifestyle->id);
                }
            }
        }

        $data['selected_lifestyles'] = $selected_lifestyles_arr;

        /* Get All Lifestyles For Dropdown*/
        $lifestyles = Lifestyle::get();
        $lifestyles_arr = [];

        foreach ($lifestyles as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $lifestyles_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get Selected Medias */
        $selected_medias = $country->medias;
        $selected_images = [];
        $selected_medias_arr = [];

        if(!empty($selected_medias)){
            foreach ($selected_medias as $key => $value) {
                $media = $value->media;

                if(!empty($media)){
                    if($media->type != Media::TYPE_IMAGE){
                        array_push($selected_medias_arr,$media->id);
                    }else{
                        $media->url = str_replace('storage.travooo.com', 'https://localhost/travoo-api/storage/uploads',$media->url);
                        array_push($selected_images,[
                            'id'    => $media->id,
                            'url'   => $media->url
                        ]);
                    }
                }
            }
        }

        $data['selected_medias'] = $selected_medias_arr;

        /* Get Selected Religions */
        $selected_religions = $country->religions;
        $selected_religions_arr = [];

        if(!empty($selected_religions)){
            foreach ($selected_religions as $key => $value) {
                $religion = $value->religion;

                if(!empty($religion)){
                    array_push($selected_religions_arr,$religion->id);
                }
            }
        }

        $data['selected_religions'] = $selected_religions_arr;

        /* Get All Religions For Dropdown*/
        $religions = Religion::where([ 'active' => 1 ])->get();
        $religions_arr = [];

        foreach ($religions as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $religions_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get Cover Image Of Country */
        $cover = null;
        if(!empty($country->cover)){
            $cover = $country->cover;
            $cover->url = str_replace('storage.travooo.com', 'https://localhost/travoo-api/storage/uploads', $cover->url);
        }

        return view('backend.country.edit')
            ->withLanguages($this->languages)
            ->withCountry($country)
            ->withCountryid($id)
            ->withData($data)
            ->withRegions($regions_arr)
            ->withDegrees($degrees_arr)
            //->withPlaces($places_arr)
            ->withCurrencies($currencies_arr)
            ->withCities($cities_arr)
            ->withEmergency_numbers($emergency_numbers_arr)
            ->withHolidays($holidays_arr)
            ->withLanguages_spoken($languages_spoken_arr)
            ->withLifestyles($lifestyles_arr)
            //->withMedias($medias_arr)
            ->withImages($selected_images)
            ->withReligions($religions_arr)
            ->withCover($cover);
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

        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
            $data[$language->id]['nationality_'.$language->id] = $request->input('nationality_'.$language->id);
            $data[$language->id]['population_'.$language->id] = $request->input('population_'.$language->id);
            // $data[$language->id]['best_time_'.$language->id] = $request->input('best_time_'.$language->id);
            // $data[$language->id]['best_place_'.$language->id] = $request->input('best_place_'.$language->id);
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

        $files = null;
        if($request->hasFile('pictures')){
            $files = $request->file('pictures');
        }

        $cover_image = null;
        if($request->hasFile('cover_image')){
            $cover_image = $request->file('cover_image');
        }         

        $extra = [
            'active'            => $active,
            'region_id'         => $request->input('region_id'),
            'code'              => $request->input('code'),
            'lat'               => $location[0],
            'lng'               => $location[1],
            'places'            => $request->input('places_id'),
            'currencies'        => $request->input('currencies_id'),
            'cities'            => $request->input('cities_id'),
            'holidays'          => $request->input('holidays_id'),
            'emergency_numbers' => $request->input('emergency_numbers_id'),
            'languages_spoken'  => $request->input('languages_spoken_id'),
            'lifestyles'        => $request->input('lifestyles_id'),
            'medias'            => $request->input('medias_id'),
            'religions'         => $request->input('religions_id'),
            // 'safety_degree_id'  => $request->input('safety_degree_id'),
            'files'             => $files,
            'cover_image'       => $cover_image,
            'media_cover_image' => $request->input('media-cover-image'),
            'remove-cover-image'=> $request->input('remove-cover-image'),
            'delete-images'     => $request->input('delete-images'),
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

       /* Get All Selected Places For Airports */
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

        /* Get All Selected Currencies */
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

        /* Get All Selected Cities As Capitals */
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

        /* Get All Emergency Numbers */
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

        /* Get All Selected Holidays */
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

        /* Get Selected LanguageSpoken */
        $languages_spoken = $country->languages_spoken;
        $languages_spoken_arr = [];

        if(!empty($languages_spoken)){
            foreach ($languages_spoken as $key => $value) {
                $language_spoken = $value->language_spoken;

                if(!empty($language_spoken)){
                    $language_spoken = $language_spoken->transsingle;

                    if(!empty($language_spoken)){
                        array_push($languages_spoken_arr,$language_spoken->title);
                    }
                }
            }
        }

        /* Get Selected CountriesLifestyles */
        $lifestyles = $country->lifestyles;
        $lifestyles_arr = [];

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

        /* Get Selected Medias */
        $medias = $country->medias;
        $image_urls = [];
        $medias_arr = [];

        if(!empty($medias)){
            foreach ($medias as $key => $value) {
                $media = $value->media;

                if(!empty($media)){
                    if($media->type != Media::TYPE_IMAGE){
                        $media = $media->transsingle;

                        if(!empty($media)){
                            array_push($medias_arr,$media->title);
                        }
                    }else{
                        array_push($image_urls,$media->url);
                    }
                }
            }
        }

        /* Get Selected Religions */
        $religions = $country->religions;
        $religions_arr = [];

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

        /* Get Cover Image Of Country */
        $cover = null;
        if(!empty($country->cover)){
            $cover      = $country->cover;
            // $cover->url = str_replace('storage.travooo.com', 'https://localhost/travoo-api/storage/uploads', $cover->url);
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
            ->withHolidays($holidays_arr)
            ->withLanguages_spoken($languages_spoken_arr)
            ->withLifestyles($lifestyles_arr)
            ->withMedias($medias_arr)
            ->withImages($image_urls)
            ->withReligions($religions_arr)
            ->withCover($cover);
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

    public function jsoncities(ManageCountryRequest $request)
    {
        $country_id = $request->get('countryID');

        $cities_list = Cities::leftJoin('cities_trans', 'cities.id', '=', 'cities_trans.cities_id')
                ->where('cities.countries_id', $country_id)
                ->where('cities_trans.languages_id', 1)
                ->select('cities.id', 'cities_trans.title')
                ->orderBy('cities_trans.title', 'ASC')
                ->get()
                ->toArray();

        return json_encode($cities_list);
    }

    public function delete_ajax(ManageCountryRequest $request){

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
     * @param User $id
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function delete_single_ajax($id) {
        $item = Countries::find($id);

        if(empty($item)){
            return false;
        }

        $item->deleteTrans();
        // $item->deleteAirports();
        // $item->deleteCurrencies();
        // $item->deleteCapitals();
        // $item->deleteEmergencyNumbers();
        // $item->deleteHolidays();
        // $item->deleteLanguagesSpoken();
        // $item->deleteLifestyles();
        // $item->deleteReligions();
        // $item->deleteMedias();
        $item->delete();

        AdminLogs::create(['item_type' => 'countries', 'item_id' => $id, 'action' => 'delete', 'time' => time(), 'admin_id' => Auth::user()->id]);
    }
}