<?php

namespace App\Http\Controllers\Backend\Place;

use App\Models\Place\Place;
use App\Models\Place\PlaceTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;
use App\Http\Requests\Backend\Place\ManagePlaceRequest;
use App\Http\Requests\Backend\Place\StorePlaceRequest;
use App\Repositories\Backend\Place\PlaceRepository;
use App\Models\Regions\Regions;
use App\Models\SafetyDegree\SafetyDegree;
use App\Models\Country\Countries;
use App\Models\City\Cities;
use App\Models\PlaceTypes\PlaceTypes;

class PlaceController extends Controller
{
    protected $places;

    public function __construct(PlaceRepository $places)
    {
        $this->places = $places;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManagePlaceRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManagePlaceRequest $request)
    {
        return view('backend.place.index');
    }

    /**
     * @param ManagePlaceRequest $request
     *
     * @return mixed
     */
    public function create(ManagePlaceRequest $request)
    {   
        /* Get All Countries */
        $countries = Countries::where(['active' => 1])->get();
        $countries_arr = [];
        
        foreach ($countries as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $countries_arr[$value->id] = $value->transsingle->title;
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

         /* Get All Place Types */
        $places_types = PlaceTypes::all();
        $places_types_arr = [];
        
        foreach ($places_types as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $places_types_arr[$value->id] = $value->transsingle->title;
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
       
        return view('backend.place.create',[
            'countries' => $countries_arr,
            'cities' => $cities_arr,
            'place_types' => $places_types_arr,
            'degrees' => $degrees_arr,
        ]);
    }

    /**
     * @param StorePlaceRequest $request
     *
     * @return mixed
     */
    public function store(StorePlaceRequest $request)
    {   
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
            $data[$language->id]['address_'.$language->id] = $request->input('address_'.$language->id);
            $data[$language->id]['phone_'.$language->id] = $request->input('phone_'.$language->id);
            $data[$language->id]['highlights_'.$language->id] = $request->input('highlights_'.$language->id);
            $data[$language->id]['working_days_'.$language->id] = $request->input('working_days_'.$language->id);
            $data[$language->id]['working_times_'.$language->id] = $request->input('working_times_'.$language->id);
            $data[$language->id]['how_to_go_'.$language->id] = $request->input('how_to_go_'.$language->id);
            $data[$language->id]['when_to_go_'.$language->id] = $request->input('when_to_go_'.$language->id);
            $data[$language->id]['num_activities_'.$language->id] = $request->input('num_activities_'.$language->id);
            $data[$language->id]['popularity_'.$language->id] = $request->input('popularity_'.$language->id);
            $data[$language->id]['conditions_'.$language->id] = $request->input('conditions_'.$language->id);
            $data[$language->id]['price_level_'.$language->id] = $request->input('price_level_'.$language->id);
            $data[$language->id]['num_checkins_'.$language->id] = $request->input('num_checkins_'.$language->id);
            $data[$language->id]['history_'.$language->id] = $request->input('history_'.$language->id);  
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
            'countries_id' =>  $request->input('countries_id'),
            'cities_id' =>  $request->input('cities_id'),
            'place_types_ids' => $request->input('place_types_ids'),
            'lat' => $location[0],
            'lng' => $location[1],
            'safety_degrees_id' => $request->input('safety_degrees_id')
        ];



        $this->places->create($data, $extra);

        return redirect()->route('admin.location.place.index')->withFlashSuccess('Place Created!');
    }

    /**
     * @param Place $id
     * @param ManagePlaceRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManagePlaceRequest $request)
    {
        $item = Place::findOrFail($id);
        /* Delete Children Tables Data of this country */
        $child = PlaceTranslations::where(['places_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.location.place.index')->withFlashSuccess('Place Deleted Successfully');
    }

    /**
     * @param Countries $id
     * @param ManagePlaceRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManagePlaceRequest $request)
    {   
        
        $data = [];
        $place = Place::findOrFail(['id' => $id]);
        $place = $place[0];

        foreach ($this->languages as $key => $language) {
            $model = PlaceTranslations::where([
                'languages_id' => $language->id,
                'places_id'   => $id
            ])->get();

            $data['title_'.$language->id] = $model[0]->title;
            $data['description_'.$language->id] = $model[0]->description;
            $data['address_'.$language->id] = $model[0]->address;
            $data['phone_'.$language->id] = $model[0]->phone;
            $data['highlights_'.$language->id] = $model[0]->highlights;
            $data['working_days_'.$language->id] = $model[0]->working_days;
            $data['working_times_'.$language->id] = $model[0]->working_times;
            $data['how_to_go_'.$language->id] = $model[0]->how_to_go;
            $data['when_to_go_'.$language->id] = $model[0]->when_to_go;
            $data['num_activities_'.$language->id] = $model[0]->num_activities;
            $data['popularity_'.$language->id] = $model[0]->popularity;
            
            $data['conditions_'.$language->id] = $model[0]->conditions;
            $data['price_level_'.$language->id] = $model[0]->price_level;
            $data['num_checkins_'.$language->id] = $model[0]->num_checkins;
            $data['history_'.$language->id] = $model[0]->history;
        }

        $data['lat_lng'] = $place['lat'] . ',' . $place['lng'];
        $data['countries_id'] = $place['countries_id'];
        $data['cities_id'] = $place['cities_id']; 
        $data['place_types_ids'] = $place['place_type_ids'];    
        $data['active'] = $place['active'];
        $data['safety_degrees_id'] = $place['safety_degrees_id'];

        
        /* Get All Countries */
        $countries = Countries::where(['active' => 1])->get();
        $countries_arr = [];
        
        foreach ($countries as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $countries_arr[$value->id] = $value->transsingle->title;
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

         /* Get All Place Types */
        $places_types = PlaceTypes::all();
        $places_types_arr = [];
        
        foreach ($places_types as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $places_types_arr[$value->id] = $value->transsingle->title;
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

        return view('backend.place.edit')
            ->withLanguages($this->languages)
            ->withPlace($place)
            ->withPlaceid($id)
            ->withData($data)
            ->withCountries($countries_arr)
            ->withDegrees($degrees_arr)
            ->withCities($cities_arr)
            ->withPlace_types($places_types_arr);
    }

    /**
     * @param Countries            $id
     * @param ManagePlaceRequest $request
     *
     * @return mixed
     */
    public function update($id, ManagePlaceRequest $request)
    {   
        $place = Place::findOrFail(['id' => $id]);
        
        $data = [];

        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
            $data[$language->id]['address_'.$language->id] = $request->input('address_'.$language->id);
            $data[$language->id]['phone_'.$language->id] = $request->input('phone_'.$language->id);
            $data[$language->id]['highlights_'.$language->id] = $request->input('highlights_'.$language->id);
            $data[$language->id]['working_days_'.$language->id] = $request->input('working_days_'.$language->id);
            $data[$language->id]['working_times_'.$language->id] = $request->input('working_times_'.$language->id);
            $data[$language->id]['how_to_go_'.$language->id] = $request->input('how_to_go_'.$language->id);
            $data[$language->id]['when_to_go_'.$language->id] = $request->input('when_to_go_'.$language->id);
            $data[$language->id]['num_activities_'.$language->id] = $request->input('num_activities_'.$language->id);
            $data[$language->id]['popularity_'.$language->id] = $request->input('popularity_'.$language->id);
            $data[$language->id]['conditions_'.$language->id] = $request->input('conditions_'.$language->id);
            $data[$language->id]['price_level_'.$language->id] = $request->input('price_level_'.$language->id);
            $data[$language->id]['num_checkins_'.$language->id] = $request->input('num_checkins_'.$language->id);
            $data[$language->id]['history_'.$language->id] = $request->input('history_'.$language->id); 
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
            'countries_id' =>  $request->input('countries_id'),
            'cities_id' =>  $request->input('cities_id'),
            'place_types_ids' => $request->input('place_types_ids'),
            'lat' => $location[0],
            'lng' => $location[1],
            'safety_degrees_id' => $request->input('safety_degrees_id')
        ];

        
        $this->places->update($id , $place, $data , $extra);

        return redirect()->route('admin.location.place.index')
            ->withFlashSuccess('Place updated Successfully!');
    }

    /**
     * @param Place        $id
     * @param ManagePlaceRequest $request
     *
     * @return mixed
     */
    public function show($id, ManagePlaceRequest $request)
    {   
        $place = Place::findOrFail(['id' => $id]);
        $placeTrans = PlaceTranslations::where(['places_id' => $id])->get();
        $place = $place[0];

        /* Get Country Information */
        $country = $place->country;
        $country = $country->transsingle;
        
        /* Get Country Information */
        $city = $place->city;
        $city = $city->transsingle;
        
        /* Get Country Information */
        $type = $place->type;
        $type = $type->transsingle;
    
        /* Get Safety Degrees Information */
        $safety_degree = $place->degree;
        $safety_degree = $safety_degree->transsingle;
        
        return view('backend.place.show')
            ->withPlace($place)
            ->withPlacetrans($placeTrans)
            ->withCountry($country)
            ->withCity($city)
            ->withType($type)
            ->withDegree($safety_degree);
    }

    /**
     * @param Place $place
     * @param $status
     * @param ManagePlaceRequest $request
     *
     * @return mixed
     */
    public function mark(Place $place, $status, ManagePlaceRequest $request)
    {
        $place->active = $status;
        $place->save();
        return redirect()->route('admin.location.place.index')
            ->withFlashSuccess('Place Status Updated!');
    }
}