<?php

namespace App\Http\Controllers\Backend\Interest;

use App\Models\Interest\Interest;
use App\Models\Interest\InterestTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;
use App\Http\Requests\Backend\Interest\ManageInterestRequest;
use App\Http\Requests\Backend\Interest\StoreInterestRequest;
use App\Repositories\Backend\Interest\InterestRepository;

class InterestController extends Controller
{
    protected $interests;

    public function __construct(InterestRepository $interests)
    {
        $this->interests = $interests;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageInterestRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageInterestRequest $request)
    {
        return view('backend.interest.index');
    }

    /**
     * @param ManageInterestRequest $request
     *
     * @return mixed
     */
    public function create(ManageInterestRequest $request)
    {   
       
        return view('backend.interest.create',[
        ]);
    }

    /**
     * @param StoreInterestRequest $request
     *
     * @return mixed
     */
    public function store(StoreInterestRequest $request)
    {   
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
        }

        $this->interests->create($data);

        return redirect()->route('admin.interest.interest.index')->withFlashSuccess('Interest Created!');
    }

    /**
     * @param activitytypes $id
     * @param ManageInterestRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageInterestRequest $request)
    {      
        $item = Interest::findOrFail($id);
        /* Delete Children Tables Data of this country */
        $child = InterestTranslations::where(['interests_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.interest.interest.index')->withFlashSuccess('Interest Deleted Successfully');
    }

    /**
     * @param activitytypes $id
     * @param ManageInterestRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageInterestRequest $request)
    {   
        
        $data = [];
        $interest = Interest::findOrFail(['id' => $id]);
        $interest = $interest[0];

        foreach ($this->languages as $key => $language) {
            $model = InterestTranslations::where([
                'languages_id' => $language->id,
                'interests_id'   => $id
            ])->get();

            $data['title_'.$language->id] = $model[0]->title;
        }

        return view('backend.interest.edit')
            ->withLanguages($this->languages)
            ->withInterest($interest)
            ->withInterestid($id)
            ->withData($data);
    }

    /**
     * @param activitytypes            $id
     * @param ManageInterestRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageInterestRequest $request)
    {   
        $interest = Interest::findOrFail(['id' => $id]);
        
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
        }

        $this->interests->update($id , $interest, $data);

        return redirect()->route('admin.interest.interest.index')
            ->withFlashSuccess('Interest updated Successfully!');
    }

    /**
     * @param Activity Types        $id
     * @param ManageInterestRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageInterestRequest $request)
    {   
        $interest = Interest::findOrFail(['id' => $id]);
        $interestTrans = InterestTranslations::where(['interests_id' => $id])->get();
        $interest = $interest[0];
       
        return view('backend.interest.show')
            ->withInterest($interest)
            ->withInteresttrans($interestTrans);
    }

    /**
     * @param Activity Types $countries
     * @param $status
     * @param ManageInterestRequest $request
     *
     * @return mixed
     */
    public function mark(Countries $country, $status, ManageInterestRequest $request)
    {
        $country->active = $status;
        $country->save();
        return redirect()->route('admin.location.country.index')
            ->withFlashSuccess('Country Status Updated!');
    }
}