<?php

namespace App\Http\Controllers\Backend\Holidays;

use App\Models\Holidays\Holidays;
use App\Models\Holidays\HolidaysTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\Language\Languages;
use App\Http\Requests\Backend\Holidays\ManageHolidaysRequest;
use App\Http\Requests\Backend\Holidays\StoreHolidaysRequest;
use App\Repositories\Backend\Holidays\HolidaysRepository;

class HolidaysController extends Controller
{
    protected $holidays;

    public function __construct(HolidaysRepository $holidays)
    {
        $this->holidays = $holidays;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageHolidaysRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageHolidaysRequest $request)
    {
        return view('backend.holidays.index');
    }

    /**
     * @param ManageHolidaysRequest $request
     *
     * @return mixed
     */
    public function create(ManageHolidaysRequest $request)
    {   
       
        return view('backend.holidays.create',[
        ]);
    }

    /**
     * @param StoreHolidaysRequest $request
     *
     * @return mixed
     */
    public function store(StoreHolidaysRequest $request)
    {   
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $this->holidays->create($data);

        return redirect()->route('admin.holidays.holidays.index')->withFlashSuccess('Holidays Created!');
    }

    /**
     * @param Holidays $id
     * @param ManageHolidaysRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageHolidaysRequest $request)
    {      
        $item = Holidays::findOrFail($id);
        /* Delete Children Tables Data of this weekday */
        $child = HolidaysTranslations::where(['holidays_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.holidays.holidays.index')->withFlashSuccess('Holidays Deleted Successfully');
    }

    /**
     * @param Holidays $id
     * @param ManageHolidaysRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageHolidaysRequest $request)
    {   
        
        $data = [];
        $holidays = Holidays::findOrFail(['id' => $id]);
        $holidays = $holidays[0];

        foreach ($this->languages as $key => $language) {
            $model = HolidaysTranslations::where([
                'languages_id' => $language->id,
                'holidays_id'   => $id
            ])->get();

            if(!empty($model[0])){
                $data['title_'.$language->id] = $model[0]->title;
                $data['description_'.$language->id] = $model[0]->description;   
            }else{
                $data['title_'.$language->id]       = null;
                $data['description_'.$language->id] = null;
            }
        }

        return view('backend.holidays.edit')
            ->withLanguages($this->languages)
            ->withHolidays($holidays)
            ->withHolidaysid($id)
            ->withData($data);
    }

    /**
     * @param Holidays $id
     * @param ManageHolidaysRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageHolidaysRequest $request)
    {   
        $holidays = Holidays::findOrFail(['id' => $id]);
        
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $this->holidays->update($id , $holidays, $data);
        
        return redirect()->route('admin.holidays.holidays.index')
            ->withFlashSuccess('Holidays updated Successfully!');
    }

    /**
     * @param Holidays  $id
     * @param ManageHolidaysRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageHolidaysRequest $request)
    {   
        $holidays = Holidays::findOrFail(['id' => $id]);
        $holidaysTrans = HolidaysTranslations::where(['holidays_id' => $id])->get();
        $holidays = $holidays[0];
       
        return view('backend.holidays.show')
            ->withHolidays($holidays)
            ->withHolidaystrans($holidaysTrans);
    }
}