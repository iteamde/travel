<?php

namespace App\Http\Controllers\Backend\Embassies;

use App\Models\Embassies\Embassies;
use App\Models\City\Cities;
use App\Models\AdminLogs\AdminLogs;
use Illuminate\Support\Facades\Auth;
use App\Models\Embassies\EmbassiesTranslations;
use App\Models\EmbassiesSearchHistory\EmbassiesSearchHistory;
use App\Http\Controllers\Controller;
use App\Models\Access\Language\Languages;
use App\Http\Requests\Backend\Embassies\ManageEmbassiesRequest;
use App\Http\Requests\Backend\Embassies\StoreEmbassiesRequest;
use App\Repositories\Backend\Embassies\EmbassiesRepository;
use App\Models\Country\Countries;

class EmbassiesController extends Controller
{
    protected $embassies;

    public function __construct(EmbassiesRepository $embassies)
    {
        $this->embassies = $embassies;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageCountryrRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageEmbassiesRequest $request)
    {
        return view('backend.embassies.index');
    }

    /**
     * @param ManageEmbassiesRequest $request
     *
     * @return mixed
     */
    public function create(ManageEmbassiesRequest $request)
    {
        /* Get All Countries */
        $countries = Countries::where(['active' => 1])->get();
        $countries_arr = [];

        foreach ($countries as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $countries_arr[$value->id] = $value->transsingle->title;
            }
        }

        return view('backend.embassies.create',[
            'countries' => $countries_arr,
        ]);
    }

    /**
     * @param StoreEmbassiesRequest $request
     *
     * @return mixed
     */
    public function store(StoreEmbassiesRequest $request)
    {
        $data = [];

        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $location = explode(',',$request->input('lat_lng') );

        /* Check if active field is enabled or disabled */
        $active = null;
        if(empty($request->input('active')) || $request->input('active') == 0){
            $active = 2;
        }else{
            $active = 1;
        }

        /* Send All Relations and Common fields Through $extra array */
        $extra = [
            'active' => $active,
            'country_id' =>  $request->input('country_id'),
            'lat' => $location[0],
            'lng' => $location[1],
        ];

        $this->embassies->create($data, $extra);

        return redirect()->route('admin.embassies.embassies.index')->withFlashSuccess('Embassy Created!');
    }

    /**
     * @param Embassies $id
     * @param ManageEmbassiesRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageEmbassiesRequest $request)
    {
        $item = Embassies::findOrFail($id);
        $item->deleteTrans();
        $item->delete();

        return redirect()->route('admin.embassies.embassies.index')->withFlashSuccess('Embassies Deleted Successfully');
    }

    /**
     * @param Embassies $id
     * @param ManageEmbassiesRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageEmbassiesRequest $request)
    {

        $data = [];
        $embassies = Embassies::findOrFail(['id' => $id]);
        $embassies = $embassies[0];

        foreach ($this->languages as $key => $language) {
            $model = EmbassiesTranslations::where([
                'languages_id' => $language->id,
                'embassies_id'   => $id
            ])->get();

            /* If Translation For Current Language Is Empty, Put Null in All The Fields */
            if(!empty($model[0])){

                $data['title_'.$language->id]           = $model[0]->title;
                $data['description_'.$language->id]     = $model[0]->description;
            }else{
                $data['title_'.$language->id]           = null;
                $data['description_'.$language->id]     = null;
            }
        }

        $data['lat_lng'] = $embassies['lat'] . ',' . $embassies['lng'];
        $data['active'] = $embassies['active'];
        $data['country_id'] = $embassies['countries_id'];

        $countries = Countries::where(['active' => 1])->get();
        $countries_arr = [];

        foreach ($countries as $key => $value) {
            if(isset($value->transsingle) && !empty($value->transsingle)){
                $countries_arr[$value->id] = $value->transsingle->title;
            }
        }

        return view('backend.embassies.edit')
            ->withLanguages($this->languages)
            ->withEmbassies($embassies)
            ->withEmbassiesid($id)
            ->withCountries($countries_arr)
            ->withData($data);
    }

    /**
     * @param Embassies            $id
     * @param ManageEmbassiesRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageEmbassiesRequest $request)
    {
        $embassies = Embassies::findOrFail(['id' => $id]);

        $data = [];

        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $location = explode( ',' , $request->input('lat_lng') );

        /* Check if active field is enabled or disabled */
        $active = null;
        if(empty($request->input('active')) || $request->input('active') == 0){
            $active = 2;
        }else{
            $active = 1;
        }

        /* Send All Relation and Common Fields Through $extra Array */
        $extra = [
            'active' => $active,
            'country_id' =>  $request->input('country_id'),
            'lat' => $location[0],
            'lng' => $location[1],
        ];

        $this->embassies->update($id , $embassies, $data , $extra);

        return redirect()->route('admin.embassies.embassies.index')
            ->withFlashSuccess('Embassies updated Successfully!');
    }

    /**
     * @param Embassies        $id
     * @param ManageEmbassiesRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageEmbassiesRequest $request)
    {
        $embassies = Embassies::findOrFail(['id' => $id]);
        $embassiesTrans = EmbassiesTranslations::where(['embassies_id' => $id])->get();
        $embassies = $embassies[0];

        /* Get Regions Information */
        $country = $embassies->country;
        $country = $country->transsingle;

        return view('backend.embassies.show')
            ->withEmbassies($embassies)
            ->withEmbassiestrans($embassiesTrans)
            ->withCountry($country);
    }

    /**
     * @param Embassies $embassies
     * @param $status
     * @param ManageEmbassiesRequest $request
     *
     * @return mixed
     */
    public function mark(Embassies $embassies, $status, ManageEmbassiesRequest $request)
    {
        $embassies->active = $status;
        $embassies->save();
        return redirect()->route('admin.embassies.embassies.index')
            ->withFlashSuccess('Embassies Status Updated!');
    }

    public function import(ManageEmbassiesRequest $request) {
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

        return view('backend.embassies.import', $data);
    }

    /**
     * @param ManagePlaceRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search($admin_logs_id = 0, $country_id = 0, $city_id = 0, $latlng = 0, ManageEmbassiesRequest $request) {
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
            $admin_logs->item_type = 'embassies';
            $admin_logs->item_id = 0;
            $admin_logs->action = 'search';
            $admin_logs->query = $queries;
            $admin_logs->time = time();
            $admin_logs->admin_id = Auth::user()->id;
            $admin_logs->save();
        }

        if (isset($query)) {

            $provider_ids = array();
            $get_provider_ids = Embassies::where('id', '>', 0)->select('provider_id')->get()->toArray();
            foreach ($get_provider_ids AS $gpi) {
                $provider_ids[] = $gpi['provider_id'];
            }
            $data['provider_ids'] = $provider_ids;

            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/embassies/go/' . ($city ? $city : 0) . '/' . $lat . '/' . $lng . '/' . $query);
            } elseif (time() % 4 == 1)  {
                $json = file_get_contents('http://db.travooodev.com/public/embassies/go/' . ($city ? $city : 0) . '/' . $lat . '/' . $lng . '/' . $query);
            } elseif (time() % 4 == 2)  {
                $json = file_get_contents('http://db.travoooapi.com/public/embassies/go/' . ($city ? $city : 0) . '/' . $lat . '/' . $lng . '/' . $query);
            } elseif (time() % 4 == 3)  {
                $json = file_get_contents('http://db.travoooapi.net/public/embassies/go/' . ($city ? $city : 0) . '/' . $lat . '/' . $lng . '/' . $query);
            }
            $result = json_decode($json);

            EmbassiesSearchHistory::create([
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

            return view('backend.embassies.importresults', $data);
        } else {
            return redirect()->route('admin.embassies.embassies.index')
                            ->withFlashSuccess('Done!');
        }
    }

    public function savesearch(ManageEmbassiesRequest $request) {
        $data['countries_id'] = $request->input('countries_id');
        $data['cities_id'] = $request->input('cities_id');
        $to_save = $request->input('save');
        $places = $request->input('place');

        //dd($request->all());

        if (is_array($to_save)) {
            foreach ($to_save AS $k => $v) {
                $p = new Embassies();
                $p->place_type = $places[$k]['types'];
                $p->provider_id = $places[$k]['provider_id'];
                $p->countries_id = $data['countries_id'];
                $p->cities_id = $data['cities_id'];
                //$p->places_id = 1;
                $p->lat = $places[$k]['lat'];
                $p->lng = $places[$k]['lng'];
                $p->rating = $places[$k]['rating'];
                $p->active = 1;
                $p->save();
                //dd($p->id);

                $pt = new EmbassiesTranslations();
                $pt->languages_id = 1;
                $pt->embassies_id = $p->id;
                $pt->title = $places[$k]['name'];
                $pt->address = $places[$k]['address'];
                if (isset($places[$k]['phone']))
                    $pt->phone = $places[$k]['phone'];
                if (isset($places[$k]['website']))
                    $pt->description = $places[$k]['website'];
                $pt->working_days = $places[$k]['working_days'] ? $places[$k]['working_days'] : '';
                $pt->save();
                AdminLogs::create(['item_type' => 'embassies', 'item_id' => $p->id, 'action' => 'import', 'query' => '', 'time' => time(), 'admin_id' => Auth::user()->id]);
            }
            //die();
            $num = count($to_save);

            if ($request->input('admin_logs_id')) {
                //die();
                return redirect()->route('admin.embassies.embassies.search', array($request->get('admin_logs_id'),
                                    $request->get('countries_id'),
                                    $request->get('cities_id'),
                                    $request->get('latlng')))
                                ->withFlashSuccess($num . ' Embassies imported successfully!');
            } else {
                return redirect()->route('admin.embassies.embassies.index')
                                ->withFlashSuccess($num . ' Embassies imported successfully!');
            }
        } else {
            if ($request->input('admin_logs_id')) {
                //die();
                return redirect()->route('admin.embassies.embassies.search', array($request->get('admin_logs_id'),
                                    $request->get('countries_id'),
                                    $request->get('cities_id'),
                                    $request->get('latlng')))
                                ->withFlashSuccess('You didnt select any items to import!');
            } else {
            return redirect()->route('admin.embassies.embassies.index')
                            ->withFlashError('You didnt select any items to import!');
            }
        }
    }

    public function return_search_history(ManageEmbassiesRequest $request) {
        //dd($request->all());
        $ne_lat = $request->get('ne_lat');
        $sw_lat = $request->get('sw_lat');
        $ne_lng = $request->get('ne_lng');
        $sw_lng = $request->get('sw_lat');

        $markers = EmbassiesSearchHistory::whereBetween('lat', array($sw_lat, $ne_lat))
                ->whereBetween('lng', array($sw_lng, $ne_lng))
                ->groupBy('lat', 'lng')
                ->select('lat', 'lng')
                ->get()
                ->toArray();
        return json_encode($markers);
    }

    public function delete_ajax(ManageEmbassiesRequest $request){

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
     * @param Embassies $id
     * @param ManageEmbassiesRequest $request
     *
     * @return mixed
     */
    public function delete_single_ajax($id) {
        $item = Embassies::find($id);
        if(empty($item)){
            return false;
        }
        $item->trans()->delete();
        $item->delete();

        AdminLogs::create(['item_type' => 'embassies', 'item_id' => $id, 'action' => 'delete', 'time' => time(), 'admin_id' => Auth::user()->id]);
    }
}