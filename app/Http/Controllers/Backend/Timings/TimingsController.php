<?php

namespace App\Http\Controllers\Backend\Timings;

use App\Models\Timings\Timings;
use App\Models\Timings\TimingsTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;
use App\Http\Requests\Backend\Timings\ManageTimingsRequest;
use App\Http\Requests\Backend\Timings\StoreTimingsRequest;
use App\Repositories\Backend\Timings\TimingsRepository;

class TimingsController extends Controller
{
    protected $timings;

    public function __construct(TimingsRepository $timings)
    {
        $this->timings = $timings;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageTimingsRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageTimingsRequest $request)
    {
        return view('backend.timings.index');
    }

    /**
     * @param ManageTimingsRequest $request
     *
     * @return mixed
     */
    public function create(ManageTimingsRequest $request)
    {   
       
        return view('backend.timings.create',[
        ]);
    }

    /**
     * @param StoreLevelsRequest $request
     *
     * @return mixed
     */
    public function store(StoreTimingsRequest $request)
    {   
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $this->timings->create($data);

        return redirect()->route('admin.timings.timings.index')->withFlashSuccess('Timings Created!');
    }

    /**
     * @param levels $id
     * @param ManageTimingsRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageTimingsRequest $request)
    {      
        $item = Timings::findOrFail($id);
        /* Delete Children Tables Data of this country */
        $child = TimingsTranslations::where(['timings_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.timings.timings.index')->withFlashSuccess('Timings Deleted Successfully');
    }

    /**
     * @param activitytypes $id
     * @param ManageTimingsRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageTimingsRequest $request)
    {   
        
        $data = [];
        $timings = Timings::findOrFail(['id' => $id]);
        $timings = $timings[0];

        foreach ($this->languages as $key => $language) {
            $model = TimingsTranslations::where([
                'languages_id' => $language->id,
                'timings_id'   => $id
            ])->get();

            $data['title_'.$language->id] = $model[0]->title;
            $data['description_'.$language->id] = $model[0]->description;   
        }

        
        return view('backend.timings.edit')
            ->withLanguages($this->languages)
            ->withTimings($timings)
            ->withTimingsid($id)
            ->withData($data);
    }

    /**
     * @param Timings $id
     * @param ManageTimingsRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageTimingsRequest $request)
    {   
        $timings = Timings::findOrFail(['id' => $id]);
        
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $this->timings->update($id , $timings, $data);
        
        return redirect()->route('admin.timings.timings.index')
            ->withFlashSuccess('Timings updated Successfully!');
    }

    /**
     * @param Timings        $id
     * @param ManageTimingsRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageTimingsRequest $request)
    {   
        $timings = Timings::findOrFail(['id' => $id]);
        $timingsTrans = TimingsTranslations::where(['timings_id' => $id])->get();
        $timings = $timings[0];
       
        return view('backend.timings.show')
            ->withTimings($timings)
            ->withTimingstrans($timingsTrans);
    }
}