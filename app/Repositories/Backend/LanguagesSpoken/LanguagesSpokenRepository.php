<?php

namespace App\Repositories\Backend\LanguagesSpoken;

use App\Models\LanguagesSpoken\LanguagesSpoken;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\LanguagesSpoken\LanguagesSpokenTranslation;
/**
 * Class LanguagesSpokenRepository.
 */
class LanguagesSpokenRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = LanguagesSpoken::class;

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
                config('languages_spoken.languages_spoken_table').'.id',
                config('languages_spoken.languages_spoken_table').'.active',
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }

    /**
     * @param array $input
     */
    public function create($input, $active)
    {   
        $model = new LanguagesSpoken;
        $model->active  = $active;

        DB::transaction(function () use ($model, $input) {
            $check = 1;
            if ($model->save()) {
                foreach ($input as $key => $value) {
                    
                    $trans = new LanguagesSpokenTranslation;
                    $trans->languages_spoken_id = $model->id;
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
    public function update($model_id , $model, array $input, $active)
    {   
        $model = LanguagesSpoken::findOrFail(['id' => $model_id]);
        $model = $model[0];
        $model->active = $active;
        $this->removeTranslations($model->id);
        
        DB::transaction(function () use ($model, $input) {
            $check = 1;
            if ($model->save()) {
                foreach ($input as $key => $value) {
                    
                    $trans = new LanguagesSpokenTranslation;
                    $trans->languages_spoken_id = $model->id;
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
            }

            throw new GeneralException('Unexpected Error Occured!');
        });
    }

    private function removeTranslations($id)
    {
        $model = LanguagesSpokenTranslation::where("languages_spoken_id", $id)->get();
        if(!empty($model)){
            foreach ($model as $key => $trans) {
                $trans->delete();
            }
        }
    }
}
