<?php

namespace App\Http\Controllers\Backend\ActivityMedia;

use App\Models\ActivityMedia\Media;
use App\Models\ActivityMedia\MediaTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;
use App\Http\Requests\Backend\ActivityMedia\ManageActivityMediaRequest;
use App\Http\Requests\Backend\ActivityMedia\StoreActivityMediaRequest;
use App\Repositories\Backend\ActivityMedia\ActivityMediaRepository;

class ActivityMediaController extends Controller
{
    protected $activitymedia;

    public function __construct(ActivityMediaRepository $activitymedia)
    {
        $this->activitymedia = $activitymedia;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageActivityMediaRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageActivityMediaRequest $request)
    {
        return view('backend.activitymedia.index');
    }

    /**
     * @param ManageActivityMediaRequest $request
     *
     * @return mixed
     */
    public function create(ManageActivityMediaRequest $request)
    {   
       
        return view('backend.activitymedia.create',[
        ]);
    }

    /**
     * @param StoreActivityMediaRequest $request
     *
     * @return mixed
     */
    public function store(StoreActivityMediaRequest $request)
    {   
        $data = [];

        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $extra = [
            'url' => $request->input('url')
        ];
        $this->activitymedia->create($data,$extra);
        
        return redirect()->route('admin.activitymedia.activitymedia.index')->withFlashSuccess('Activity Media Created!');
    }

    /**
     * @param ActivityMedia $id
     * @param ManageActivityMediaRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageActivityMediaRequest $request)
    {      
        $item = Media::findOrFail($id);
        /* Delete Children Tables Data of this ActivityMedia */
        $child = MediaTranslations::where(['medias_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.activitymedia.activitymedia.index')->withFlashSuccess('Activity Media Deleted Successfully');
    }

    /**
     * @param ActivityMedia $id
     * @param ManageCulturesRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageActivityMediaRequest $request)
    {   
        
        $data = [];
        $activitymedia = Media::findOrFail(['id' => $id]);
        $activitymedia = $activitymedia[0];

        foreach ($this->languages as $key => $language) {
            $model = MediaTranslations::where([
                'languages_id' => $language->id,
                'medias_id'   => $id
            ])->get();

            if(!empty($model[0])){
                $data['title_'.$language->id]       = $model[0]->title;
                $data['description_'.$language->id] = $model[0]->description;   
            }else{
                $data['title_'.$language->id]       = null;
                $data['description_'.$language->id] = null;
            }
        }

        $data['url'] = $activitymedia->url;

        return view('backend.activitymedia.edit')
            ->withLanguages($this->languages)
            ->withMedia($activitymedia)
            ->withMediaid($id)
            ->withData($data);
    }

    /**
     * @param ActivityMedia $id
     * @param ManageActivityMediaRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageActivityMediaRequest $request)
    {   
        $activitymedia = Media::findOrFail(['id' => $id]);
        
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $extra = [
            'url' => $request->input('url')
        ];

        $this->activitymedia->update($id , $activitymedia, $data , $extra);
        
        return redirect()->route('admin.activitymedia.activitymedia.index')
            ->withFlashSuccess('Activity Media updated Successfully!');
    }

    /**
     * @param ActivityMedia  $id
     * @param ManageActivityMediaRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageActivityMediaRequest $request)
    {   
        $activitymedia = Media::findOrFail(['id' => $id]);
        $activitymediaTrans = MediaTranslations::where(['medias_id' => $id])->get();
        $activitymedia = $activitymedia[0];
       
        return view('backend.activitymedia.show')
            ->withMedia($activitymedia)
            ->withMediatrans($activitymediaTrans);
    }
}