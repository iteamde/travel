<?php

namespace App\Http\Controllers\Backend\LanguagesSpoken;

use App\Models\LanguagesSpoken\LanguagesSpoken;
use App\Models\Access\Language\Languages;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\LanguagesSpoken\ManageLanguagesSpokenRequest;
use App\Http\Requests\Backend\LanguagesSpoken\StoreLanguagesSpokenRequest;
use App\Repositories\Backend\LanguagesSpoken\LanguagesSpokenRepository;
use App\Models\LanguagesSpoken\LanguagesSpokenTranslation;
use App\Http\Requests\Backend\LanguagesSpoken\UpdateLanguagesSpokenRequest;

class LanguagesSpokenController extends Controller
{
    protected $languages_spoken;
    protected $languages;

    public function __construct(LanguagesSpokenRepository $languages_spoken)
    {
        $this->languages_spoken = $languages_spoken;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageLanguagesSpokenRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageLanguagesSpokenRequest $request)
    {
        return view('backend.languages_spoken.index');
    }

    /**
     * @param ManageLanguagesSpokenRequest $request
     *
     * @return mixed
     */
    public function create(ManageLanguagesSpokenRequest $request)
    {
        return view('backend.languages_spoken.create')
            ->withLanguages($this->languages);
    }

    /**
     * @param LanguagesSpoken              $language_spoken
     * @param ManageLanguagesSpokenRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageLanguagesSpokenRequest $request)
    {
        $language_spoken = LanguagesSpoken::findOrFail(['id' => $id]);
        $language_spoken =  $language_spoken[0];
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $model = LanguagesSpokenTranslation::where([
                'languages_id' => $language->id,
                'languages_spoken_id'   => $language_spoken->id
            ])->get();

            if(!empty($model[0])){
                $data['title_'.$language->id]       = $model[0]->title;
                $data['description_'.$language->id] = $model[0]->description;
            }else{
                $data['title_'.$language->id]       = null;
                $data['description_'.$language->id] = null;
            }
        }
        
        $data['active'] = $language_spoken->active;

        return view('backend.languages_spoken.edit')
            ->withLanguages($this->languages)
            ->withLanguage_spoken($language_spoken)
            ->withLanguage_spokenid($id)
            ->withData($data);
    }

    /**
     * @param LanguagesSpoken $id
     * @param UpdateLanguagesSpokenRequest $request
     *
     * @return mixed
     */
    public function update($id, UpdateLanguagesSpokenRequest $request)
    {
        $language_spoken = LanguagesSpoken::findOrFail(['id' => $id]);
        $language_spoken =  $language_spoken[0];
        $data = [];
       
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $active = 2;
       
        if(!empty($request->input('active'))){
            $active = 1;
        }else{
            $active = 2;
        }
    

        $this->languages_spoken->update($id, $language_spoken, $data, $active);

        return redirect()->route('admin.languagesspoken.languagesspoken.index')
            ->withFlashSuccess('Languages Spoken updated Successfully!');
    }

    /**
     * @param StoreRoleRequest $request
     *
     * @return mixed
     */
    public function store(StoreLanguagesSpokenRequest $request)
    {
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $active = 2;
       
        if(!empty($request->input('active'))){
            $active = 1;
        }else{
            $active = 2;
        }

        $this->languages_spoken->create($data, $active );

        return redirect()->route('admin.languagesspoken.languagesspoken.index')->withFlashSuccess('Languages Spoken Created!');
    }

    /**
     * @param Language   $language
     * @param ManageLanguagesRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageLanguagesSpokenRequest $request)
    {
        $item = LanguagesSpoken::findOrFail($id);
        if(!empty($item)) {
            $model = LanguagesSpokenTranslation::where("languages_spoken_id", $id)->get();
            foreach ($model as $key => $trans) {
                $trans->delete();
            }
            $item->delete();

            return redirect()->route('admin.languagesspoken.languagesspoken.index')
                ->withFlashSuccess("Languages Spoken Successfully Removed!");
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
    public function mark($id, $status, ManageLanguagesSpokenRequest $request)
    {   
        $languagesspoken = LanguagesSpoken::findOrFail(['id' => $id]);
        $languagesspoken = $languagesspoken[0];
        $languagesspoken->active = $status;
        $languagesspoken->save();
        return redirect()->route('admin.languagesspoken.languagesspoken.index')
            ->withFlashSuccess('Region Status Updated!');
    }

    /**
     * @param Regions              $region
     * @param ManageLanguagesSpokenRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageLanguagesSpokenRequest $request)
    {   
        $languagesspoken = LanguagesSpoken::findOrFail(['id' => $id]);
        $languagesspoken = $languagesspoken[0];
        $languagespokenTrans = LanguagesSpokenTranslation::where(['languages_spoken_id' => $id])->get();
       

        return view('backend.languages_spoken.show')
            ->withLanguagespoken($languagesspoken)
            ->withLanguagespokentrans($languagespokenTrans);
    }
}