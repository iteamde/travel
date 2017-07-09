<?php

namespace App\Http\Controllers\Backend\Lifestyle;

use App\Models\Access\Language\Languages;
use App\Models\Lifestyle\Lifestyle;
use App\Models\Lifestyle\LifestyleTrans;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Lifestyle\ManageLifestyleRequest;
use App\Http\Requests\Backend\Lifestyle\StoreLifestyleRequest;
use App\Repositories\Backend\Lifestyle\LifestyleRepository;
use App\Http\Requests\Backend\Lifestyle\UpdateLifestyleRequest;

class LifestyleController extends Controller
{
    protected $lifestyle;
    protected $languages;

    public function __construct( LifestyleRepository $lifestyle)
    {
        $this->lifestyle = $lifestyle;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageLanguagesRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageLifestyleRequest $request)
    {
        return view('backend.lifestyle.index');
    }

    /**
     * @param ManageLanguagesRequest $request
     *
     * @return mixed
     */
    public function create(ManageLifestyleRequest $request)
    {
        return view('backend.lifestyle.create');
    }


    /**
     * @param SafetyDegres $safetudegree
     * @param ManageSafetyDegreesRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageLifestyleRequest $request)
    {   
        
        $data = [];
        $lifestyle = Lifestyle::findOrFail(['id' => $id]);
        
        foreach ($this->languages as $key => $language) {
            $model = LifestyleTrans::where([
                'languages_id' => $language->id,
                'lifestyles_id'   => $id
            ])->get();

            if(!empty($model[0])){
                
                $data['title_'.$language->id]       = $model[0]->title;
                $data['description_'.$language->id] = $model[0]->description;
            
            }else{

                $data['title_'.$language->id]       = null;
                $data['description_'.$language->id] = null;
            
            }
        }

        return view('backend.lifestyle.edit')
            ->withLanguages($this->languages)
            ->withLifestyle($lifestyle)
            ->withLifestyleid($id)
            ->withData($data);
    }

    /**
     * @param Languages             $language
     * @param UpdateLanguageRequest $request
     *
     * @return mixed
     */
    public function update($id, UpdateLifestyleRequest $request)
    {   
        
        $lifestyle = Lifestyle::findOrFail(['id' => $id]);
        
        $data = [];

        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }
        
        $this->lifestyle->update($id , $lifestyle, $data);

        return redirect()->route('admin.lifestyle.lifestyle.index')
            ->withFlashSuccess('Life Style updated Successfully!');
    }

    /**
     * @param StoreLifestyleRequest $request
     *
     * @return mixed
     */
    public function store(StoreLifestyleRequest $request)
    {   
        $data = [];
       
        foreach ($this->languages as $key => $language) {

            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $this->lifestyle->create($data);

        return redirect()->route('admin.lifestyle.lifestyle.index')->withFlashSuccess('Lifestyle Created Successfully');
    }

    /**
     * @param Lifestyle $id
     * @param ManageSafetyDegreesRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageLifestyleRequest $request)
    {
        $item = Lifestyle::findOrFail($id);
        /* Delete Children Tables Data of this country */
        $child = LifestyleTrans::where(['lifestyles_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.lifestyle.lifestyle.index')->withFlashSuccess('Life Style Deleted Successfully');
    }

    /**
     * @param Lifestyle        $degree
     * @param ManageRegionsRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageLifestyleRequest $request)
    {   
        $lifestyle = Lifestyle::findOrFail(['id' => $id]);
        $lifestyleTrans = LifestyleTrans::where(['lifestyles_id' => $id])->get();
        
        return view('backend.lifestyle.show')
            ->withLifestyle($lifestyle)
            ->withLifestyletrans($lifestyleTrans);
    }
}