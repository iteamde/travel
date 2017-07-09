<?php

namespace App\Http\Controllers\Backend\ActivityTypes;

use App\Models\ActivityTypes\ActivityTypes;
use App\Models\ActivityTypes\ActivityTypesTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\Language\Languages;
use App\Http\Requests\Backend\ActivityTypes\ManageActivityTypesRequest;
use App\Http\Requests\Backend\ActivityTypes\StoreActivityTypesRequest;
use App\Repositories\Backend\ActivityTypes\ActivityTypesRepository;

class ActivityTypesController extends Controller
{
    protected $activitytypes;

    public function __construct(ActivityTypesRepository $activitytypes)
    {
        $this->activitytypes = $activitytypes;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageActivityTypesRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageActivityTypesRequest $request)
    {
        return view('backend.activity-types.index');
    }

    /**
     * @param ManageActivityTypesRequest $request
     *
     * @return mixed
     */
    public function create(ManageActivityTypesRequest $request)
    {   
       
        return view('backend.activity-types.create',[
        ]);
    }

    /**
     * @param StoreActivityTypesRequest $request
     *
     * @return mixed
     */
    public function store(StoreActivityTypesRequest $request)
    {   
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id); 
        }

        $this->activitytypes->create($data);

        return redirect()->route('admin.activities.activitytypes.index')->withFlashSuccess('Activity type Created!');
    }

    /**
     * @param activitytypes $id
     * @param ManageActivityTypesRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageActivityTypesRequest $request)
    {
        $item = ActivityTypes::findOrFail($id);
        /* Delete Children Tables Data of this country */
        $child = ActivityTypesTranslations::where(['activities_types_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.activities.activitytypes.index')->withFlashSuccess('Actiivty Type Deleted Successfully');
    }

    /**
     * @param activitytypes $id
     * @param ManageActivityTypesRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageActivityTypesRequest $request)
    {   
        
        $data = [];
        $activitytype = ActivityTypes::findOrFail(['id' => $id]);
        $activitytype = $activitytype[0];

        foreach ($this->languages as $key => $language) {
            $model = ActivityTypesTranslations::where([
                'languages_id' => $language->id,
                'activities_types_id'   => $id
            ])->get();

            if(!empty($model[0])){
                $data['title_'.$language->id]       = $model[0]->title;
                $data['description_'.$language->id] = $model[0]->description;
            }else{
                $data['title_'.$language->id]       = null;
                $data['description_'.$language->id] = null;
            }
        }

        return view('backend.activity-types.edit')
            ->withLanguages($this->languages)
            ->withActivitytype($activitytype)
            ->withActivitytypeid($id)
            ->withData($data);
    }

    /**
     * @param activitytypes            $id
     * @param ManageActivityTypesRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageActivityTypesRequest $request)
    {   
        $activitytype = ActivityTypes::findOrFail(['id' => $id]);
        
        $data = [];

        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $this->activitytypes->update($id , $activitytype, $data);

        return redirect()->route('admin.activities.activitytypes.index')
            ->withFlashSuccess('Activity Type updated Successfully!');
    }

    /**
     * @param Activity Types        $id
     * @param ManageActivityTypesRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageActivityTypesRequest $request)
    {   
        $activitytype = ActivityTypes::findOrFail(['id' => $id]);
        $activitytypeTrans = ActivityTypesTranslations::where(['activities_types_id' => $id])->get();
        $activitytype = $activitytype[0];
       
        return view('backend.activity-types.show')
            ->withActivitytype($activitytype)
            ->withActivitytypetrans($activitytypeTrans);
    }

    /**
     * @param Activity Types $countries
     * @param $status
     * @param ManageActivityTypesRequest $request
     *
     * @return mixed
     */
    public function mark(Countries $country, $status, ManageActivityTypesRequest $request)
    {
        $country->active = $status;
        $country->save();
        return redirect()->route('admin.location.country.index')
            ->withFlashSuccess('Country Status Updated!');
    }
}