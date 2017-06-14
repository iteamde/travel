<?php

namespace App\Http\Controllers\Backend\EmergencyNumbers;

use App\Models\EmergencyNumbers\EmergencyNumbers;
use App\Models\EmergencyNumbers\EmergencyNumbersTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;
use App\Http\Requests\Backend\EmergencyNumbers\ManageEmergencyNumbersRequest;
use App\Http\Requests\Backend\EmergencyNumbers\StoreEmergencyNumbersRequest;
use App\Repositories\Backend\EmergencyNumbers\EmergencyNumbersRepository;

class EmergencyNumbersController extends Controller
{
    protected $emergencynumbers;

    public function __construct(EmergencyNumbersRepository $emergencynumbers)
    {
        $this->emergencynumbers = $emergencynumbers;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageEmergencyNumbersRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageEmergencyNumbersRequest $request)
    {
        return view('backend.emergencynumbers.index');
    }

    /**
     * @param ManageEmergencyNumbersRequest $request
     *
     * @return mixed
     */
    public function create(ManageEmergencyNumbersRequest $request)
    {   
       
        return view('backend.emergencynumbers.create',[
        ]);
    }

    /**
     * @param StoreEmergencyNumbersRequest $request
     *
     * @return mixed
     */
    public function store(StoreEmergencyNumbersRequest $request)
    {   
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $this->emergencynumbers->create($data);

        return redirect()->route('admin.emergencynumbers.emergencynumbers.index')->withFlashSuccess('Emergency Numbers Created!');
    }

    /**
     * @param Emergency Numbers $id
     * @param ManageEmergencyNumbersRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageEmergencyNumbersRequest $request)
    {      
        $item = EmergencyNumbers::findOrFail($id);
        /* Delete Children Tables Data of this emergencynumbers */
        $child = EmergencyNumbersTranslations::where(['emergency_numbers_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.emergencynumbers.emergencynumbers.index')->withFlashSuccess('Emergency Numbers Deleted Successfully');
    }

    /**
     * @param Emergency Numbers $id
     * @param ManageEmergencyNumbersRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageEmergencyNumbersRequest $request)
    {   
        
        $data = [];
        $emergencynumbers = EmergencyNumbers::findOrFail(['id' => $id]);
        $emergencynumbers = $emergencynumbers[0];

        foreach ($this->languages as $key => $language) {
            $model = EmergencyNumbersTranslations::where([
                'languages_id' => $language->id,
                'emergency_numbers_id'   => $id
            ])->get();

            if(!empty($model[0])){
                $data['title_'.$language->id]       = $model[0]->title;
                $data['description_'.$language->id] = $model[0]->description;   
            }else{
                $data['title_'.$language->id]       = null;
                $data['description_'.$language->id] = null;
            }
        }

        return view('backend.emergencynumbers.edit')
            ->withLanguages($this->languages)
            ->withEmergencynumbers($emergencynumbers)
            ->withEmergencynumbersid($id)
            ->withData($data);
    }

    /**
     * @param Emergency Numbers $id
     * @param ManageEmergencyNumbersRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageEmergencyNumbersRequest $request)
    {   
        $emergencynumbers = EmergencyNumbers::findOrFail(['id' => $id]);
        
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $this->emergencynumbers->update($id , $emergencynumbers, $data);
        
        return redirect()->route('admin.emergencynumbers.emergencynumbers.index')
            ->withFlashSuccess('Emergency Numbers updated Successfully!');
    }

    /**
     * @param Emergency Numbers  $id
     * @param ManageEmergencyNumbersRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageEmergencyNumbersRequest $request)
    {   
        $emergencynumbers = EmergencyNumbers::findOrFail(['id' => $id]);
        $emergencynumbersTrans = EmergencyNumbersTranslations::where(['emergency_numbers_id' => $id])->get();
        $emergencynumbers = $emergencynumbers[0];
       
        return view('backend.emergencynumbers.show')
            ->withEmergencynumbers($emergencynumbers)
            ->withEmergencynumberstrans($emergencynumbersTrans);
    }
}