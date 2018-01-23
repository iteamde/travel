<?php

namespace App\Http\Controllers\Backend\Lifestyle;

use App\Models\Access\Language\Languages;
use App\Models\Lifestyle\Lifestyle;
use App\Models\Lifestyle\LifestyleTrans;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Lifestyle\ManageLifestyleRequest;
use App\Http\Requests\Backend\Lifestyle\StoreLifestyleRequest;
use App\Repositories\Backend\Lifestyle\LifestyleRepository;
use App\Http\Requests\Backend\Lifestyle\UpdateLifestyleRequest;
use App\Models\ActivityMedia\Media;

class LifestyleController extends Controller
{
    protected $lifestyle;
    protected $languages;

    public function __construct( LifestyleRepository $lifestyle)
    {
        $this->lifestyle = $lifestyle;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageLanguagesRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageLifestyleRequest $request)
    {
        return view('backend.lifestyle.index');
    }

    /**
     * @param ManageLanguagesRequest $request
     *
     * @return mixed
     */
    public function create(ManageLifestyleRequest $request)
    {
        return view('backend.lifestyle.create');
    }


    /**
     * @param SafetyDegres $safetudegree
     * @param ManageSafetyDegreesRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageLifestyleRequest $request)
    {   
        
        $data = [];
        $lifestyle = Lifestyle::findOrFail(['id' => $id]);
        
        foreach ($this->languages as $key => $language) {
            $model = LifestyleTrans::where([
                'languages_id' => $language->id,
                'lifestyles_id'   => $id
            ])->get();

            if(!empty($model[0])){
                
                $data['title_'.$language->id]       = $model[0]->title;
                $data['description_'.$language->id] = $model[0]->description;
            
            }else{

                $data['title_'.$language->id]       = null;
                $data['description_'.$language->id] = null;
            
            }
        }

        $lifestyle = $lifestyle[0];

        /* Get Selected Medias */
        $selected_medias     = $lifestyle->medias;
        $selected_images     = [];
        $selected_medias_arr = [];

        if(!empty($selected_medias)){
            foreach ($selected_medias as $key => $value) {
                $media = $value->media;

                if(!empty($media)){
                    if($media->type != Media::TYPE_IMAGE){
                        array_push($selected_medias_arr,$media->id);
                    }else{
                        $media->url = str_replace('storage.travooo.com', 'https://localhost/travoo-api/storage/uploads',$media->url);
                        array_push($selected_images,[
                            'id'    => $media->id,
                            'url'   => $media->url
                        ]);
                    }
                }
            }
        }
        
        $data['selected_medias'] = $selected_medias_arr;

        /* Get Cover Image Of Lifestyle */
        $cover = null;
        if(!empty($lifestyle->cover)){
            $cover = $lifestyle->cover;
            $cover->url = str_replace('storage.travooo.com', 'https://localhost/travoo-api/storage/uploads', $cover->url);
        }

        return view('backend.lifestyle.edit')
            ->withLanguages($this->languages)
            ->withLifestyle($lifestyle)
            ->withLifestyleid($id)
            ->withData($data)
            ->withImages($selected_images)
            ->withCover($cover);
    }

    /**
     * @param Languages             $language
     * @param UpdateLanguageRequest $request
     *
     * @return mixed
     */
    public function update($id, UpdateLifestyleRequest $request)
    {   
        
        $lifestyle = Lifestyle::findOrFail(['id' => $id]);
        
        $data = [];

        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }
        
        $files = null;
        if($request->hasFile('pictures')){
            $files = $request->file('pictures');
        }

        $cover_image = null;
        if($request->hasFile('cover_image')){
            $cover_image = $request->file('cover_image');
        } 
        
        $extra = [
            'files'                 => $files,
            'cover_image'           => $cover_image,
            'media_cover_image'     => $request->input('media-cover-image'),
            'remove-cover-image'    => $request->input('remove-cover-image'),
            'delete-images'         => $request->input('delete-images'),
        ];

        $this->lifestyle->update($id , $lifestyle, $data, $extra);

        return redirect()->route('admin.lifestyle.lifestyle.index')
            ->withFlashSuccess('Life Style updated Successfully!');
    }

    /**
     * @param StoreLifestyleRequest $request
     *
     * @return mixed
     */
    public function store(StoreLifestyleRequest $request)
    {   
        $data = [];
       
        foreach ($this->languages as $key => $language) {

            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $files = null;
        if($request->hasFile('pictures')){
            $files = $request->file('pictures');
        }

        $cover = null;
        if($request->hasFile('cover_image')){
            $cover = $request->file('cover_image');
        }

        $extra = [];

        $extra['files']       = $files;
        $extra['cover_image'] = $cover;

        $this->lifestyle->create($data,$extra);

        return redirect()->route('admin.lifestyle.lifestyle.index')->withFlashSuccess('Lifestyle Created Successfully');
    }

    /**
     * @param Lifestyle $id
     * @param ManageSafetyDegreesRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageLifestyleRequest $request)
    {
        $item = Lifestyle::findOrFail($id);
        /* Delete Children Tables Data of this country */
        $child = LifestyleTrans::where(['lifestyles_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.lifestyle.lifestyle.index')->withFlashSuccess('Life Style Deleted Successfully');
    }

    /**
     * @param Lifestyle        $degree
     * @param ManageRegionsRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageLifestyleRequest $request)
    {   
        $lifestyle = Lifestyle::findOrFail(['id' => $id]);
        $lifestyleTrans = LifestyleTrans::where(['lifestyles_id' => $id])->get();
        
        /* Get Selected Medias */
        $medias     = $lifestyle->medias;
        $image_urls = [];
        $medias_arr = [];

        if(!empty($medias)){
            foreach ($medias as $key => $value) {
                $media = $value->media;

                if(!empty($media)){
                    if($media->type != Media::TYPE_IMAGE){
                        $media = $media->transsingle;

                        if(!empty($media)){
                            array_push($medias_arr,$media->title);
                        }
                    }else{
                        array_push($image_urls,$media->url);
                    }
                }
            }
        }

         /* Get Cover Image Of Country */
        $cover = null;
        if(!empty($lifestyle->cover)){
            $cover      = $lifestyle->cover;
            // $cover->url = str_replace('storage.travooo.com', 'https://localhost/travoo-api/storage/uploads', $cover->url);
        }

        return view('backend.lifestyle.show')
            ->withLifestyle($lifestyle)
            ->withLifestyletrans($lifestyleTrans)
            ->withCover($cover);
    }
}