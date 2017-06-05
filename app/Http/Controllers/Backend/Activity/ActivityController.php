<?php

namespace App\Http\Controllers\Backend\Activity;

use App\Models\Activity\Activity;
use App\Models\Activity\ActivityTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;
use App\Http\Requests\Backend\Activity\ManageActivityRequest;
use App\Http\Requests\Backend\Activity\StoreActivityRequest;
use App\Repositories\Backend\Activity\ActivityRepository;
use App\Models\Regions\Regions;
use App\Models\SafetyDegree\SafetyDegree;
use App\Models\ActivityTypes\ActivityTypes;
use App\Models\Country\Countries;
use App\Models\City\Cities;
use App\Models\Place\Place;

class ActivityController extends Controller
{
    protected $activities;

    public function __construct(ActivityRepository $activities)
    {
        $this->activities = $activities;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageCountryrRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageActivityRequest $request)
    {
        return view('backend.activity.index');
    }

    /**
     * @param ManageActivityRequest $request
     *
     * @return mixed
     */
    public function create(ManageActivityRequest $request)
    {   
        /* Get All Activity Types */
        $activity_types = ActivityTypes::all();
        $activity_types_arr = [];
        
        foreach ($activity_types as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $activity_types_arr[$value->id] = $value->transsingle->title;
            }
        }

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

        /* Get All Places */
        $places = Place::where(['active' => 1])->get();
        $places_arr = [];
        
        foreach ($places as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){  
                $places_arr[$value->id] = $value->transsingle->title;
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
       
        return view('backend.activity.create',[
            'activity_types' => $activity_types_arr,
            'countries' => $countries_arr,
            'cities' => $cities_arr,
            'degrees' => $degrees_arr,
            'places' => $places_arr,
        ]);
    }

    /**
     * @param StoreActivityRequest $request
     *
     * @return mixed
     */
    public function store(StoreActivityRequest $request)
    {   
        $data = [];

        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
            $data[$language->id]['working_days_'.$language->id] = $request->input('working_days_'.$language->id);
            $data[$language->id]['working_times_'.$language->id] = $request->input('working_times_'.$language->id);
            $data[$language->id]['how_to_go_'.$language->id] = $request->input('how_to_go_'.$language->id);
            $data[$language->id]['when_to_go_'.$language->id] = $request->input('when_to_go_'.$language->id);
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
            'types_id' => $request->input('types_id'),
            'countries_id' =>  $request->input('countries_id'),
            'safety_degree_id' => $request->input('safety_degree_id'),
            'cities_id' => $request->input('cities_id'),
            'places_id' => $request->input('places_id'),
            'lat' => $location[0],
            'lng' => $location[1],
        ];

        $this->activities->create($data, $extra);

        return redirect()->route('admin.activities.activity.index')->withFlashSuccess('Activity Created!');
    }

    /**
     * @param Country $id
     * @param ManageActivityRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageActivityRequest $request)
    {
        $item = Activity::findOrFail($id);
        /* Delete Children Tables Data of this country */
        $child = ActivityTranslations::where(['activities_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.activities.activity.index')->withFlashSuccess('Activity Deleted Successfully');
    }

    /**
     * @param Countries $id
     * @param ManageActivityRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageActivityRequest $request)
    {   
        
        $data = [];
        $activity = Activity::findOrFail(['id' => $id]);
        $activity = $activity[0];

        foreach ($this->languages as $key => $language) {
            $model = ActivityTranslations::where([
                'languages_id' => $language->id,
                'activities_id'   => $id
            ])->get();

            $data['title_'.$language->id] = $model[0]->title;
            $data['description_'.$language->id] = $model[0]->description;
            $data['working_days_'.$language->id] = $model[0]->working_days;
            $data['working_times_'.$language->id] = $model[0]->working_times;
            $data['how_to_go_'.$language->id] = $model[0]->how_to_go;
            $data['when_to_go_'.$language->id] = $model[0]->when_to_go;
            $data['popularity_'.$language->id] = $model[0]->popularity;
            $data['conditions_'.$language->id] = $model[0]->conditions;
        }

        $data['lat_lng'] = $activity['lat'] . ',' . $activity['lng'];
        $data['countries_id'] = $activity['countries_id'];
        $data['active'] = $activity['active'];
        $data['cities_id'] = $activity['cities_id'];
        $data['safety_degree_id'] = $activity['safety_degree_id'];
        $data['types_id'] = $activity['types_id'];
        $data['places_id'] = $activity['places_id'];

        /* Get All Activity Types */
        $activity_types = ActivityTypes::all();
        $activity_types_arr = [];
        
        foreach ($activity_types as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $activity_types_arr[$value->id] = $value->transsingle->title;
            }
        }

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

        /* Get All Places */
        $places = Place::where(['active' => 1])->get();
        $places_arr = [];
        
        foreach ($places as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){  
                $places_arr[$value->id] = $value->transsingle->title;
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
       
        return view('backend.activity.edit',[
            'activity' => $activity,
            'activityid' => $id,
            'activity_types' => $activity_types_arr,
            'countries' => $countries_arr,
            'cities' => $cities_arr,
            'places' => $places_arr,
            'degrees' => $degrees_arr,
            'data' => $data
        ]);
    }

    /**
     * @param Countries            $id
     * @param ManageActivityRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageActivityRequest $request)
    {   
        $activity = Activity::findOrFail(['id' => $id]);
        
        $data = [];

        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
            $data[$language->id]['working_days_'.$language->id] = $request->input('working_days_'.$language->id);
            $data[$language->id]['working_times_'.$language->id] = $request->input('working_times_'.$language->id);
            $data[$language->id]['how_to_go_'.$language->id] = $request->input('how_to_go_'.$language->id);
            $data[$language->id]['when_to_go_'.$language->id] = $request->input('when_to_go_'.$language->id);
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
            'types_id' => $request->input('types_id'),
            'countries_id' =>  $request->input('countries_id'),
            'safety_degree_id' => $request->input('safety_degree_id'),
            'cities_id' => $request->input('cities_id'),
            'places_id' => $request->input('places_id'),
            'lat' => $location[0],
            'lng' => $location[1],
        ];

        $this->activities->update($id , $activity ,  $data, $extra);

        return redirect()->route('admin.activities.activity.index')
            ->withFlashSuccess('Activity updated Successfully!');
    }

    /**
     * @param Country        $id
     * @param ManageActivityRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageActivityRequest $request)
    {   
        $activity = Activity::findOrFail(['id' => $id]);
        $activityTrans = ActivityTranslations::where(['activities_id' => $id])->get();
        $activity = $activity[0];
        
        /* Get Country Information */
        $country = $activity->country;
        $country = $country->transsingle;

        /* Get City Information */
        $city = $activity->city;
        $city = $city->transsingle;

        /* Get Place Information */
        $place = $activity->place;
        $place = $place->transsingle;
       
        /* Get Activity Type Information */
        $activity_type = $activity->type;
        $activity_type = $activity_type->transsingle;

        /* Get Safety Degrees Information */
        $safety_degree = $activity->degree;
        $safety_degree = $safety_degree->transsingle;
       
        return view('backend.activity.show' , [
            'activity' => $activity,
            'activitytrans' => $activityTrans,
            'country' => $country,
            'city' => $city,
            'place' => $place,
            'activity_type' => $activity_type,
            'safety_degree' => $safety_degree
        ]);
    }

    /**
     * @param Activity $activity
     * @param $status
     * @param ManageActivityRequest $request
     *
     * @return mixed
     */
    public function mark(Activity $activity, $status, ManageActivityRequest $request)
    {
        $activity->active = $status;
        $activity->save();
        return redirect()->route('admin.activities.activity.index')
            ->withFlashSuccess('Activity Status Updated!');
    }
}