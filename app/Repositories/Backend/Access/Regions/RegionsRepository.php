<?php

namespace App\Repositories\Backend\Access\Regions;

use App\Models\Access\Regions\Regions;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\Access\Regions\RegionsTranslation;
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
                config('access.regions_table').'.id',
                config('access.regions_table').'.active',
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }

    /**
     * @param array $input
     */
    public function create($input, $active)
    {
        $model = new Regions;
        $model->active  = $active;

        DB::transaction(function () use ($model, $input) {
            $check = 1;
            if ($model->save()) {
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
    public function update(Model $model, array $input, $active)
    {
        
        $model->active = $active;
        $this->removeTranslations($model->id);
        
        DB::transaction(function () use ($model, $input) {
            $check = 1;
            if ($model->save()) {
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
