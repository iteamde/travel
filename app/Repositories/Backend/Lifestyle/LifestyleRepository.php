<?php

namespace App\Repositories\Backend\Lifestyle;

use App\Models\Lifestyle\LifestyleTrans;
use App\Models\Lifestyle\Lifestyle;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LifestyleRepository.
 */
class LifestyleRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Lifestyle::class;

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
                config('lifestyle.lifestyle_table').'.id',
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
        
        $model = new Lifestyle;
        
        DB::transaction(function () use ($model, $input) {
            $check = 1;
            if ($model->save()) {
                foreach ($input as $key => $value) {
                   
                    $trans = new LifestyleTrans;
                    $trans->lifestyles_id   = $model->id;
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
        $model = Lifestyle::findOrFail(['id' => $model_id]);
        
        $this->removeTranslations($model_id);
        
        DB::transaction(function () use ($model_id , $model, $input) {
            $check = 1;
            // if ($model->save()) {
            foreach ($input as $key => $value) {

                $trans = new LifestyleTrans;
                $trans->lifestyles_id   = $model_id;
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
        $model = LifestyleTrans::where("lifestyles_id", $model_id)->get();
        foreach ($model as $key => $trans) {
            $trans->delete();
        }
    }
}
