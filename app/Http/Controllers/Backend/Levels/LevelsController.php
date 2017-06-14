<?php

namespace App\Http\Controllers\Backend\Levels;

use App\Models\Levels\Levels;
use App\Models\Levels\LevelsTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;
use App\Http\Requests\Backend\Levels\ManageLevelsRequest;
use App\Http\Requests\Backend\Levels\StoreLevelsRequest;
use App\Repositories\Backend\Levels\LevelsRepository;

class LevelsController extends Controller
{
    protected $levels;

    public function __construct(LevelsRepository $levels)
    {
        $this->levels = $levels;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageLevelsRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageLevelsRequest $request)
    {
        return view('backend.levels.index');
    }

    /**
     * @param ManageLevelsRequest $request
     *
     * @return mixed
     */
    public function create(ManageLevelsRequest $request)
    {   
       
        return view('backend.levels.create',[
        ]);
    }

    /**
     * @param StoreLevelsRequest $request
     *
     * @return mixed
     */
    public function store(StoreLevelsRequest $request)
    {   
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
        }

        $this->levels->create($data);

        return redirect()->route('admin.levels.levels.index')->withFlashSuccess('Levels Created!');
    }

    /**
     * @param levels $id
     * @param ManageLevelsRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageLevelsRequest $request)
    {      
        $item = Levels::findOrFail($id);
        /* Delete Children Tables Data of this country */
        $child = levelsTranslations::where(['levels_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.levels.levels.index')->withFlashSuccess('Levels Deleted Successfully');
    }

    /**
     * @param activitytypes $id
     * @param ManageLevelsRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageLevelsRequest $request)
    {   
        
        $data = [];
        $level = Levels::findOrFail(['id' => $id]);
        $level = $level[0];

        foreach ($this->languages as $key => $language) {
            $model = LevelsTranslations::where([
                'languages_id' => $language->id,
                'levels_id'   => $id
            ])->get();

            if(!empty($model[0])){
                $data['title_'.$language->id] = $model[0]->title;
            }else{
                $data['title_'.$language->id] = null;
            }
        }

        
        return view('backend.levels.edit')
            ->withLanguages($this->languages)
            ->withLevels($level)
            ->withLevelsid($id)
            ->withData($data);
    }

    /**
     * @param levels            $id
     * @param ManageLevelsRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageLevelsRequest $request)
    {   
        $levels = Levels::findOrFail(['id' => $id]);
        
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
        }

        $this->levels->update($id , $levels, $data);

        return redirect()->route('admin.levels.levels.index')
            ->withFlashSuccess('Level updated Successfully!');
    }

    /**
     * @param Levels        $id
     * @param ManageLevelsRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageLevelsRequest $request)
    {   
        $levels = Levels::findOrFail(['id' => $id]);
        $levelsTrans = LevelsTranslations::where(['levels_id' => $id])->get();
        $levels = $levels[0];
       
        return view('backend.levels.show')
            ->withLevels($levels)
            ->withLevelstrans($levelsTrans);
    }
}