<?php

namespace App\Http\Controllers\Backend\Cultures;

use App\Models\Cultures\Cultures;
use App\Models\Cultures\CulturesTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;
use App\Http\Requests\Backend\Cultures\ManageCulturesRequest;
use App\Http\Requests\Backend\Cultures\StoreCulturesRequest;
use App\Repositories\Backend\Cultures\CulturesRepository;

class CulturesController extends Controller
{
    protected $cultures;

    public function __construct(CulturesRepository $cultures)
    {
        $this->cultures = $cultures;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageCulturesRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageCulturesRequest $request)
    {
        return view('backend.cultures.index');
    }

    /**
     * @param ManageCulturesRequest $request
     *
     * @return mixed
     */
    public function create(ManageCulturesRequest $request)
    {   
        return view('backend.cultures.create',[
        ]);
    }

    /**
     * @param StoreCulturesRequest $request
     *
     * @return mixed
     */
    public function store(StoreCulturesRequest $request)
    {   
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $this->cultures->create($data);

        return redirect()->route('admin.cultures.cultures.index')->withFlashSuccess('Culture Created!');
    }

    /**
     * @param Cultures $id
     * @param ManageCulturesRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageCulturesRequest $request)
    {      
        $item = Cultures::findOrFail($id);
        /* Delete Children Tables Data of this Culture */
        $child = CulturesTranslations::where(['cultures_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.cultures.cultures.index')->withFlashSuccess('Culture Deleted Successfully');
    }

    /**
     * @param Cultures $id
     * @param ManageCulturesRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageCulturesRequest $request)
    {   
        
        $data = [];
        $cultures = Cultures::findOrFail(['id' => $id]);
        $cultures = $cultures[0];

        foreach ($this->languages as $key => $language) {
            $model = CulturesTranslations::where([
                'languages_id' => $language->id,
                'cultures_id'   => $id
            ])->get();

            if(!empty($model[0])){
                $data['title_'.$language->id]       = $model[0]->title;
                $data['description_'.$language->id] = $model[0]->description;   
            }else{
                $data['title_'.$language->id]       = null;
                $data['description_'.$language->id] = null;
            }
        }

        return view('backend.cultures.edit')
            ->withLanguages($this->languages)
            ->withCultures($cultures)
            ->withCulturesid($id)
            ->withData($data);
    }

    /**
     * @param Cultures $id
     * @param ManageCulturesRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageCulturesRequest $request)
    {   
        $cultures = Cultures::findOrFail(['id' => $id]);
        
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $this->cultures->update($id , $cultures, $data);
        
        return redirect()->route('admin.cultures.cultures.index')
            ->withFlashSuccess('Cultures updated Successfully!');
    }

    /**
     * @param Cultures  $id
     * @param ManageCulturesRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageCulturesRequest $request)
    {   
        $cultures = Cultures::findOrFail(['id' => $id]);
        $culturesTrans = CulturesTranslations::where(['cultures_id' => $id])->get();
        $cultures = $cultures[0];
       
        return view('backend.cultures.show')
            ->withCultures($cultures)
            ->withCulturestrans($culturesTrans);
    }
}