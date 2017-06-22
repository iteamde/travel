<?php

namespace App\Http\Controllers\Backend\Hotels;

/* Hotels Models */
use App\Models\Hotels\Hotels;
use App\Models\Hotels\HotelsTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;

/* Store and Update Requests*/
use App\Http\Requests\Backend\Hotels\ManageHotelsRequest;
use App\Http\Requests\Backend\Hotels\StoreHotelsRequest;

/*Repositories*/
use App\Repositories\Backend\Hotels\HotelsRepository;

/* Dropdown Models*/
use App\Models\Regions\Regions;
use App\Models\SafetyDegree\SafetyDegree;
use App\Models\Country\Countries;
use App\Models\City\Cities;
use App\Models\Place\Place;
use App\Models\ActivityMedia\Media;

class HotelsController extends Controller
{
    protected $hotels;

    public function __construct(HotelsRepository $hotels)
    {
        $this->hotels = $hotels;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageHotelsRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageHotelsRequest $request)
    {
        return view('backend.hotels.index');
    }

    /**
     * @param ManageHotelsRequest $request
     *
     * @return mixed
     */
    public function create(ManageHotelsRequest $request)
    {   
        /* Get All Active Countries For Dropdown */
        $countries = Countries::where(['active' => 1])->get();
        $countries_arr = [];
        
        foreach ($countries as $key => $value) {
            /* If Translation Exists, Get Title */
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $countries_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All Active Cities For Dropdown */
        $cities = Cities::where(['active' => 1])->get();
        $cities_arr = [];
        
        foreach ($cities as $key => $value) {
            /* If Translation Exists, Get Title */
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $cities_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All Places For Dropdown */
        $places = Place::all();
        $places_arr = [];
        
        foreach ($places as $key => $value) {
            /* If Translation Exists, Get Title */
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $places_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All Medias */
        $medias = Media::all();
        $medias_arr = [];
        
        foreach ($medias as $key => $value) {
            /* If Translation Exists, Get Title */
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $medias_arr[$value->id] = $value->transsingle->title;
            }
        }

        return view('backend.hotels.create',[
            'countries' => $countries_arr,
            'cities' => $cities_arr,
            'places' => $places_arr,
            'medias' => $medias_arr
        ]);
    }

    /**
     * @param StoreHotelsRequest $request
     *
     * @return mixed
     */
    public function store(StoreHotelsRequest $request)
    {   
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            /* Get All Fields From Post Request */
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
            $data[$language->id]['address_'.$language->id] = $request->input('address_'.$language->id);
            $data[$language->id]['working_days_'.$language->id] = $request->input('working_days_'.$language->id);
            $data[$language->id]['working_times_'.$language->id] = $request->input('working_times_'.$language->id);
            $data[$language->id]['how_to_go_'.$language->id] = $request->input('how_to_go_'.$language->id);
            $data[$language->id]['when_to_go_'.$language->id] = $request->input('when_to_go_'.$language->id);
            $data[$language->id]['num_activities_'.$language->id] = $request->input('num_activities_'.$language->id);
            $data[$language->id]['popularity_'.$language->id] = $request->input('popularity_'.$language->id);
            $data[$language->id]['conditions_'.$language->id] = $request->input('conditions_'.$language->id);
        }

        /* Seperate Latitude and Longitude */
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
            'country_id' =>  $request->input('country_id'),
            'city_id' =>  $request->input('city_id'),
            'place_id' => $request->input('place_id'),
            'medias' => $request->input('medias_id'),
            'lat' => $location[0],
            'lng' => $location[1],
        ];

        $this->hotels->create($data, $extra);

        return redirect()->route('admin.hotels.hotels.index')->withFlashSuccess('Hotel Created!');
    }

    /**
     * @param Hotels $id
     * @param ManageHotelsRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageHotelsRequest $request)
    {
        $item = Hotels::findOrFail($id);
        /* Delete Children Tables Data of this Hotel */
        $child = HotelsTranslations::where(['hotels_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->deleteMedias();
        $item->delete();

        return redirect()->route('admin.hotels.hotels.index')->withFlashSuccess('Hotels Deleted Successfully');
    }

    /**
     * @param Hotels $id
     * @param ManageHotelsRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageHotelsRequest $request)
    {   
        $hotel = Hotels::findOrFail(['id' => $id]);
        $hotel = $hotel[0];
        
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $model = HotelsTranslations::where([
                'languages_id' => $language->id,
                'hotels_id'   => $id
            ])->get();

            if(!empty($model[0])){
                /* If Data Exists For Translation, Put In $data */
                $data['title_'.$language->id]           = $model[0]->title;
                $data['description_'.$language->id]     = $model[0]->description;
                $data['address_'.$language->id]         = $model[0]->address;
                $data['working_days_'.$language->id]    = $model[0]->working_days;
                $data['working_times_'.$language->id]   = $model[0]->working_times;
                $data['how_to_go_'.$language->id]       = $model[0]->how_to_go;
                $data['when_to_go_'.$language->id]      = $model[0]->when_to_go;
                $data['num_activities_'.$language->id]  = $model[0]->num_activities;
                $data['popularity_'.$language->id]      = $model[0]->popularity;
                $data['conditions_'.$language->id]      = $model[0]->conditions;
                
            }else{
                /* If Data Doesn't Exists For Translation, Put Null in $data */
                $data['title_'.$language->id]           = null;
                $data['description_'.$language->id]     = null;
                $data['address_'.$language->id]         = null;
                $data['working_days_'.$language->id]    = null;
                $data['working_times_'.$language->id]   = null;
                $data['how_to_go_'.$language->id]       = null;
                $data['when_to_go_'.$language->id]      = null;
                $data['num_activities_'.$language->id]  = null;
                $data['popularity_'.$language->id]      = null;
                $data['conditions_'.$language->id]      = null;
            
            }
        }

        $data['lat_lng'] = $hotel['lat'] . ',' . $hotel['lng'];
        $data['country_id'] = $hotel['countries_id'];
        $data['city_id'] = $hotel['cities_id']; 
        $data['place_id'] = $hotel['places_id'];    
        $data['active'] = $hotel['active'];
        
        /* Get Active Countries For Dropdown */
        $countries = Countries::where(['active' => 1])->get();
        $countries_arr = [];
        
        foreach ($countries as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $countries_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get Active Cities For Dropdown */
        $cities = Cities::where(['active' => 1])->get();
        $cities_arr = [];
        
        foreach ($cities as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $cities_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get Places For Dropdown */
        $places = Place::all();
        $places_arr = [];
        
        foreach ($places as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $places_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get Selected Medias */
        $selected_medias = $hotel->medias;
        $selected_medias_arr = [];

        if(!empty($selected_medias)){
            foreach ($selected_medias as $key => $value) {
                array_push($selected_medias_arr,$value->media->id);       
            }
        }

        $data['selected_medias'] = $selected_medias_arr;
        
        /* Get Medias For Dropdown */
        $medias = Media::all();
        $medias_arr = [];
        
        foreach ($medias as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $medias_arr[$value->id] = $value->transsingle->title;
            }
        }
 
        return view('backend.hotels.edit')
            ->withLanguages($this->languages)
            ->withHotel($hotel)
            ->withHotelid($id)
            ->withData($data)
            ->withCountries($countries_arr)
            ->withCities($cities_arr)
            ->withPlaces($places_arr)
            ->withMedias($medias_arr);
    }

    /**
     * @param Hotels            $id
     * @param ManageHotelsRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageHotelsRequest $request)
    {   
        $hotel = Hotels::findOrFail(['id' => $id]);
        
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
            $data[$language->id]['working_days_'.$language->id] = $request->input('working_days_'.$language->id);
            $data[$language->id]['working_times_'.$language->id] = $request->input('working_times_'.$language->id);
            $data[$language->id]['how_to_go_'.$language->id] = $request->input('how_to_go_'.$language->id);
            $data[$language->id]['when_to_go_'.$language->id] = $request->input('when_to_go_'.$language->id);
            $data[$language->id]['num_activities_'.$language->id] = $request->input('num_activities_'.$language->id);
            $data[$language->id]['popularity_'.$language->id] = $request->input('popularity_'.$language->id);
            $data[$language->id]['conditions_'.$language->id] = $request->input('conditions_'.$language->id);
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
            'country_id' =>  $request->input('country_id'),
            'city_id' =>  $request->input('city_id'),
            'place_id' => $request->input('place_id'),
            'lat' => $location[0],
            'lng' => $location[1],
            'medias' => $request->input('medias_id')
        ];
       
        $this->hotels->update($id , $hotel, $data , $extra);

        return redirect()->route('admin.hotels.hotels.index')
            ->withFlashSuccess('Hotels updated Successfully!');
    }

    /**
     * @param Hotel        $id
     * @param ManageHotelsRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageHotelsRequest $request)
    {   
        $hotel = Hotels::findOrFail(['id' => $id]);
        $hotelTrans = HotelsTranslations::where(['hotels_id' => $id])->get();
        $hotel = $hotel[0];
        
        /* Get Country Relation */
        $country = $hotel->country;
        $country = $country->transsingle;
        
        /* Get City Relation */
        $city = $hotel->city;
        $city = $city->transsingle;
        
        /* Get Place Relation */
        $place = $hotel->place;
        $place = $place->transsingle;

        $medias = $hotel->medias;
        $medias_arr = [];

        if(!empty($medias)){
            foreach ($medias as $key => $value) {
                if(!empty($value->media)){
                    $media = $value->media;
                    if(!empty($media->transsingle)){
                        array_push($medias_arr, $media->transsingle->title);
                    }
                }
            }
        }

        return view('backend.hotels.show')
            ->withHotel($hotel)
            ->withHoteltrans($hotelTrans)
            ->withCountry($country)
            ->withCity($city)
            ->withPlace($place)
            ->withMedias($medias_arr);
    }

    /** 
     * @param Hotels $id
     * @param $status
     * @param ManageHotelsRequest $request
     *
     * @return mixed
     */
    public function mark($id, $status, ManageHotelsRequest $request)
    {
        $hotel = Hotels::findOrFail(['id' => $id]);
        $hotel = $hotel[0];

        $hotel->active = $status;
        $hotel->save();
        
        return redirect()->route('admin.hotels.hotels.index')
            ->withFlashSuccess('Hotels Status Updated!');
    }
}