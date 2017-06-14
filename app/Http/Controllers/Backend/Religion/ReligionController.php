<?php

namespace App\Http\Controllers\Backend\Religion;

use App\Models\Religion\Religion;
use App\Models\Religion\ReligionTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;
use App\Http\Requests\Backend\Religion\ManageReligionRequest;
use App\Http\Requests\Backend\Religion\StoreReligionRequest;
use App\Repositories\Backend\Religion\ReligionRepository;

class ReligionController extends Controller
{
    protected $religions;

    public function __construct(ReligionRepository $religions)
    {
        $this->religions = $religions;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageReligionRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageReligionRequest $request)
    {
        return view('backend.religion.index');
    }

    /**
     * @param ManageReligionRequest $request
     *
     * @return mixed
     */
    public function create(ManageReligionRequest $request)
    {   
       
        return view('backend.religion.create',[
        ]);
    }

    /**
     * @param StoreReligionRequest $request
     *
     * @return mixed
     */
    public function store(StoreReligionRequest $request)
    {   
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
        }

        if($request->input('active') == 1){
            $active = 1;
        }else{
            $active = 2;
        }
        
        $extra = [
            'active' => $active
        ];

        $this->religions->create($data,$extra);

        return redirect()->route('admin.religion.religion.index')->withFlashSuccess('Religion Created!');
    }

    /**
     * @param activitytypes $id
     * @param ManageReligionRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageReligionRequest $request)
    {      
        $item = Religion::findOrFail($id);
        /* Delete Children Tables Data of this country */
        $child = ReligionTranslations::where(['religions_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.religion.religion.index')->withFlashSuccess('Religion Deleted Successfully');
    }

    /**
     * @param activitytypes $id
     * @param ManageReligionRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageReligionRequest $request)
    {   
        
        $data = [];
        $religion = Religion::findOrFail(['id' => $id]);
        $religion = $religion[0];

        foreach ($this->languages as $key => $language) {
            $model = ReligionTranslations::where([
                'languages_id' => $language->id,
                'religions_id'   => $id
            ])->get();

            if(!empty($model[0])){
                $data['title_'.$language->id] = $model[0]->title;
            }else{
                $data['title_'.$language->id] = null;
            }
        }

        $data['active'] = $religion->active;

        return view('backend.religion.edit')
            ->withLanguages($this->languages)
            ->withReligion($religion)
            ->withReligionid($id)
            ->withData($data);
    }

    /**
     * @param activitytypes            $id
     * @param ManageReligionRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageReligionRequest $request)
    {   
        $interest = Religion::findOrFail(['id' => $id]);
        
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
        }

        if($request->input('active') == 1){
            $active = 1;
        }else{
            $active = 2;
        }
        
        $extra = [
            'active' => $active
        ];

        $this->religions->update($id , $interest, $data , $extra);

        return redirect()->route('admin.religion.religion.index')
            ->withFlashSuccess('Religion updated Successfully!');
    }

    /**
     * @param Activity Types        $id
     * @param ManageReligionRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageReligionRequest $request)
    {   
        $religion = Religion::findOrFail(['id' => $id]);
        $religionTrans = ReligionTranslations::where(['religions_id' => $id])->get();
        $religion = $religion[0];
       
        return view('backend.religion.show')
            ->withReligion($religion)
            ->withReligiontrans($religionTrans);
    }

    /**
     * @param Activity Types $religion
     * @param $status
     * @param ManageReligionRequest $request
     *
     * @return mixed
     */
    public function mark(Religion $religion, $status, ManageReligionRequest $request)
    {
        $religion->active = $status;
        $religion->save();
        return redirect()->route('admin.religion.religion.index')
            ->withFlashSuccess('Religion Status Updated!');
    }
}