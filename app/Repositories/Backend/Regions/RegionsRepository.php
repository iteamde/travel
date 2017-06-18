<?php

namespace App\Repositories\Backend\Regions;

use App\Models\Regions\Regions;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\Regions\RegionsTranslation;
use App\Models\Regions\RegionsMedias;

/**
 * Class RegionsRepository.
 */
class RegionsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Regions::class;

    /**
     * @param int  $status
     * @param bool $trashed
     *
     * @return mixed
     */
    public function getForDataTable()
    {
        /**
         * Note: You must return deleted_at or the User getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
        $dataTableQuery = $this->query()
            ->with('transsingle')
            ->select([
                config('locations.regions_table').'.id',
                config('locations.regions_table').'.active',
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }

    /**
     * @param array $input
     */
    public function create($input, $active , $extra)
    {
        $model = new Regions;
        $model->active  = $active;
        
        DB::transaction(function () use ($model, $input , $extra) {
            $check = 1;
            if ($model->save()) {

                if(!empty($extra['medias'])){
                    foreach ($extra['medias'] as $key => $value) {
                        $RegionsMedias = new RegionsMedias;
                        $RegionsMedias->regions_id = $model->id;
                        $RegionsMedias->medias_id  = $value;
                        $RegionsMedias->save();
                    }
                }

                foreach ($input as $key => $value) {
                    $temp = explode('_', $key);
                    $trans = new RegionsTranslation;
                    $trans->regions_id   = $model->id;
                    $trans->languages_id = $temp[1];
                    $trans->title        = $value;
                    
                    if(!$trans->save()) {
                        $check = 0;
                    }
                }

                if($check) {
                    return true;
                }
            }

            throw new GeneralException('Unexpected Error Occured!');
        });
    }

    /**
     * @param Model $user
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $model, array $input, $active , $extra)
    {
        $model->active = $active;
        $this->removeTranslations($model->id);
        
        $prev_medias = RegionsMedias::where(['regions_id' => $model->id])->get();
        if(!empty($prev_medias)){
            foreach ($prev_medias as $key => $value) {
                $value->delete();
            }
        }

        DB::transaction(function () use ($model, $input , $extra) {
            $check = 1;
            if ($model->save()) {
                
                if(!empty($extra['medias'])){
                    foreach ($extra['medias'] as $key => $value) {
                        $RegionsMedias = new RegionsMedias;
                        $RegionsMedias->regions_id = $model->id;
                        $RegionsMedias->medias_id  = $value;
                        $RegionsMedias->save();
                    }
                }

                foreach ($input as $key => $value) {
                    $temp = explode('_', $key);
                    $trans = new RegionsTranslation;
                    $trans->regions_id   = $model->id;
                    $trans->languages_id = $temp[1];
                    $trans->title        = $value;
                    
                    if(!$trans->save()) {
                        $check = 0;
                    }
                }

                if($check) {
                    return true;
                }
            }

            throw new GeneralException('Unexpected Error Occured!');
        });
    }

    private function removeTranslations($region_id)
    {
        $model = RegionsTranslation::where("regions_id", $region_id)->get();
        foreach ($model as $key => $trans) {
            $trans->delete();
        }
    }
}
