<?php

namespace App\Http\Controllers\Backend\Hobbies;

use App\Models\Hobbies\Hobbies;
use App\Models\Hobbies\HobbiesTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\Language\Languages;
use App\Http\Requests\Backend\Hobbies\ManageHobbiesRequest;
use App\Http\Requests\Backend\Hobbies\StoreHobbiesRequest;
use App\Repositories\Backend\Hobbies\HobbiesRepository;

class HobbiesController extends Controller
{
    protected $hobbies;

    public function __construct(HobbiesRepository $hobbies)
    {
        $this->hobbies = $hobbies;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageHobbiesRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageHobbiesRequest $request)
    {
        return view('backend.hobbies.index');
    }

    /**
     * @param ManageHobbiesRequest $request
     *
     * @return mixed
     */
    public function create(ManageHobbiesRequest $request)
    {   
       
        return view('backend.hobbies.create',[
        ]);
    }

    /**
     * @param StoreHobbiesRequest $request
     *
     * @return mixed
     */
    public function store(StoreHobbiesRequest $request)
    {   
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
        }

        $this->hobbies->create($data);

        return redirect()->route('admin.hobbies.hobbies.index')->withFlashSuccess('Hobbies Created!');
    }

    /**
     * @param Hobbies $id
     * @param ManageHobbiesRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageHobbiesRequest $request)
    {      
        $item = Hobbies::findOrFail($id);
        /* Delete Children Tables Data of this hobbies */
        $child = HobbiesTranslations::where(['hobbies_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.hobbies.hobbies.index')->withFlashSuccess('Hobbies Deleted Successfully');
    }

    /**
     * @param Hobbies $id
     * @param ManageHobbiesRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageHobbiesRequest $request)
    {   
        
        $data = [];
        $hobbies = Hobbies::findOrFail(['id' => $id]);
        $hobbies = $hobbies[0];

        foreach ($this->languages as $key => $language) {
            $model = HobbiesTranslations::where([
                'languages_id' => $language->id,
                'hobbies_id'   => $id
            ])->get();

            if(!empty($model[0])){
                $data['title_'.$language->id] = $model[0]->title;
            }else{
                $data['title_'.$language->id] = null;
            }
        }

        return view('backend.hobbies.edit')
            ->withLanguages($this->languages)
            ->withHobbies($hobbies)
            ->withHobbiesid($id)
            ->withData($data);
    }

    /**
     * @param Hobbies $id
     * @param ManageHobbiesRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageHobbiesRequest $request)
    {   
        $hobbies = Hobbies::findOrFail(['id' => $id]);
        
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
        }

        $this->hobbies->update($id , $hobbies, $data);
        
        return redirect()->route('admin.hobbies.hobbies.index')
            ->withFlashSuccess('Hobbies updated Successfully!');
    }

    /**
     * @param hobbies  $id
     * @param ManageHobbiesRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageHobbiesRequest $request)
    {   
        $hobbies = Hobbies::findOrFail(['id' => $id]);
        $hobbiesTrans = HobbiesTranslations::where(['hobbies_id' => $id])->get();
        $hobbies = $hobbies[0];
       
        return view('backend.hobbies.show')
            ->withHobbies($hobbies)
            ->withHobbiestrans($hobbiesTrans);
    }
}