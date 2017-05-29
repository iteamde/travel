<?php

namespace App\Http\Controllers\Backend\SafetyDegrees;

use App\Models\Access\language\Languages;
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
     * @param Languages              $language
     * @param ManageLanguagesRequest $request
     *
     * @return mixed
     */
    public function edit(Languages $language, ManageSafetyDegreesRequest $request)
    {
        return view('backend.safety-degrees.edit')
            ->withLanguages($language);
    }

    /**
     * @param Languages             $language
     * @param UpdateLanguageRequest $request
     *
     * @return mixed
     */
    public function update(Languages $language, UpdateSafetyDegreesRequest $request)
    {
        $this->degrees->update($language, [
            'data' => [
                'title'  => $request->input('title'),
                'code'   => $request->input('code'),
                'active' => $request->input('active'),
            ]
        ]);

        return redirect()->route('admin.access.languages.index')->withFlashSuccess(trans('alerts.backend.language.updated'));
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
     * @param Language   $language
     * @param ManageLanguagesRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageSafetyDegreesRequest $request)
    {
        $item = Languages::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.access.languages.index')->withFlashSuccess(trans('alerts.backend.language.deleted'));
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
}