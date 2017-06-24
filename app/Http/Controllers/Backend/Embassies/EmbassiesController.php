<?php

namespace App\Http\Controllers\Backend\Embassies;

use App\Models\Embassies\Embassies;
use App\Models\Embassies\EmbassiesTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;
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
}