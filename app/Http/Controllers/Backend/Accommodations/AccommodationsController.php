<?php

namespace App\Http\Controllers\Backend\Accommodations;

use App\Models\Accommodations\Accommodations;
use App\Models\Accommodations\AccommodationsTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;
use App\Http\Requests\Backend\Accommodations\ManageAccommodationsRequest;
use App\Http\Requests\Backend\Accommodations\StoreAccommodationsRequest;
use App\Repositories\Backend\Accommodations\AccommodationsRepository;

class AccommodationsController extends Controller
{
    protected $accommodations;

    public function __construct(AccommodationsRepository $accommodations)
    {
        $this->accommodations = $accommodations;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageAccommodationsRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageAccommodationsRequest $request)
    {
        return view('backend.accommodations.index');
    }

    /**
     * @param ManageAccommodationsRequest $request
     *
     * @return mixed
     */
    public function create(ManageAccommodationsRequest $request)
    {   
       
        return view('backend.accommodations.create',[
        ]);
    }

    /**
     * @param StoreAccommodationsRequest $request
     *
     * @return mixed
     */
    public function store(StoreAccommodationsRequest $request)
    {   
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
        }

        $this->accommodations->create($data);

        return redirect()->route('admin.accommodations.accommodations.index')->withFlashSuccess('Accommodations Created!');
    }

    /**
     * @param accommodations $id
     * @param ManageAccommodationsRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageAccommodationsRequest $request)
    {      
        $item = Accommodations::findOrFail($id);
        /* Delete Children Tables Data of this country */
        $child = AccommodationsTranslations::where(['Accommodations_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.accommodations.accommodations.index')->withFlashSuccess('Accommodations Deleted Successfully');
    }

    /**
     * @param accommodations $id
     * @param ManageAccommodationsRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageAccommodationsRequest $request)
    {   
        
        $data = [];
        $accommodations = Accommodations::findOrFail(['id' => $id]);
        $accommodations = $accommodations[0];

        foreach ($this->languages as $key => $language) {
            $model = AccommodationsTranslations::where([
                'languages_id' => $language->id,
                'accommodations_id'   => $id
            ])->get();

            if(!empty($model[0])){
                $data['title_'.$language->id] = $model[0]->title;
            }else{
                $data['title_'.$language->id] = null;
            }
        }

        
        return view('backend.accommodations.edit')
            ->withLanguages($this->languages)
            ->withAccommodations($accommodations)
            ->withAccommodationsid($id)
            ->withData($data);
    }

    /**
     * @param accommodations          $id
     * @param ManageAccommodationsRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageAccommodationsRequest $request)
    {   
        $accommodations = Accommodations::findOrFail(['id' => $id]);
        
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
        }

        $this->accommodations->update($id , $accommodations, $data);

        return redirect()->route('admin.accommodations.accommodations.index')
            ->withFlashSuccess('Accommodations updated Successfully!');
    }

    /**
     * @param Accommodations        $id
     * @param ManageAccommodationsRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageAccommodationsRequest $request)
    {   
        $accommodations = Accommodations::findOrFail(['id' => $id]);
        $accommodationsTrans = AccommodationsTranslations::where(['accommodations_id' => $id])->get();
        $accommodations = $accommodations[0];
       
        return view('backend.accommodations.show')
            ->withAccommodations($accommodations)
            ->withAccommodationstrans($accommodationsTrans);
    }
}