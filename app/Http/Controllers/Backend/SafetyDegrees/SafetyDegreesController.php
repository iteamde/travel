<?php

namespace App\Http\Controllers\Backend\SafetyDegrees;

use App\Models\Access\language\Languages;
use App\Models\SafetyDegree\SafetyDegree;
use App\Models\SafetyDegree\SafetyDegreeTrans;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SafetyDegrees\ManageSafetyDegreesRequest;
use App\Http\Requests\Backend\SafetyDegrees\StoreSafetyDegreesRequest;
use App\Repositories\Backend\SafetyDegrees\SafetyDegreesRepository;
use App\Http\Requests\Backend\SafetyDegrees\UpdateSafetyDegreesRequest;

class SafetyDegreesController extends Controller
{
    protected $degrees;
    protected $languages;

    public function __construct(SafetyDegreesRepository $degrees)
    {
        $this->degrees = $degrees;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageLanguagesRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageSafetyDegreesRequest $request)
    {
        return view('backend.safety-degrees.index');
    }

    /**
     * @param ManageLanguagesRequest $request
     *
     * @return mixed
     */
    public function create(ManageSafetyDegreesRequest $request)
    {
        return view('backend.safety-degrees.create');
    }


    /**
     * @param SafetyDegres $safetudegree
     * @param ManageSafetyDegreesRequest $request
     *
     * @return mixed
     */
    public function edit($safetydegree, ManageSafetyDegreesRequest $request)
    {   
        $id = $safetydegree;
        $data = [];
        $safetydegree = SafetyDegree::findOrFail(['id' => $safetydegree]);
        

        foreach ($this->languages as $key => $language) {
            $model = SafetyDegreeTrans::where([
                'languages_id' => $language->id,
                'safety_degrees_id'   => $id
            ])->get();

            $data['title_'.$language->id] = $model[0]->title;
            $data['description_'.$language->id] = $model[0]->description;
        }

        return view('backend.safety-degrees.edit')
            ->withLanguages($this->languages)
            ->withSafetydegrees($safetydegree)
            ->withSafetyid($id)
            ->withData($data);
    }

    /**
     * @param Languages             $language
     * @param UpdateLanguageRequest $request
     *
     * @return mixed
     */
    public function update($safetydegree, UpdateSafetyDegreesRequest $request)
    {   
        $id = $safetydegree;
        $safetydegree = SafetyDegree::findOrFail(['id' => $safetydegree]);
        
        $data = [];

        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }
        
        $this->degrees->update($id , $safetydegree, $data);

        return redirect()->route('admin.safety-degrees.safety.index')
            ->withFlashSuccess('Safety Degree updated Successfully!');
    }

    /**
     * @param StoreRoleRequest $request
     *
     * @return mixed
     */
    public function store(StoreSafetyDegreesRequest $request)
    {   
        $data = [];
       
        foreach ($this->languages as $key => $language) {

            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $this->degrees->create($data);

        return redirect()->route('admin.safety-degrees.index')->withFlashSuccess(trans('alerts.backend.language.created'));
    }

    /**
     * @param SafetyDegrees $id
     * @param ManageSafetyDegreesRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageSafetyDegreesRequest $request)
    {
        $item = SafetyDegree::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.safety-degrees.index')->withFlashSuccess(trans('alerts.backend.language.deleted'));
    }

    /**
     * @param Languages $language
     * @param $status
     * @param ManageLanguagesRequest $request
     *
     * @return mixed
     */
    public function mark(Languages $language, $status, ManageSafetyDegreesRequest $request)
    {
        $language->active = $status;
        $language->save();
        return redirect()->route('admin.access.languages.index')->withFlashSuccess(trans('alerts.backend.language.updated'));
    }

    /**
     * @param SafetyDegrees        $degree
     * @param ManageRegionsRequest $request
     *
     * @return mixed
     */
    public function show($degree, ManageSafetyDegreesRequest $request)
    {   $id = $degree;
        $degree = SafetyDegree::findOrFail(['id' => $id]);
        $degreeTrans = SafetyDegreeTrans::where(['safety_degrees_id' => $id])->get();
        
        return view('backend.safety-degrees.show')
            ->withDegree($degree)
            ->withDegreetrans($degreeTrans);
    }
}