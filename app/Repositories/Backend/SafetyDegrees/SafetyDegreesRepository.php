<?php

namespace App\Repositories\Backend\SafetyDegrees;

use App\Models\SafetyDegree\SafetyDegreeTrans;
use App\Models\SafetyDegree\SafetyDegree;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LanguageRepository.
 */
class SafetyDegreesRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = SafetyDegree::class;

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
                config('access.safety_degree').'.id',
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }

    /**
     * @param array $input
     */
    public function create($input)
    {
        $this->checkUserByCode($input);
        
        $model = new SafetyDegree;
        
        DB::transaction(function () use ($model, $input) {
            $check = 1;
            if ($model->save()) {
                foreach ($input as $key => $value) {
                   
                    $trans = new SafetyDegreeTrans;
                    $trans->safety_degrees_id   = $model->id;
                    $trans->languages_id = $key;
                    
                    $trans->title = $value['title_' . $key];
                    $trans->description = $value['description_' . $key];
                    
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

        return true;
    }

    /**
     * @param Model $user
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update($model_id , $model, array $input)
    {
        $this->removeTranslations($model_id);
        
        DB::transaction(function () use ($model_id , $model, $input) {
            $check = 1;
            // if ($model->save()) {
            foreach ($input as $key => $value) {

                $trans = new SafetyDegreeTrans;
                $trans->safety_degrees_id   = $model_id;
                $trans->languages_id = $key;
                $trans->title        = $value['title_'.$key];
                $trans->description  = $value['description_'.$key]; 
                
                if(!$trans->save()) {
                    $check = 0;
                }
            }

            if($check) {
                return true;
            }
            // }

            throw new GeneralException('Unexpected Error Occured!');
        });
    }

    /**
     * @param  $input
     * @param  $user
     *
     * @throws GeneralException
     */
    protected function checkUserByCode($input)
    {
        //Check to see if Code exists
        // if ($this->query()->where('code', '=', $input['code'])->first()) {
        //     throw new GeneralException(trans('exceptions.backend.access.language.code_error'));
        // }
    }

    private function removeTranslations($model_id)
    {
        $model = SafetyDegreeTrans::where("safety_degrees_id", $model_id)->get();
        foreach ($model as $key => $trans) {
            $trans->delete();
        }
    }
}
