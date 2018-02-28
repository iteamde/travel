<?php

namespace App\Http\Controllers\Backend\Restaurants;

use App\Models\AdminLogs\AdminLogs;
use App\Models\RestaurantsSearchHistory\RestaurantsSearchHistory;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurants\Restaurants;
use App\Models\Restaurants\RestaurantsTranslations;
use App\Models\City\Cities;
use App\Models\Country\Countries;
use App\Http\Controllers\Controller;
use App\Models\Access\Language\Languages;
use App\Repositories\Backend\Restaurants\RestaurantsRepository;
use App\Http\Requests\Backend\Restaurants\StoreRestaurantsRequest;
use App\Http\Requests\Backend\Restaurants\ManageRestaurantsRequest;
use App\Models\ActivityMedia\Media;
use App\Models\Place\Place;

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
            $data[$language->id]['price_level_' . $language->id] = $request->input('price_level_' . $language->id);
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

        $cover = null;
        if($request->hasFile('cover_image')){
            $cover = $request->file('cover_image');
        }

        $files = null;
        if ($request->hasFile('pictures')) {
            $files = $request->file('pictures');
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
            'files'         => $files,
            'cover_image'   => $cover
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
                $data['working_days_'.$language->id]    = $model[0]->working_days;
                $data['working_times_'.$language->id]   = $model[0]->working_times;
                $data['how_to_go_'.$language->id]       = $model[0]->how_to_go;
                $data['when_to_go_'.$language->id]      = $model[0]->when_to_go;
                $data['price_level_' . $language->id]   = $model[0]->price_level;
                $data['num_activities_'.$language->id]  = $model[0]->num_activities;
                $data['popularity_'.$language->id]      = $model[0]->popularity;
                $data['conditions_'.$language->id]      = $model[0]->popularity;
            }else{

                /* Put Null In  $data Array If Translation Not Found, To Be Used In Edit Form */
                $data['title_'.$language->id]           = null;
                $data['description_'.$language->id]     = null;
                $data['working_days_'.$language->id]    = null;
                $data['working_times_'.$language->id]   = null;
                $data['how_to_go_'.$language->id]       = null;
                $data['when_to_go_'.$language->id]      = null;
                $data['price_level_' . $language->id]   = null;
                $data['num_activities_'.$language->id]  = null;
                $data['popularity_'.$language->id]      = null;
                $data['conditions_'.$language->id]      = null;
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

        /* Get Selected Medias */
        $selected_medias = $restaurants->medias;
        $selected_images = [];
        $selected_medias_arr = [];

        if(!empty($selected_medias)){
            foreach ($selected_medias as $key => $value) {
                $media = $value->media;

                if(!empty($media)){
                    if($media->type != Media::TYPE_IMAGE){
                        array_push($selected_medias_arr,$media->id);
                    }else{
                         $media->url = str_replace('storage.travooo.com', 'https://localhost/travoo-api/storage/uploads', $media->url);
                        array_push($selected_images,[
                            'id'    => $media->id,
                            'url'   => $media->url
                        ]);
                    }
                }
            }
        }

        $data['selected_medias'] = $selected_medias_arr;

        /* Get Cover Image Of Country */
        $cover = null;
        if(!empty($restaurants->cover)){
            $cover = $restaurants->cover;
            // $cover->url = str_replace('storage.travooo.com', 'https://localhost/travoo-api/storage/uploads', $cover->url);
        }

        return view('backend.restaurants.edit')
            ->withLanguages($this->languages)
            ->withRestaurant($restaurants)
            ->withRestaurantid($id)
            ->withCountries($countries_arr)
            ->withCities($cities_arr)
            ->withPlaces($places_arr)
            ->withMedias($medias_arr)
            ->withData($data)
            ->withImages($selected_images)
            ->withCover($cover);
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
            $data[$language->id]['price_level_' . $language->id] = $request->input('price_level_' . $language->id);
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

        $files = null;
        if ($request->hasFile('pictures')) {
            $files = $request->file('pictures');
        }

        $cover_image = null;
        if($request->hasFile('cover_image')){
            $cover_image = $request->file('cover_image');
        }    

        /* Pass All Relations Through $extra Array */
        $extra = [
            'active'            => $active,
            'countries_id'      => $request->input('countries_id'),
            'cities_id'         => $request->input('cities_id'),
            'places_id'         => $request->input('places_id'),
            'medias'            => $request->input('medias_id'),
            'lat'               => $location[0],
            'lng'               => $location[1],
            'files'             => $files,
            'cover_image'       => $cover_image,
            'media_cover_image' => $request->input('media-cover-image'),
            'remove-cover-image'=> $request->input('remove-cover-image'),
            'delete-images'     => $request->input('delete-images'),
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

    /**
     * @param ManagePlaceRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function import(ManageRestaurantsRequest $request) {
        $countries = Countries::where(['active' => 1])->get();
        $countries_arr = [];

        foreach ($countries as $key => $value) {
            if (isset($value->transsingle) && !empty($value->transsingle)) {
                $countries_arr[$value->id] = $value->transsingle->title;
            }
        }
        $data['countries'] = $countries_arr;

        /* Get All Cities */
        $cities = Cities::where(['active' => 1])->get();
        foreach ($cities as $key => $value) {
            if (isset($value->transsingle) && !empty($value->transsingle)) {
                $cities_arr[$value->id] = $value->transsingle->title;
            }
        }
        $data['cities'] = $cities_arr;

        return view('backend.restaurants.import', $data);
    }

    /**
     * @param ManagePlaceRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search($admin_logs_id = 0, $country_id = 0, $city_id = 0, $latlng = 0, ManageRestaurantsRequest $request) {
        if ($country_id)
            $data['countries_id'] = $country_id;
        else
            $data['countries_id'] = $request->input('countries_id');

        if ($city_id)
            $data['cities_id'] = $city_id;
        else
            $data['cities_id'] = $request->input('cities_id');

        $city = urlencode($request->input('address'));

        if ($admin_logs_id) {
            $latlng = @explode(",", $latlng);
            $lat = $latlng[0];
            $lng = $latlng[1];

            $admin_logs = AdminLogs::find($admin_logs_id);
            $qu = $admin_logs->query;
            $queries = array_values(unserialize($qu));

            if (count($queries)) {
                $query = urlencode($queries[0]);
                unset($queries[0]);
                $queries = serialize($queries);
                $ad = AdminLogs::find($admin_logs_id);
                $ad->query = $queries;
                $ad->save();
            }
        } else {
            $queries = explode(",", $request->input('query'));
            $query = urlencode($queries[0]);
            unset($queries[0]);
            $queries = serialize($queries);

            $latlng = @explode(",", $request->input('latlng'));
            $lat = $latlng[0];
            $lng = $latlng[1];

            $admin_logs = new AdminLogs();
            $admin_logs->item_type = 'restaurants';
            $admin_logs->item_id = 0;
            $admin_logs->action = 'search';
            $admin_logs->query = $queries;
            $admin_logs->time = time();
            $admin_logs->admin_id = Auth::user()->id;
            $admin_logs->save();
        }

        if (isset($query)) {

            $provider_ids = array();
            $get_provider_ids = Restaurants::where('id', '>', 0)->select('provider_id')->get()->toArray();
            foreach ($get_provider_ids AS $gpi) {
                $provider_ids[] = $gpi['provider_id'];
            }
            $data['provider_ids'] = $provider_ids;

            if (time() % 2 == 0) {
                $json = file_get_contents('http://db.travooodev.com/public/restaurants/go/' . ($city ? $city : 0) . '/' . $lat . '/' . $lng . '/' . $query);
            } elseif (time() % 2 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/restaurants/go/' . ($city ? $city : 0) . '/' . $lat . '/' . $lng . '/' . $query);
            } elseif (time() % 3 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/restaurants/go/' . ($city ? $city : 0) . '/' . $lat . '/' . $lng . '/' . $query);
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/restaurants/go/' . ($city ? $city : 0) . '/' . $lat . '/' . $lng . '/' . $query);
            }
            $result = json_decode($json);

            RestaurantsSearchHistory::create([
                'lat' => $lat,
                'lng' => $lng,
                'time' => time(),
                'admin_id' => Auth::user()->id
            ]);

            $data['results'] = $result;
            $data['queries'] = $queries;
            if (isset($admin_logs) && is_object($admin_logs)) {
                $data['admin_logs_id'] = $admin_logs->id;
                $data['latlng'] = $lat . ',' . $lng;
            }

            return view('backend.restaurants.importresults', $data);
        } else {
            return redirect()->route('admin.restaurants.restaurants.index')
                            ->withFlashSuccess('Done!');
        }
    }

    public function savesearch(ManageRestaurantsRequest $request) {
        $data['countries_id'] = $request->input('countries_id');
        $data['cities_id'] = $request->input('cities_id');
        $to_save = $request->input('save');
        $places = $request->input('place');

        //dd($request->all());

        if (is_array($to_save)) {
            foreach ($to_save AS $k => $v) {
                if (!Restaurants::where('provider_id', '=', $places[$k]['provider_id'])->exists()) {
                $p = new Restaurants();
                $p->provider_id = $places[$k]['provider_id'];
                $p->countries_id = $data['countries_id'];
                $p->cities_id = $data['cities_id'];
                $p->place_type = $places[$k]['types'];

                $p->places_id = 1;
                $p->lat = $places[$k]['lat'];
                $p->lng = $places[$k]['lng'];
                $p->rating = $places[$k]['rating'];
                $p->active = 1;
                $p->save();
                //dd($p->id);

                $pt = new RestaurantsTranslations();
                $pt->languages_id = 1;
                $pt->restaurants_id = $p->id;
                $pt->title = $places[$k]['name'];
                $pt->address = $places[$k]['address'];
                if (isset($places[$k]['phone']))
                    $pt->phone = $places[$k]['phone'];
                if (isset($places[$k]['website']))
                    $pt->description = $places[$k]['website'];
                $pt->working_days = $places[$k]['working_days'] ? $places[$k]['working_days'] : '';
                $pt->save();
                AdminLogs::create(['item_type' => 'restaurants', 'item_id' => $p->id, 'action' => 'import', 'query' => '', 'time' => time(), 'admin_id' => Auth::user()->id]);
                }
                
                }
            //die();
            $num = count($to_save);

            if ($request->input('admin_logs_id')) {
                //die();
                return redirect()->route('admin.restaurants.restaurants.search', array($request->get('admin_logs_id'),
                                    $request->get('countries_id'),
                                    $request->get('cities_id'),
                                    $request->get('latlng')))
                                ->withFlashSuccess($num . ' Restaurants imported successfully!');
            } else {
                return redirect()->route('admin.restaurants.restaurants.index')
                                ->withFlashSuccess($num . ' Restaurants imported successfully!');
            }
        } else {
            if ($request->input('admin_logs_id')) {
                //die();
                return redirect()->route('admin.restaurants.restaurants.search', array($request->get('admin_logs_id'),
                                    $request->get('countries_id'),
                                    $request->get('cities_id'),
                                    $request->get('latlng')))
                                ->withFlashSuccess('You didnt select any items to import!');
            } else {
            return redirect()->route('admin.restaurants.restaurants.index')
                            ->withFlashError('You didnt select any items to import!');
            }
        }
    }

    public function return_search_history(ManageRestaurantsRequest $request) {
        //dd($request->all());
        $ne_lat = $request->get('ne_lat');
        $sw_lat = $request->get('sw_lat');
        $ne_lng = $request->get('ne_lng');
        $sw_lng = $request->get('sw_lat');

        $markers = RestaurantsSearchHistory::whereBetween('lat', array($sw_lat, $ne_lat))
                ->whereBetween('lng', array($sw_lng, $ne_lng))
                ->groupBy('lat', 'lng')
                ->select('lat', 'lng')
                ->get()
                ->toArray();
        return json_encode($markers);
    }

    public function delete_ajax(ManageRestaurantsRequest $request){

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
     * @param Restaurants $id
     * @param ManageRestaurantsRequest $request
     *
     * @return mixed
     */
    public function delete_single_ajax($id) {
        $item = Restaurants::find($id);
        if(empty($item)){
            return false;
        }
        $item->delete();

        AdminLogs::create(['item_type' => 'restaurants', 'item_id' => $id, 'action' => 'delete', 'time' => time(), 'admin_id' => Auth::user()->id]);
    }
}