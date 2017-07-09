<?php

namespace App\Http\Controllers\Backend\AgeRanges;

use App\Models\AgeRanges\AgeRanges;
use App\Models\AgeRanges\AgeRangesTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\Language\Languages;
use App\Http\Requests\Backend\AgeRanges\ManageAgeRangesRequest;
use App\Http\Requests\Backend\AgeRanges\StoreAgeRangesRequest;
use App\Repositories\Backend\AgeRanges\AgeRangesRepository;

class AgeRangesController extends Controller
{
    protected $ageranges;

    public function __construct(AgeRangesRepository $ageranges)
    {
        $this->ageranges = $ageranges;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageAgeRangesRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageAgeRangesRequest $request)
    {
        return view('backend.ageranges.index');
    }

    /**
     * @param ManageAgeRangesRequest $request
     *
     * @return mixed
     */
    public function create(ManageAgeRangesRequest $request)
    {   
       
        return view('backend.ageranges.create',[
        ]);
    }

    /**
     * @param StoreAgeRangesRequest $request
     *
     * @return mixed
     */
    public function store(StoreAgeRangesRequest $request)
    {   
        $data = [];
        $post = $request->input();
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
        }

        $active = 2;
        if(!empty($request->input('active'))){
            $active = 1;
        }else{
            $active = 2;
        }

        /* Pass All Relation and Common fields through $extra Array */
        $extra = [
            'to' => $request->input('to'),
            'from' => $request->input('from'),
            'active' => $active 
        ];
        $this->ageranges->create($data,$extra);

        return redirect()->route('admin.ageranges.ageranges.index')->withFlashSuccess('Age Range Created!');
    }

    /**
     * @param AgeRanges $id
     * @param ManageAgeRangesRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageAgeRangesRequest $request)
    {      
        $item = AgeRanges::findOrFail($id);
        /* Delete Children Tables Data of this AgeRanges */
        $child = AgeRangesTranslations::where(['age_ranges_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.ageranges.ageranges.index')->withFlashSuccess('Age Range Deleted Successfully');
    }

    /**
     * @param AgeRanges $id
     * @param ManageAgeRangesRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageAgeRangesRequest $request)
    {   
        
        $data = [];
        $ageranges = AgeRanges::findOrFail(['id' => $id]);
        $ageranges = $ageranges[0];

        foreach ($this->languages as $key => $language) {
            $model = AgeRangesTranslations::where([
                'languages_id' => $language->id,
                'age_ranges_id'   => $id
            ])->get();

            if(!empty($model[0])){
                $data['title_'.$language->id] = $model[0]->title;   
            }else{
                $data['title_'.$language->id] = null;   
            }
        }

        $data['from'] = $ageranges->from;
        $data['to'] = $ageranges->to;
        $data['active'] = $ageranges->active;

        return view('backend.ageranges.edit')
            ->withLanguages($this->languages)
            ->withAgeranges($ageranges)
            ->withAgerangesid($id)
            ->withData($data);
    }

    /**
     * @param AgeRanges $id
     * @param ManageAgeRangesRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageAgeRangesRequest $request)
    {   
        $ageranges = AgeRanges::findOrFail(['id' => $id]);
        $post = $request->input();
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
        }

        
        $active = 2;
        if(!empty($post['active'])){
            $active = 1;
        }else{
            $active = 2;
        }

        $extra = [
            'to' => $request->input('to'),
            'from' => $request->input('from'),
            'active' => $active 
        ];

        $this->ageranges->update($id , $ageranges, $data, $extra);
        
        return redirect()->route('admin.ageranges.ageranges.index')
            ->withFlashSuccess('Age Ranges updated Successfully!');
    }

    /**
     * @param AgeRanges  $id
     * @param ManageAgeRangesRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageAgeRangesRequest $request)
    {   
        $ageranges = AgeRanges::findOrFail(['id' => $id]);
        $agerangesTrans = AgeRangesTranslations::where(['age_ranges_id' => $id])->get();
        $ageranges = $ageranges[0];
       
        return view('backend.ageranges.show')
            ->withAgeranges($ageranges)
            ->withAgerangestrans($agerangesTrans);
    }

     /**
     * @param Ageranges $ageranges
     * @param $status
     * @param ManageActivityRequest $request
     *
     * @return mixed
     */
    public function mark($ageranges, $status, ManageAgeRangesRequest $request)
    {   
        $ageranges = AgeRanges::findOrFail(['id' => $ageranges]);
        $ageranges = $ageranges[0];
        $ageranges->active = $status;
        $ageranges->save();
        return redirect()->route('admin.ageranges.ageranges.index')
            ->withFlashSuccess('Age Ranges Status Updated!');
    }
}