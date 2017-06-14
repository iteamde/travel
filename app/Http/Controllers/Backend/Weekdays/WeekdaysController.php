<?php

namespace App\Http\Controllers\Backend\Weekdays;

use App\Models\Weekdays\Weekdays;
use App\Models\Weekdays\WeekdaysTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;
use App\Http\Requests\Backend\Weekdays\ManageWeekdaysRequest;
use App\Http\Requests\Backend\Weekdays\StoreWeekdaysRequest;
use App\Repositories\Backend\Weekdays\WeekdaysRepository;

class WeekdaysController extends Controller
{
    protected $weekdays;

    public function __construct(WeekdaysRepository $weekdays)
    {
        $this->weekdays = $weekdays;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageWeekdaysRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageWeekdaysRequest $request)
    {
        return view('backend.weekdays.index');
    }

    /**
     * @param ManageWeekdaysRequest $request
     *
     * @return mixed
     */
    public function create(ManageWeekdaysRequest $request)
    {   
       
        return view('backend.weekdays.create',[
        ]);
    }

    /**
     * @param StoreWeekdaysRequest $request
     *
     * @return mixed
     */
    public function store(StoreWeekdaysRequest $request)
    {   
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $this->weekdays->create($data);

        return redirect()->route('admin.weekdays.weekdays.index')->withFlashSuccess('Weekdays Created!');
    }

    /**
     * @param Weekdays $id
     * @param ManageWeekdaysRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageWeekdaysRequest $request)
    {      
        $item = Weekdays::findOrFail($id);
        /* Delete Children Tables Data of this weekday */
        $child = WeekdaysTranslations::where(['weekdays_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.weekdays.weekdays.index')->withFlashSuccess('Weekdays Deleted Successfully');
    }

    /**
     * @param Weekdays $id
     * @param ManageWeekdaysRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageWeekdaysRequest $request)
    {   
        
        $data = [];
        $weekdays = Weekdays::findOrFail(['id' => $id]);
        $weekdays = $weekdays[0];

        foreach ($this->languages as $key => $language) {
            $model = WeekdaysTranslations::where([
                'languages_id' => $language->id,
                'weekdays_id'   => $id
            ])->get();

            if(!empty($model[0])){
                $data['title_'.$language->id]       = $model[0]->title;
                $data['description_'.$language->id] = $model[0]->description;   
            }else{
                $data['title_'.$language->id]       = null;
                $data['description_'.$language->id] = null;
            }
        }

        return view('backend.weekdays.edit')
            ->withLanguages($this->languages)
            ->withWeekdays($weekdays)
            ->withWeekdaysid($id)
            ->withData($data);
    }

    /**
     * @param Weekdays $id
     * @param ManageWeekdaysRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageWeekdaysRequest $request)
    {   
        $weekdays = Weekdays::findOrFail(['id' => $id]);
        
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $this->weekdays->update($id , $weekdays, $data);
        
        return redirect()->route('admin.weekdays.weekdays.index')
            ->withFlashSuccess('Weekdays updated Successfully!');
    }

    /**
     * @param Weekdays  $id
     * @param ManageWeekdaysRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageWeekdaysRequest $request)
    {   
        $weekdays = Weekdays::findOrFail(['id' => $id]);
        $weekdaysTrans = WeekdaysTranslations::where(['weekdays_id' => $id])->get();
        $weekdays = $weekdays[0];
       
        return view('backend.weekdays.show')
            ->withWeekdays($weekdays)
            ->withWeekdaystrans($weekdaysTrans);
    }
}