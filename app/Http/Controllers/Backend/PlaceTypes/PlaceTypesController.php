<?php

namespace App\Http\Controllers\Backend\PlaceTypes;

use App\Models\PlaceTypes\PlaceTypes;
use App\Models\PlaceTypes\PlaceTypesTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\Language\Languages;
use App\Http\Requests\Backend\PlaceTypes\ManagePlaceTypesRequest;
use App\Http\Requests\Backend\PlaceTypes\StorePlaceTypesRequest;
use App\Repositories\Backend\PlaceTypes\PlaceTypesRepository;

class PlaceTypesController extends Controller
{
    protected $placetypes;

    public function __construct(PlaceTypesRepository $placetypes)
    {
        $this->placetypes = $placetypes;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManagePlaceTypesRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManagePlaceTypesRequest $request)
    {
        return view('backend.place-types.index');
    }

    /**
     * @param ManagePlaceTypesRequest $request
     *
     * @return mixed
     */
    public function create(ManagePlaceTypesRequest $request)
    {   
       
        return view('backend.place-types.create',[
        ]);
    }

    /**
     * @param StorePlaceTypesRequest $request
     *
     * @return mixed
     */
    public function store(StorePlaceTypesRequest $request)
    {   
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
        }

        $this->placetypes->create($data);

        return redirect()->route('admin.location.placetypes.index')->withFlashSuccess('Place type Created!');
    }

    /**
     * @param placetypes $id
     * @param ManagePlaceTypesRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManagePlaceTypesRequest $request)
    {
        $item = PlaceTypes::findOrFail($id);
        /* Delete Children Tables Data of this country */
        $child = PlaceTypesTranslations::where(['place_types_ids' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.location.placetypes.index')->withFlashSuccess('Place Type Deleted Successfully');
    }

    /**
     * @param placetypes $id
     * @param ManagePlaceTypesRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManagePlaceTypesRequest $request)
    {   
        
        $data = [];
        $placetype = PlaceTypes::findOrFail(['id' => $id]);
        $placetype = $placetype[0];

        foreach ($this->languages as $key => $language) {
            $model = PlaceTypesTranslations::where([
                'languages_ids' => $language->id,
                'place_types_ids'   => $id
            ])->get();

            /* If Translation For Current Language Is Empty, Put Null in All The Fields */
            if(!empty($model[0])){
                $data['title_'.$language->id]       = $model[0]->title;
                $data['description_'.$language->id] = $model[0]->description;
            }else{
                $data['title_'.$language->id]       = null;
                $data['description_'.$language->id] = null;
            }
        }

        return view('backend.place-types.edit')
            ->withLanguages($this->languages)
            ->withPlacetype($placetype)
            ->withPlacetypeid($id)
            ->withData($data);
    }

    /**
     * @param placetypes            $id
     * @param ManagePlaceTypesRequest $request
     *
     * @return mixed
     */
    public function update($id, ManagePlaceTypesRequest $request)
    {   
        $placetypes = PlaceTypes::findOrFail(['id' => $id]);
        
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
        }

        $this->placetypes->update($id , $placetypes, $data);

        return redirect()->route('admin.location.placetypes.index')
            ->withFlashSuccess('Place Type updated Successfully!');
    }

    /**
     * @param Place Types        $id
     * @param ManagePlaceTypesRequest $request
     *
     * @return mixed
     */
    public function show($id, ManagePlaceTypesRequest $request)
    {   
        $placetype = PlaceTypes::findOrFail(['id' => $id]);
        $placetypeTrans = PlaceTypesTranslations::where(['place_types_ids' => $id])->get();
        $placetype = $placetype[0];
        
        return view('backend.place-types.show')
            ->withPlacetype($placetype)
            ->withPlacetypetrans($placetypeTrans);
    }
}