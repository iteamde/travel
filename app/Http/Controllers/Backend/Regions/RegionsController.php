<?php

namespace App\Http\Controllers\Backend\Regions;

use App\Models\Regions\Regions;
use App\Models\Access\language\Languages;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Regions\ManageRegionsRequest;
use App\Http\Requests\Backend\Regions\StoreRegionsRequest;
use App\Repositories\Backend\Regions\RegionsRepository;
use App\Models\Regions\RegionsTranslation;
use App\Http\Requests\Backend\Regions\UpdateRegionsRequest;
use App\Models\ActivityMedia\Media;

class RegionsController extends Controller
{
    protected $regions;
    protected $languages;

    public function __construct(RegionsRepository $regions)
    {
        $this->regions = $regions;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageLanguagesRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageRegionsRequest $request)
    {
        return view('backend.regions.index');
    }

    /**
     * @param ManageLanguagesRequest $request
     *
     * @return mixed
     */
    public function create(ManageRegionsRequest $request)
    {   
        /* Get All Medias In System For Dropdown */
        $medias = Media::get();
        $medias_arr = [];

        if(!empty($medias)){
            foreach ($medias as $key => $value) {
                if( isset($value->transsingle) && !empty($value->transsingle) ){
                    $medias_arr[$value->id] = $value->transsingle->title;
                }
            }
        }

        return view('backend.regions.create')
            ->withLanguages($this->languages)
            ->withMedias($medias_arr);
    }


    /**
     * @param Regions              $language
     * @param ManageRegionsRequest $request
     *
     * @return mixed
     */
    public function edit(Regions $region, ManageRegionsRequest $request)
    {
        $data = [];

        foreach ($this->languages as $key => $language) {
            /* Find Translation Model For Current Language */
            $model = RegionsTranslation::where([
                'languages_id' => $language->id,
                'regions_id'   => $region->id
            ])->get();
            
            /* If Translation For Current Language Not Found, Put Null In All Fields */
            if(!empty($model[0])){
                $data['title_'.$language->id] = $model[0]->title;
            }else{
                $data['title_'.$language->id] = null;
            }
        }

        $data['active'] = $region->active;

        /* Get All Selected Medias Of $region */
        $selected_medias = $region->medias;
        $selected_medias_arr = [];

        if(!empty($selected_medias)){
            foreach ($selected_medias as $key => $value) {
                array_push($selected_medias_arr,$value->medias_id);
            }
        }
        
        $data['selected_medias'] = $selected_medias_arr;

        /* Get All Medias In System */
        $medias = Media::get();
        $medias_arr = [];

        if(!empty($medias)){
            foreach ($medias as $key => $value) {
                if( isset($value->transsingle) && !empty($value->transsingle) ){
                    $medias_arr[$value->id] = $value->transsingle->title;
                }
            }
        }

        return view('backend.regions.edit')
            ->withLanguages($this->languages)
            ->withRegions($region)
            ->withData($data)
            ->withMedias($medias_arr);
    }

    /**
     * @param Regions              $region
     * @param UpdateRegionsRequest $request
     *
     * @return mixed
     */
    public function update(Regions $region, UpdateRegionsRequest $request)
    {
        $data = [];

        foreach ($this->languages as $key => $language) {
            $data['title_'.$language->id] = $request->input('title_'.$language->id);
        }

        $active = 2;
        if(!empty($request->input('active'))){
            $active = 1;
        }else{
            $active = 2;
        }

        /* Pass All Relations Through $extra Array */
        $extra = [
            'medias' => $request->input('medias_id')
        ];
        $this->regions->update($region, $data, $active ,$extra);

        return redirect()->route('admin.location.regions.index')
            ->withFlashSuccess('Region updated Successfully!');
    }

    /**
     * @param StoreRoleRequest $request
     *
     * @return mixed
     */
    public function store(StoreRegionsRequest $request)
    {
        $data = [];

        foreach ($this->languages as $key => $language) {
            $data['title_'.$language->id] = $request->input('title_'.$language->id);
        }

        $active = 2;
        if(!empty($request->input('active'))){
            $active = 1;
        }else{
            $active = 2;
        }

        /* Pass All Relations Through $extra Array */
        $extra = [
            'medias' => $request->input('medias_id')
        ];

        $this->regions->create($data, $active ,$extra);

        return redirect()->route('admin.location.regions.index')->withFlashSuccess('Region Created!');
    }

    /**
     * @param Language   $language
     * @param ManageLanguagesRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageRegionsRequest $request)
    {
        $item = Regions::findOrFail($id);
        if(!empty($item)) {
            $model = RegionsTranslation::where("regions_id", $id)->get();
            foreach ($model as $key => $trans) {
                $trans->delete();
            }
            $item->delete();

            return redirect()->route('admin.location.regions.index')
                ->withFlashSuccess("Region Successfully Removed!");
        }

        throw new GeneralException('Invalid Request');
    }

    /**
     * @param Languages $language
     * @param $status
     * @param ManageLanguagesRequest $request
     *
     * @return mixed
     */
    public function mark(Regions $region, $status, ManageRegionsRequest $request)
    {
        $region->active = $status;
        $region->save();
        return redirect()->route('admin.location.regions.index')
            ->withFlashSuccess('Region Status Updated!');
    }

    /**
     * @param Regions              $region
     * @param ManageRegionsRequest $request
     *
     * @return mixed
     */
    public function show(Regions $region, ManageRegionsRequest $request)
    {
        /* Get Selected Medias Of $region */
        $selected_medias = $region->medias;
        $selected_medias_arr = [];

        if(!empty($selected_medias)){
            foreach ($selected_medias as $key => $value) {
                if(!empty($value->media)){
                    $value = $value->media;
                    if(!empty($value->transsingle)){
                        array_push($selected_medias_arr , $value->transsingle->title );
                    }
                }
            }
        }

        return view('backend.regions.show')
            ->withRegions($region)
            ->withMedias($selected_medias_arr);
    }
}