<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Models\Pages\Pages;
use App\Models\Pages\PagesTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;
use App\Http\Requests\Backend\Pages\ManagePagesRequest;
use App\Http\Requests\Backend\Pages\StorePagesRequest;
use App\Repositories\Backend\Pages\PagesRepository;
use App\Models\ActivityMedia\Media;
use App\Models\User\User;
use App\Models\Role\RoleUser;

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
        /* Get All Medias For Dropdown */
        $medias = Media::all();
        $medias_arr = [];

        if(!empty($medias)){
            foreach ($medias as $key => $value) {
                $medias_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get All Admins For Dropdown */
        $admins = RoleUser::where(['role_id' => 1])->get();
        $admins_arr = [];

        if(!empty($admins)){
            foreach ($admins as $key => $value) {
                $admins_arr[$value->user->id] = $value->user->name;
            }
        }

        /* Get All Users */
        $users = User::get();
        $users_arr = [];

        if(!empty($users)){
            foreach ($users as $key => $value) {
                $users_arr[$value->id] = $value->name ;
            }
        }

        return view('backend.pages.create',[
            'medias' => $medias_arr,
            'admins' => $admins_arr,
            'followers'  => $users_arr,
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

        /* Send All Relations Through $extra Array */
        $extra = [
            'active' => $active,
            'url' => $request->input('url'),
            'medias' => $request->input('medias_id'),
            'admins' => $request->input('admins_id'),
            'followers' => $request->input('followers_id'),
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
        /* Delete All Relations */
        $item->deleteAdmins();
        $item->deleteFollowers();
        $item->deleteMedias();
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
        
        $data  = [];
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

        /* Get Selected Medias */
        $selected_medias = $pages->medias;
        $selected_medias_arr = [];

        if(!empty($selected_medias)){
            foreach ($selected_medias as $key => $value) {
                
                if(!empty($value->media)){
                    array_push($selected_medias_arr,$value->media->id);
                }
            }
        }

        $data['selected_medias'] = $selected_medias_arr;

        /* Get All Medias For Dropdown */
        $medias = Media::all();
        $medias_arr = [];

        if(!empty($medias)){
            foreach ($medias as $key => $value) {
                $medias_arr[$value->id] = $value->transsingle->title;
            }
        }

        /* Get Selected Admins For Dropdown */
        $selected_admins = $pages->admins;
        $selected_admins_arr = [];

        if(!empty($selected_admins)){
            foreach ($selected_admins as $key => $value) {
                array_push($selected_admins_arr,$value->users_id);
            }
        }

        $data['selected_admins'] = $selected_admins_arr;
        
        /* Get All Admins For Dropdown */
        $admins = RoleUser::where(['role_id' => 1])->get();
        $admins_arr = [];

        if(!empty($admins)){
            foreach ($admins as $key => $value) {
                $admins_arr[$value->user->id] = $value->user->name;
            }
        }

        /* Get Selected Followers */
        $selected_followers = $pages->followers;
        $selected_followers_arr = [];

        if(!empty($selected_followers)){
            foreach ($selected_followers as $key => $value) {
                if(!empty($value->user)){
                    array_push($selected_followers_arr,$value->user->id);
                }
            }
        }

        $data['selected_followers'] = $selected_followers_arr;

        /* Get All Users */
        $users = User::get();
        $users_arr = [];

        if(!empty($users)){
            foreach ($users as $key => $value) {
                $users_arr[$value->id] = $value->name ;
            }
        }

        return view('backend.pages.edit')
            ->withLanguages($this->languages)
            ->withPages($pages)
            ->withPagesid($id)
            ->withData($data)
            ->withMedias($medias_arr)
            ->withAdmins($admins_arr)
            ->withFollowers($users_arr);
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
            'url' => $request->input('url'),
            'medias' => $request->input('medias_id'),
            'admins' => $request->input('admins_id'),
            'followers' => $request->input('followers_id'),
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
        
        $selected_medias = $pages->medias;
        $selected_medias_arr = [];

        /* Get Selected Medias */
        if(!empty($selected_medias)){
            foreach ($selected_medias as $key => $value) {               
                if(!empty($value->media)){
                    if(!empty($value->media->transsingle)){
                        array_push($selected_medias_arr,$value->media->transsingle->title);
                    }
                }
            }
        }

        /* Get Selected Admins */
        $selected_admins = $pages->admins;
        $selected_admins_arr = [];

        if(!empty($selected_admins)){
            foreach ($selected_admins as $key => $value) {               
                if(!empty($value->user)){
                        array_push($selected_admins_arr,$value->user->name);
                }
            }
        }

        /* Det Selected Followers */
        $selected_followers = $pages->followers;
        $selected_followers_arr = [];

        if(!empty($selected_followers)){
            foreach ($selected_followers as $key => $value) {               
                if(!empty($value->user)){
                        array_push($selected_followers_arr,$value->user->name);
                }
            }
        }
        
        return view('backend.pages.show')
            ->withPages($pages)
            ->withPagestrans($pagesTrans)
            ->withMedias($selected_medias_arr)
            ->withAdmins($selected_admins_arr)
            ->withFollowers($selected_followers_arr);
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