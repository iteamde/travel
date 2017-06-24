<?php

namespace App\Http\Controllers\Backend\Restaurants;

use App\Models\Restaurants\Restaurants;
use App\Models\Restaurants\RestaurantsTranslations;
use App\Models\City\Cities;
use App\Models\Place\Place;
use App\Models\Country\Countries;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;
use App\Repositories\Backend\Restaurants\RestaurantsRepository;
use App\Http\Requests\Backend\Restaurants\StoreRestaurantsRequest;
use App\Http\Requests\Backend\Restaurants\ManageRestaurantsRequest;
use App\Models\ActivityMedia\Media;

class RestaurantsController extends Controller
{
    /* RestaurantsRepository $restaurants */
    protected $restaurants;
    protected $languages;

    public function __construct(RestaurantsRepository $restaurants)
    {
        $this->restaurants = $restaurants;
        /* Get All Active Language */
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageRestaurantsRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageRestaurantsRequest $request)
    {
        return view('backend.restaurants.index');
    }

    /**
     * @param ManageRestaurantsRequest $request
     *
     * @return mixed
     */
    public function create(ManageRestaurantsRequest $request)
    {   
        /* Get All Countries */
        $countries = Countries::where(['active' => Countries::ACTIVE])->get();
        $countries_arr = [];
        
        foreach ($countries as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $countries_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All Cities */
        $cities = Cities::where([ 'active' => 1 ])->get();
        $cities_arr = [];
        
        foreach ($cities as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){  
                $cities_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All Places */
        $places = Place::get();
        $places_arr = [];
        
        foreach ($places as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){  
                $places_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All Medias */
        $medias = Media::get();
        $medias_arr = [];
        
        foreach ($medias as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){  
                $medias_arr[$value->id] = $value->transsingle->title;
            }
        }

        return view('backend.restaurants.create',[
            'countries' => $countries_arr,
            'cities'    => $cities_arr,
            'places'    => $places_arr,
            'medias'    => $medias_arr,
        ]);
    }

    /**
     * @param StoreRestaurantsRequest $request
     *
     * @return mixed
     */
    public function store(StoreRestaurantsRequest $request)
    {   
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
            $active = Cities::DEACTIVE;
        }else{
            $active = Cities::ACTIVE;
        }

        /* Pass All Relations Through $extra Array */
        $extra = [
            'active'        => $active,
            'countries_id'  => $request->input('countries_id'),
            'cities_id'     => $request->input('cities_id'),
            'places_id'     => $request->input('places_id'),
            'lat'           => $location[0],
            'lng'           => $location[1],
            'places'        => $request->input('places_id'),
            'medias'        => $request->input('medias_id'),
        ];

        $this->restaurants->create($data, $extra);

        return redirect()->route('admin.restaurants.restaurants.index')->withFlashSuccess('Restaurant Created!');
    }

    /**
     * @param Restaurants $id
     * @param ManageRestaurantsRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageRestaurantsRequest $request)
    {   
        /* $data array to pass data to view */
        $data = [];

        $restaurants = Restaurants::findOrFail(['id' => $id]);
        $restaurants = $restaurants[0];

        foreach ($this->languages as $key => $language) {
            
            /* Find The Translation Model For Current Language For This Restaurant */
            $model = RestaurantsTranslations::where([
                'languages_id' => $language->id,
                'restaurants_id'   => $id
            ])->get();
            
            /* If Model For Current Language Is Not Found For This City, Skip Its Data */
            if(!empty($model[0])) {
                
                /* Put All The Translation Data In $data Array, To Be Used In Edit Form */
                $data['title_'.$language->id]           = $model[0]->title;
                $data['description_'.$language->id]     = $model[0]->description;
                $data['working_days_'.$language->id]      = $model[0]->working_days;
                $data['working_times_'.$language->id]       = $model[0]->working_times;
                $data['how_to_go_'.$language->id]  = $model[0]->how_to_go;
                $data['when_to_go_'.$language->id]       = $model[0]->when_to_go;
                $data['num_activities_'.$language->id]    = $model[0]->num_activities;
                $data['popularity_'.$language->id]         = $model[0]->popularity;
                $data['conditions_'.$language->id]    = $model[0]->popularity;
            }else{
                
                /* Put Null In  $data Array If Translation Not Found, To Be Used In Edit Form */
                $data['title_'.$language->id]           = null;
                $data['description_'.$language->id]     = null;
                $data['working_days_'.$language->id]      = null;
                $data['working_times_'.$language->id]       = null;
                $data['how_to_go_'.$language->id]  = null;
                $data['when_to_go_'.$language->id]       = null;
                $data['num_activities_'.$language->id]    = null;
                $data['popularity_'.$language->id]         = null;
                $data['conditions_'.$language->id]    = null;
            }
        }

        /* Put All Common Fields In $data Array To Be Used In Edit Form */
        $data['lat_lng']        = $restaurants['lat'] . ',' . $restaurants['lng'];
        $data['active']         = $restaurants['active'];
        $data['countries_id']   = $restaurants['countries_id'];
        $data['cities_id']      = $restaurants['cities_id'];
        $data['places_id']      = $restaurants['places_id'];

        /* Find All Active Countries */
        $countries = Countries::where(['active' => Countries::ACTIVE ])->get();
        $countries_arr = [];
        /* Get Title Id Pair For Each Model */
        foreach ($countries as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $countries_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All Cities */
        $cities = Cities::where(['active' => 1])->get();
        $cities_arr = [];
        /* Get Title Id Pair For Each Model */
        foreach ($cities as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){  
                $cities_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All Places */
        $places = Place::where(['active' => 1])->get();
        $places_arr = [];
        /* Get Title Id Pair For Each Model */
        foreach ($places as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){  
                $places_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get Selected Medias */
        $selected_medias = $restaurants->medias;
        $selected_medias_arr = [];

        if(!empty($selected_medias)){
            foreach ($selected_medias as $key => $value) {
                array_push( $selected_medias_arr , $value->medias_id );
            }
        }

        $data['selected_medias'] = $selected_medias_arr;

        /* Get All Medias For Dropdown */
        $medias = Media::get();
        $medias_arr = [];
        /* Get Title Id Pair For Each Model */
        foreach ($medias as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){  
                $medias_arr[$value->id] = $value->transsingle->title;
            }
        }

        return view('backend.restaurants.edit')
            ->withLanguages($this->languages)
            ->withRestaurant($restaurants)
            ->withRestaurantid($id)
            ->withCountries($countries_arr)
            ->withCities($cities_arr)
            ->withPlaces($places_arr)
            ->withMedias($medias_arr)
            ->withData($data);
    }

    /**
     * @param Restaurants           $id
     * @param ManageRestaurantsRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageRestaurantsRequest $request)
    {   
        $restaurants = Restaurants::findOrFail(['id' => $id]);
        
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
            $active = Cities::DEACTIVE;
        }else{
            $active = Cities::ACTIVE;
        }
        
        /* Pass All Relations Through $extra Array */
        $extra = [
            'active'        => $active,
            'countries_id'  => $request->input('countries_id'),
            'cities_id'     => $request->input('cities_id'),
            'places_id'     => $request->input('places_id'),
            'medias'        => $request->input('medias_id'),
            'lat'           => $location[0],
            'lng'           => $location[1],
        ];

        
        $this->restaurants->update($id , $restaurants, $data , $extra);

        return redirect()->route('admin.restaurants.restaurants.index')
            ->withFlashSuccess('Restaurants updated Successfully!');
    }

    /**
     * @param Restaurants        $id
     * @param ManageRestaurantsRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageRestaurantsRequest $request)
    {   
        $restaurants = Restaurants::findOrFail(['id' => $id]);
        $restaurantsTrans = RestaurantsTranslations::where(['restaurants_id' => $id])->get();
        $restaurants = $restaurants[0];

        /* Get Country Information */
        $country = $restaurants->country;
        $country = $country->transsingle;

        /* Get City Information */
        $city = $restaurants->city;
        $city = $city->transsingle;
       
        /* Get Place Information */
        $place = $restaurants->place;
        $place = $place->transsingle;;

        /* Get All Selected Medias */
        $medias     = $restaurants->medias;
        $medias_arr = [];
        
        if(!empty($medias)){
            foreach ($medias as $key => $value) {
                if(!empty($value->media)){
                    if(!empty($value->media->transsingle)){
                        array_push($medias_arr, $value->media->transsingle->title);
                    }
                }
            }
        }

        return view('backend.restaurants.show')
            ->withRestaurant($restaurants)
            ->withRestaurant_trans($restaurantsTrans)
            ->withCountry($country)
            ->withCity($city)
            ->withPlace($place)
            ->withMedias($medias_arr);
    }

    /**
     * @param Restaurants $id
     * @param ManageRestaurantsRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageRestaurantsRequest $request)
    {
        $item = Restaurants::findOrFail($id);
        $item->deleteTrans();
        $item->deleteMedias();
        $item->delete();

        return redirect()->route('admin.restaurants.restaurants.index')->withFlashSuccess('Restaurants Deleted Successfully');
    }

    /**
     * @param Restaurants $restaurants
     * @param $status
     * @param ManageRestaurantsRequest $request
     *
     * @return mixed
     */
    public function mark($id, $status, ManageRestaurantsRequest $request)
    {   
        $restaurants = Restaurants::findOrFail(['id' => $id]);
        $restaurants = $restaurants[0];
        $restaurants->active = $status;
        $restaurants->save();
        return redirect()->route('admin.restaurants.restaurants.index')
            ->withFlashSuccess('Restaurants Status Updated!');
    }
}