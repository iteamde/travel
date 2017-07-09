<?php

namespace App\Http\Controllers\Backend\Access\Languages;

use App\Models\Access\Language\Languages;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\Language\ManageLanguagesRequest;
use App\Http\Requests\Backend\Access\Language\StoreLanguageRequest;
use App\Repositories\Backend\Access\Languages\LanguagesRepository;
use App\Http\Requests\Backend\Access\Language\UpdateLanguageRequest;

class LanguagesController extends Controller
{
    protected $languages;

    public function __construct(LanguagesRepository $languages)
    {
        $this->languages = $languages;
    }

     /**
     * @param ManageLanguagesRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageLanguagesRequest $request)
    {
        return view('backend.access.language.index');
    }

    /**
     * @param ManageLanguagesRequest $request
     *
     * @return mixed
     */
    public function create(ManageLanguagesRequest $request)
    {
        return view('backend.access.language.create');
    }


    /**
     * @param Languages              $language
     * @param ManageLanguagesRequest $request
     *
     * @return mixed
     */
    public function edit(Languages $language, ManageLanguagesRequest $request)
    {
        return view('backend.access.language.edit')
            ->withLanguages($language);
    }

    /**
     * @param Languages             $language
     * @param UpdateLanguageRequest $request
     *
     * @return mixed
     */
    public function update(Languages $language, UpdateLanguageRequest $request)
    {
        $this->languages->update($language, [
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
    public function store(StoreLanguageRequest $request)
    {
        $this->languages->create($request->only('title', 'code', 'active'));

        return redirect()->route('admin.access.languages.index')->withFlashSuccess(trans('alerts.backend.language.created'));
    }

    /**
     * @param Language   $language
     * @param ManageLanguagesRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageLanguagesRequest $request)
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
    public function mark(Languages $language, $status, ManageLanguagesRequest $request)
    {
        $language->active = $status;
        $language->save();
        return redirect()->route('admin.access.languages.index')->withFlashSuccess(trans('alerts.backend.language.updated'));
    }
}