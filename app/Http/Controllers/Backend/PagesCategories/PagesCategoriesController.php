<?php

namespace App\Http\Controllers\Backend\PagesCategories;

use App\Models\PagesCategories\PagesCategories;
use App\Models\PagesCategories\PagesCategoriesTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\Language\Languages;
use App\Http\Requests\Backend\PagesCategories\ManagePagesCategoriesRequest;
use App\Http\Requests\Backend\PagesCategories\StorePagesCategoriesRequest;
use App\Repositories\Backend\PagesCategories\PagesCategoriesRepository;

class PagesCategoriesController extends Controller
{
    protected $pages_categories;

    public function __construct(PagesCategoriesRepository $pages_categories)
    {
        $this->pages_categories = $pages_categories;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManagePagesCategoriesRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManagePagesCategoriesRequest $request)
    {
        return view('backend.pages_categories.index');
    }

    /**
     * @param ManagePagesCategoriesRequest $request
     *
     * @return mixed
     */
    public function create(ManagePagesCategoriesRequest $request)
    {   
        return view('backend.pages_categories.create',[
        ]);
    }

    /**
     * @param StorePagesCategoriesRequest $request
     *
     * @return mixed
     */
    public function store(StorePagesCategoriesRequest $request)
    {   
        $data = [];
    
        $extra = [
            'title' => $request->input('title')
        ];
        
        $this->pages_categories->create($data , $extra);

        return redirect()->route('admin.pages.pages_categories.index')->withFlashSuccess('Page Category Created!');
    }

    /**
     * @param PagesCategories $id
     * @param ManagePagesCategoriesRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManagePagesCategoriesRequest $request)
    {      
        $item = PagesCategories::findOrFail($id);
        /* Delete Children Tables Data of this PageCategory */
        $item->delete();

        return redirect()->route('admin.pages.pages_categories.index')->withFlashSuccess('Page Category Deleted Successfully');
    }

    /**
     * @param PagesCategories $id
     * @param ManagePagesCategoriesRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManagePagesCategoriesRequest $request)
    {   
        
        $data = [];
        $pages_categories = PagesCategories::findOrFail(['id' => $id]);
        $pages_categories = $pages_categories[0];

        $data['title'] = $pages_categories->title;

        return view('backend.pages_categories.edit')
            ->withLanguages($this->languages)
            ->withPages_categories($pages_categories)
            ->withPages_categories_id($id)
            ->withData($data);
    }

    /**
     * @param PagesCategories $id
     * @param ManagePagesCategoriesRequest $request
     *
     * @return mixed
     */
    public function update($id, ManagePagesCategoriesRequest $request)
    {   
        $pages_categories = PagesCategories::findOrFail(['id' => $id]);
        
        $data = [];

        $extra = [
            'title' => $request->input('title')
        ];

        $this->pages_categories->update($id , $pages_categories, $data , $extra);
        
        return redirect()->route('admin.pages.pages_categories.index')
            ->withFlashSuccess('Pages Categories updated Successfully!');
    }

    /**
     * @param PagesCategories  $id
     * @param ManagePagesCategoriesRequest $request
     *
     * @return mixed
     */
    public function show($id, ManagePagesCategoriesRequest $request)
    {   
        $pages_categories = PagesCategories::findOrFail(['id' => $id]);
        $pages_categories = $pages_categories[0];
       
        return view('backend.pages_categories.show')
            ->withPages_categories($pages_categories); 
    }

    /**
     * @param PagesCategories $page
     * @param $status
     * @param ManagePagesCategoriesRequest $request
     *
     * @return mixed
     */
    public function mark($id, $status, ManagePagesCategoriesRequest $request)
    {   
        $pages_categories = PagesCategories::findOrFail(['id' => $id]);
        $pages_categories = $pages_categories[0];
        
        $pages_categories->active = $status;
        $pages_categories->save();
        
        return redirect()->route('admin.pages.pages_categories.index')
            ->withFlashSuccess('Page Category Status Updated!');
    }
}