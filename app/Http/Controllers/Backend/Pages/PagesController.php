<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Models\Pages\Pages;
use App\Models\Pages\PagesTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;
use App\Http\Requests\Backend\Pages\ManagePagesRequest;
use App\Http\Requests\Backend\Pages\StorePagesRequest;
use App\Repositories\Backend\Pages\PagesRepository;

class PagesController extends Controller
{
    protected $pages;

    public function __construct(PagesRepository $pages)
    {
        $this->pages = $pages;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManagePagesRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManagePagesRequest $request)
    {
        return view('backend.pages.index');
    }

    /**
     * @param ManagePagesRequest $request
     *
     * @return mixed
     */
    public function create(ManagePagesRequest $request)
    {   
       
        return view('backend.pages.create',[
        ]);
    }

    /**
     * @param StoreHolidaysRequest $request
     *
     * @return mixed
     */
    public function store(StorePagesRequest $request)
    {   
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $active = 2;
        if(!empty($request->input('active'))){
            $active = 1;
        }

        $extra = [
            'active' => $active,
            'url' => $request->input('url')
        ];
        
        $this->pages->create($data , $extra);

        return redirect()->route('admin.pages.pages.index')->withFlashSuccess('Page Created!');
    }

    /**
     * @param Pages $id
     * @param ManagePagesRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManagePagesRequest $request)
    {      
        $item = Pages::findOrFail($id);
        /* Delete Children Tables Data of this weekday */
        $child = PagesTranslations::where(['pages_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.pages.pages.index')->withFlashSuccess('Page Deleted Successfully');
    }

    /**
     * @param Pages $id
     * @param ManagePagesRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManagePagesRequest $request)
    {   
        
        $data = [];
        $pages = Pages::findOrFail(['id' => $id]);
        $pages = $pages[0];

        foreach ($this->languages as $key => $language) {
            $model = PagesTranslations::where([
                'languages_id' => $language->id,
                'pages_id'   => $id
            ])->get();

            if(!empty($model[0])){
                $data['title_'.$language->id] = $model[0]->title;
                $data['description_'.$language->id] = $model[0]->description;   
            }else{
                $data['title_'.$language->id]       = null;
                $data['description_'.$language->id] = null;
            }
        }

        $data['active'] = $pages->active;
        $data['url']    = $pages->url;

        return view('backend.pages.edit')
            ->withLanguages($this->languages)
            ->withPages($pages)
            ->withPagesid($id)
            ->withData($data);
    }

    /**
     * @param Pages $id
     * @param ManagePagesRequest $request
     *
     * @return mixed
     */
    public function update($id, ManagePagesRequest $request)
    {   
        $pages = Pages::findOrFail(['id' => $id]);
        
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
            $data[$language->id]['description_'.$language->id] = $request->input('description_'.$language->id);
        }

        $active = 2;
        if(!empty($request->input('active'))){
            $active = 1;
        }

        $extra = [
            'active' => $active,
            'url' => $request->input('url')
        ];

        $this->pages->update($id , $pages, $data , $extra);
        
        return redirect()->route('admin.pages.pages.index')
            ->withFlashSuccess('Pages updated Successfully!');
    }

    /**
     * @param Pages  $id
     * @param ManagePagesRequest $request
     *
     * @return mixed
     */
    public function show($id, ManagePagesRequest $request)
    {   
        $pages = Pages::findOrFail(['id' => $id]);
        $pagesTrans = PagesTranslations::where(['pages_id' => $id])->get();
        $pages = $pages[0];
       
        return view('backend.pages.show')
            ->withPages($pages)
            ->withPagestrans($pagesTrans);
    }

    /**
     * @param Pages $page
     * @param $status
     * @param ManagePagesRequest $request
     *
     * @return mixed
     */
    public function mark($id, $status, ManagePagesRequest $request)
    {   
        $pages = Pages::findOrFail(['id' => $id]);
        $pages = $pages[0];
        
        $pages->active = $status;
        $pages->save();
        
        return redirect()->route('admin.pages.pages.index')
            ->withFlashSuccess('Page Status Updated!');
    }
}