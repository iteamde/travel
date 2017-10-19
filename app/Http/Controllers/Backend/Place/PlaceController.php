<?php

namespace App\Http\Controllers\Backend\Place;

use App\Models\Place\Place;
use App\Models\Place\PlaceTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\Language\Languages;
use App\Http\Requests\Backend\Place\ManagePlaceRequest;
use App\Http\Requests\Backend\Place\StorePlaceRequest;
use App\Repositories\Backend\Place\PlaceRepository;
use App\Models\Regions\Regions;
use App\Models\SafetyDegree\SafetyDegree;
use App\Models\Country\Countries;
use App\Models\City\Cities;
use App\Models\AdminLogs\AdminLogs;
use App\Models\PlaceSearchHistory\PlaceSearchHistory;
use App\Models\PlaceTypes\PlaceTypes;
use App\Models\ActivityMedia\Media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller {

    protected $places;

    public function __construct(PlaceRepository $places) {
        $this->places = $places;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

    /**
     * @param ManagePlaceRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManagePlaceRequest $request) {
        return view('backend.place.index');
    }

    /**
     * @param ManagePlaceRequest $request
     *
     * @return mixed
     */
    public function create(ManagePlaceRequest $request) {
        /* Get All Countries */
        $countries = Countries::where(['active' => 1])->get();
        $countries_arr = [];

        foreach ($countries as $key => $value) {
            if (isset($value->transsingle) && !empty($value->transsingle)) {
                $countries_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All Cities */
        $cities = Cities::where(['active' => 1])->get();
        $cities_arr = [];

        foreach ($cities as $key => $value) {
            if (isset($value->transsingle) && !empty($value->transsingle)) {
                $cities_arr[$value->id] = $value->transsingle->title;
            }
        }


        /* Get All Medias */
        $medias = Media::where(['type' => null])->get();
        $medias_arr = [];

        foreach ($medias as $key => $value) {
            if (isset($value->transsingle) && !empty($value->transsingle)) {
                $medias_arr[$value->id] = $value->transsingle->title;
            }
        }

        return view('backend.place.create', [
            'countries' => $countries_arr,
            'cities' => $cities_arr,
            'medias' => $medias_arr,
        ]);
    }

    /**
     * @param StorePlaceRequest $request
     *
     * @return mixed
     */
    public function store(StorePlaceRequest $request) {
        $data = [];

        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_' . $language->id] = $request->input('title_' . $language->id);
            $data[$language->id]['description_' . $language->id] = $request->input('description_' . $language->id);
            $data[$language->id]['address_' . $language->id] = $request->input('address_' . $language->id);
            $data[$language->id]['phone_' . $language->id] = $request->input('phone_' . $language->id);
            $data[$language->id]['highlights_' . $language->id] = $request->input('highlights_' . $language->id);
            $data[$language->id]['working_days_' . $language->id] = $request->input('working_days_' . $language->id);
            $data[$language->id]['working_times_' . $language->id] = $request->input('working_times_' . $language->id);
            $data[$language->id]['how_to_go_' . $language->id] = $request->input('how_to_go_' . $language->id);
            $data[$language->id]['when_to_go_' . $language->id] = $request->input('when_to_go_' . $language->id);
            $data[$language->id]['num_activities_' . $language->id] = $request->input('num_activities_' . $language->id);
            $data[$language->id]['popularity_' . $language->id] = $request->input('popularity_' . $language->id);
            $data[$language->id]['conditions_' . $language->id] = $request->input('conditions_' . $language->id);
            $data[$language->id]['price_level_' . $language->id] = $request->input('price_level_' . $language->id);
            $data[$language->id]['num_checkins_' . $language->id] = $request->input('num_checkins_' . $language->id);
            $data[$language->id]['history_' . $language->id] = $request->input('history_' . $language->id);
        }

        $location = explode(',', $request->input('lat_lng'));

        /* Check if active field is enabled or disabled */
        $active = null;
        if (empty($request->input('active')) || $request->input('active') == 0) {
            $active = 2;
        } else {
            $active = 1;
        }

        $files = null;
        if ($request->hasFile('pictures')) {
            $files = $request->file('pictures');
        }

        $place_type_ids = null;
        $types = PlaceTypes::get();

        if (!empty($types[0])) {
            $place_type_ids = $types[0]->id;
        }

        $safety_degrees_id = null;
        $degrees = SafetyDegree::get();

        if (!empty($degrees[0])) {
            $safety_degrees_id = $degrees[0]->id;
        }

        /* Send All Relation and Common Fields Through $extra Array */
        $extra = [
            'active' => $active,
            'countries_id' => $request->input('countries_id'),
            'cities_id' => $request->input('cities_id'),
            'place_types_ids' => $place_type_ids,
            'lat' => $location[0],
            'lng' => $location[1],
            'medias' => $request->input('medias_id'),
            'safety_degrees_id' => $safety_degrees_id,
            'files' => $files
        ];

        $this->places->create($data, $extra);


        AdminLogs::create(['item_type' => 'places', 'item_id' => 0, 'action' => 'create', 'time' => time(), 'admin_id' => Auth::user()->id]);

        return redirect()->route('admin.location.place.index')->withFlashSuccess('Place Created!');
    }

    /**
     * @param Place $id
     * @param ManagePlaceRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManagePlaceRequest $request) {
        $item = Place::findOrFail($id);
        /* Delete Children Tables Data of this country */
        $child = PlaceTranslations::where(['places_id' => $id])->get();
        if (!empty($child)) {
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->deleteMedias();
        $item->delete();

        AdminLogs::create(['item_type' => 'places', 'item_id' => $id, 'action' => 'delete', 'time' => time(), 'admin_id' => Auth::user()->id]);

        return redirect()->route('admin.location.place.index')->withFlashSuccess('Place Deleted Successfully');
    }

    /**
     * @param Countries $id
     * @param ManagePlaceRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManagePlaceRequest $request) {

        $data = [];
        $place = Place::findOrFail(['id' => $id]);
        $place = $place[0];

        foreach ($this->languages as $key => $language) {
            $model = PlaceTranslations::where([
                        'languages_id' => $language->id,
                        'places_id' => $id
                    ])->get();

            if (!empty($model[0])) {

                $data['title_' . $language->id] = $model[0]->title;
                $data['description_' . $language->id] = $model[0]->description;
                $data['address_' . $language->id] = $model[0]->address;
                $data['phone_' . $language->id] = $model[0]->phone;
                $data['highlights_' . $language->id] = $model[0]->highlights;
                $data['working_days_' . $language->id] = $model[0]->working_days;
                $data['working_times_' . $language->id] = $model[0]->working_times;
                $data['how_to_go_' . $language->id] = $model[0]->how_to_go;
                $data['when_to_go_' . $language->id] = $model[0]->when_to_go;
                $data['num_activities_' . $language->id] = $model[0]->num_activities;
                $data['popularity_' . $language->id] = $model[0]->popularity;
                $data['conditions_' . $language->id] = $model[0]->conditions;
                $data['price_level_' . $language->id] = $model[0]->price_level;
                $data['num_checkins_' . $language->id] = $model[0]->num_checkins;
                $data['history_' . $language->id] = $model[0]->history;
            } else {

                $data['title_' . $language->id] = null;
                $data['description_' . $language->id] = null;
                $data['address_' . $language->id] = null;
                $data['phone_' . $language->id] = null;
                $data['highlights_' . $language->id] = null;
                $data['working_days_' . $language->id] = null;
                $data['working_times_' . $language->id] = null;
                $data['how_to_go_' . $language->id] = null;
                $data['when_to_go_' . $language->id] = null;
                $data['num_activities_' . $language->id] = null;
                $data['popularity_' . $language->id] = null;
                $data['conditions_' . $language->id] = null;
                $data['price_level_' . $language->id] = null;
                $data['num_checkins_' . $language->id] = null;
                $data['history_' . $language->id] = null;
            }
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
            if (isset($value->transsingle) && !empty($value->transsingle)) {
                $countries_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All Cities */
        $cities = Cities::where(['active' => 1])->get();
        $cities_arr = [];

        foreach ($cities as $key => $value) {
            if (isset($value->transsingle) && !empty($value->transsingle)) {
                $cities_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All Place Types */
        $places_types = PlaceTypes::all();
        $places_types_arr = [];

        foreach ($places_types as $key => $value) {
            if (isset($value->transsingle) && !empty($value->transsingle)) {
                $places_types_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All safety Degrees */
        $degrees = SafetyDegree::get();
        $degrees_arr = [];

        foreach ($degrees as $key => $value) {
            if (isset($value->transsingle) && !empty($value->transsingle)) {
                $degrees_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All Selected Medias */
        $selected_medias = $place->medias;
        $selected_medias_arr = [];
        $images_arr = [];

        foreach ($selected_medias as $key => $value) {
            $value = $value->media;
            // if(isset($value->transsingle) && !empty($value->transsingle)){
            array_push($images_arr, [
                'id' => $value->id,
                'url' => asset(Storage::url($value->url))
            ]);
        }

        $data['selected_medias'] = $selected_medias_arr;
        $data['images'] = $images_arr;


        return view('backend.place.edit')
                        ->withLanguages($this->languages)
                        ->withPlace($place)
                        ->withPlaceid($id)
                        ->withData($data)
                        ->withCountries($countries_arr)
                        ->withDegrees($degrees_arr)
                        ->withCities($cities_arr)
                        ->withPlace_types($places_types_arr)
                        ->withImages($images_arr);
        //->withMedias($medias_arr);
    }

    /**
     * @param Countries            $id
     * @param ManagePlaceRequest $request
     *
     * @return mixed
     */
    public function update($id, ManagePlaceRequest $request) {
        $place = Place::findOrFail(['id' => $id]);

        $data = [];

        $data = [];

        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_' . $language->id] = $request->input('title_' . $language->id);
            $data[$language->id]['description_' . $language->id] = $request->input('description_' . $language->id);
            $data[$language->id]['address_' . $language->id] = $request->input('address_' . $language->id);
            $data[$language->id]['phone_' . $language->id] = $request->input('phone_' . $language->id);
            $data[$language->id]['highlights_' . $language->id] = $request->input('highlights_' . $language->id);
            $data[$language->id]['working_days_' . $language->id] = $request->input('working_days_' . $language->id);
            $data[$language->id]['working_times_' . $language->id] = $request->input('working_times_' . $language->id);
            $data[$language->id]['how_to_go_' . $language->id] = $request->input('how_to_go_' . $language->id);
            $data[$language->id]['when_to_go_' . $language->id] = $request->input('when_to_go_' . $language->id);
            $data[$language->id]['num_activities_' . $language->id] = $request->input('num_activities_' . $language->id);
            $data[$language->id]['popularity_' . $language->id] = $request->input('popularity_' . $language->id);
            $data[$language->id]['conditions_' . $language->id] = $request->input('conditions_' . $language->id);
            $data[$language->id]['price_level_' . $language->id] = $request->input('price_level_' . $language->id);
            $data[$language->id]['num_checkins_' . $language->id] = $request->input('num_checkins_' . $language->id);
            $data[$language->id]['history_' . $language->id] = $request->input('history_' . $language->id);
        }

        // handle featured media for place - Hussien 19/10/2017
        if ($request->has('featured_media')) {
            $featured_media_id = $request->input('featured_media');
            $place_media = Media::leftJoin('places_medias', 'places_medias.medias_id', '=', 'medias.id')
                    ->where('places_medias.places_id', $id)
                    ->get();
            dd($place_media);

        }
        // end handle featured media for place

        $location = explode(',', $request->input('lat_lng'));

        /* Check if active field is enabled or disabled */
        $active = null;
        if (empty($request->input('active')) || $request->input('active') == 0) {
            $active = 2;
        } else {
            $active = 1;
        }

        $files = null;
        if ($request->hasFile('pictures')) {
            $files = $request->file('pictures');
        }

        /* Send All Relation and Common fields through $extra Array */
        $extra = [
            'active' => $active,
            'countries_id' => $request->input('countries_id'),
            'cities_id' => $request->input('cities_id'),
            //'place_types_ids' => $request->input('place_types_ids'),
            'medias' => $request->input('medias_id'),
            'lat' => $location[0],
            'lng' => $location[1],
            'safety_degrees_id' => $request->input('safety_degrees_id'),
            'files' => $files,
            'delete-images' => $request->input('delete-images'),
        ];

        $this->places->update($id, $place, $data, $extra);

        AdminLogs::create(['item_type' => 'places', 'item_id' => $id, 'action' => 'edit', 'time' => time(), 'admin_id' => Auth::user()->id]);

        return redirect()->route('admin.location.place.index')
                        ->withFlashSuccess('Place updated Successfully!');
    }

    /**
     * @param Place        $id
     * @param ManagePlaceRequest $request
     *
     * @return mixed
     */
    public function show($id, ManagePlaceRequest $request) {
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
        if (!empty($type)) {
            $type = $type->transsingle;
        }

        /* Get Safety Degrees Information */
        $safety_degree = $place->degree;
        if (!empty($safety_degrees)) {
            $safety_degree = $safety_degree->transsingle;
        }

        /* Get All Selected Medias */
        $selected_medias = $place->medias;
        $image_urls = [];
        $selected_medias_arr = [];

        foreach ($selected_medias as $key => $value) {
            $value = $value->media;
            if ($value->type == null) {
                if (isset($value->transsingle) && !empty($value->transsingle)) {
                    array_push($selected_medias_arr, $value->transsingle->title);
                }
            } else {
                array_push($image_urls, $value->url);
            }
        }

        return view('backend.place.show')
                        ->withPlace($place)
                        ->withPlacetrans($placeTrans)
                        ->withCountry($country)
                        ->withCity($city)
                        ->withType($type)
                        ->withDegree($safety_degree)
                        ->withImages($image_urls)
                        ->withMedias($selected_medias_arr);
    }

    /**
     * @param Place $place
     * @param $status
     * @param ManagePlaceRequest $request
     *
     * @return mixed
     */
    public function mark(Place $place, $status, ManagePlaceRequest $request) {
        $place->active = $status;
        $place->save();
        return redirect()->route('admin.location.place.index')
                        ->withFlashSuccess('Place Status Updated!');
    }

    /**
     * @param ManagePlaceRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function import(ManagePlaceRequest $request) {
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

        return view('backend.place.import', $data);
    }

    /**
     * @param ManagePlaceRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search($admin_logs_id = 0, $country_id = 0, $city_id = 0, $latlng = 0, ManagePlaceRequest $request) {
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
            $admin_logs->item_type = 'places';
            $admin_logs->item_id = 0;
            $admin_logs->action = 'search';
            $admin_logs->query = $queries;
            $admin_logs->time = time();
            $admin_logs->admin_id = Auth::user()->id;
            $admin_logs->save();
        }

        if (isset($query)) {

            /*
             * $provider_ids = array();

              $get_provider_ids = Place::where('id', '>', 0)->select('provider_id')->get()->toArray();
              foreach ($get_provider_ids AS $gpi) {
              $provider_ids[] = $gpi['provider_id'];
              }
              $data['provider_ids'] = $provider_ids;
             *
             */

            $data['provider_ids'] = array();

            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/places/go/' . ($city ? $city : 0) . '/' . $lat . '/' . $lng . '/' . $query);
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/places/go/' . ($city ? $city : 0) . '/' . $lat . '/' . $lng . '/' . $query);
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/places/go/' . ($city ? $city : 0) . '/' . $lat . '/' . $lng . '/' . $query);
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/places/go/' . ($city ? $city : 0) . '/' . $lat . '/' . $lng . '/' . $query);
            }
            $result = json_decode($json);

            PlaceSearchHistory::create([
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

            return view('backend.place.importresults', $data);
        } else {
            return redirect()->route('admin.location.place.index')
                            ->withFlashSuccess('Done!');
        }
    }

    public function savesearch(ManagePlaceRequest $request) {
        $data['countries_id'] = $request->input('countries_id');
        $data['cities_id'] = $request->input('cities_id');
        $to_save = $request->input('save');
        $places = $request->input('place');

        //dd($request->all());

        if (is_array($to_save)) {
            foreach ($to_save AS $k => $v) {
                $p = new Place();
                $p->place_type = $places[$k]['types'];
                $p->safety_degrees_id = 1;
                $p->provider_id = $places[$k]['provider_id'];
                $p->countries_id = $data['countries_id'];
                $p->cities_id = $data['cities_id'];
                $p->lat = $places[$k]['lat'];
                $p->lng = $places[$k]['lng'];
                $p->rating = $places[$k]['rating'];
                $p->active = 1;
                $p->save();
                //dd($p->id);

                $pt = new PlaceTranslations();
                $pt->languages_id = 1;
                $pt->places_id = $p->id;
                $pt->title = $places[$k]['name'];
                $pt->address = $places[$k]['address'];
                if (isset($places[$k]['phone']))
                    $pt->phone = $places[$k]['phone'];
                if (isset($places[$k]['website']))
                    $pt->description = $places[$k]['website'];
                $pt->working_days = $places[$k]['working_days'];
                $pt->save();
                AdminLogs::create(['item_type' => 'places', 'item_id' => $p->id, 'action' => 'import', 'query' => '', 'time' => time(), 'admin_id' => Auth::user()->id]);
            }
            //die();
            $num = count($to_save);

            if ($request->input('admin_logs_id')) {
                //die();
                return redirect()->route('admin.location.place.search', array($request->get('admin_logs_id'),
                                    $request->get('countries_id'),
                                    $request->get('cities_id'),
                                    $request->get('latlng')))
                                ->withFlashSuccess($num . ' Places imported successfully!');
            } else {
                return redirect()->route('admin.location.place.index')
                                ->withFlashSuccess($num . ' Places imported successfully!');
            }
        } else {
            if ($request->input('admin_logs_id')) {
                //die();
                return redirect()->route('admin.location.place.search', array($request->get('admin_logs_id'),
                                    $request->get('countries_id'),
                                    $request->get('cities_id'),
                                    $request->get('latlng')))
                                ->withFlashSuccess('You didnt select any items to import!');
            } else {
                return redirect()->route('admin.location.place.index')
                                ->withFlashError('You didnt select any items to import!');
            }
        }
    }

    public function return_search_history(ManagePlaceRequest $request) {
        //dd($request->all());
        $ne_lat = $request->get('ne_lat');
        $sw_lat = $request->get('sw_lat');
        $ne_lng = $request->get('ne_lng');
        $sw_lng = $request->get('sw_lat');

        $markers = PlaceSearchHistory::whereBetween('lat', array($sw_lat, $ne_lat))
                ->whereBetween('lng', array($sw_lng, $ne_lng))
                ->groupBy('lat', 'lng')
                ->select('lat', 'lng')
                ->get()
                ->toArray();
        return json_encode($markers);
    }

    public function delete_ajax(ManagePlaceRequest $request) {

        $ids = $request->input('ids');

        if (!empty($ids)) {
            $ids = explode(',', $request->input('ids'));
            foreach ($ids as $key => $value) {
                $this->delete_single_ajax($value);
            }
        }

        echo json_encode([
            'result' => true
        ]);
    }

    /**
     * @param Place $id
     * @param ManagePlaceRequest $request
     *
     * @return mixed
     */
    public function delete_single_ajax($id) {
        $item = Place::find($id);
        if (empty($item)) {
            return false;
        }
        /* Delete Children Tables Data of this country */
        $child = PlaceTranslations::where(['places_id' => $id])->get();
        if (!empty($child)) {
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->deleteMedias();
        $item->delete();

        AdminLogs::create(['item_type' => 'places', 'item_id' => $id, 'action' => 'delete', 'time' => time(), 'admin_id' => Auth::user()->id]);
    }

}
