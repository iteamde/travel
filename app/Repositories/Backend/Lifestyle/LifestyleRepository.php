<?php

namespace App\Repositories\Backend\Lifestyle;

use App\Models\Lifestyle\LifestyleTrans;
use App\Models\Lifestyle\LifestyleMedias;
use App\Models\Lifestyle\Lifestyle;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

use App\Models\ActivityMedia\Media;
use App\Models\ActivityMedia\MediaTranslations;
use App\Models\Access\language\Languages;

use App\Helpers\UrlGenerator;

/**
 * Class LifestyleRepository.
 **/
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
    public function create($input,$extra)
    {
        $this->checkUserByCode($input);
        
        $model = new Lifestyle;
        
        DB::transaction(function () use ($model, $input, $extra) {
            $check = 1;
            
            if ($model->save()) {

                if(!empty($extra['files'])){
                    
                    $url = UrlGenerator::GetUploadsUrl();
                    $i = 0;
                    foreach ($extra['files'] as $key => $file) {
                        $extension = $file->extension();
                        
                        if(self::validateUpload($extension)){
                            $new_file_name = time() . $i++ . '_travelstyles.' . $file->extension();
                            $new_path      = '/uploads/medias/travelstyles/' . $model->id . '/';
                            $file->storeAs( $new_path , $new_file_name);
                            
                            $media       = new Media;
                            $media->url  = $url . 'medias/travelstyles/' . $model->id . '/' . $new_file_name;
                            $media->type = Media::TYPE_IMAGE;
                            $media->save();
                            
                            $languages = Languages::all();

                            if(!empty($languages)){
                                foreach ($languages as $key => $value) {
                                    $media_trans = new MediaTranslations;
                                    $media_trans->medias_id     = $media->id;
                                    $media_trans->languages_id  = $value->id;
                                    $media_trans->title         = $new_file_name;
                                    $media_trans->description   = "Image";
                                    $media_trans->save();
                                }
                            }

                            $lifestyles_media = new LifestyleMedias;
                            $lifestyles_media->lifestyles_id = $model->id;
                            $lifestyles_media->medias_id     = $media->id;
                            $lifestyles_media->save();
                        }
                    }
                }

                /* UPLOAD COVER IMAGE*/
                if(!empty($extra['cover_image'])){

                    // $model->cover->delete();

                    $url = UrlGenerator::GetUploadsUrl();

                    $file = $extra['cover_image'];
                    $extension = $file->extension();

                    if(self::validateUpload($extension)){
                        $new_file_name = time() . time() . '_travelstyles.' . $file->extension();
                        $new_path = '/uploads/medias/travelstyles/' . $model->id . '/';
                        $file->storeAs( $new_path , $new_file_name);
                        
                        $media = new Media;
                        $media->url = $url . 'medias/travelstyles/' . $model->id . '/' . $new_file_name;
                        $media->type = Media::TYPE_IMAGE;
                        $media->save();
                        
                        $languages = Languages::all();

                        if(!empty($languages)){
                            foreach ($languages as $key => $value) {
                                $media_trans = new MediaTranslations;
                                $media_trans->medias_id     = $media->id;
                                $media_trans->languages_id  = $value->id;
                                $media_trans->title         = $new_file_name;
                                $media_trans->description   = "Image";
                                $media_trans->save();
                            }
                        }

                        $model->cover_media_id = $media->id;
                        $model->save();

                        $lifestyle_media = new LifestyleMedias;
                        $lifestyle_media->lifestyles_id = $model->id;
                        $lifestyle_media->medias_id     = $media->id;
                        $lifestyle_media->save();
                    }
                }elseif(!empty($extra['media_cover_image'])){
                    $model->cover_media_id = $extra['media_cover_image'];
                    $model->save();
                }

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
    public function update($model_id , $model, array $input, $extra)
    {
        $model = Lifestyle::findOrFail(['id' => $model_id]);
        $model = $model[0];

        // $this->removeTranslations($model_id);
        // echo '<pre>';
        // print_r($model->medias);
        // exit;
        if(!empty($extra['delete-images'])){
            $images_arr = explode(',' , $extra['delete-images']);
            
            if(!empty($images_arr)){
                foreach ($images_arr as $key => $value) {
                    $temp = LifestyleMedias::where(['medias_id' => $value,'lifestyles_id' => $model->id])->first();
                    
                    if(!empty($temp)){
                        $temp->delete();
                    }
                }
            }
        }

        DB::transaction(function () use ($model_id , $model, $input, $extra) {
            $check = 1;
            // if ($model->save()) {

            if(!empty($extra['files'])){
                    
                $url = UrlGenerator::GetUploadsUrl();
                $i = 0;
                foreach ($extra['files'] as $key => $file) {
                    $extension = $file->extension();

                    if(self::validateUpload($extension)){
                        $new_file_name = time() . $i++ . '_lifestyles.' . $file->extension();
                        $new_path = '/uploads/medias/lifestyles/' . $model->id . '/';
                        $file->storeAs( $new_path , $new_file_name);
                        
                        $media = new Media;
                        $media->url  = $url . 'medias/lifestyles/' . $model->id . '/' . $new_file_name;
                        $media->type = Media::TYPE_IMAGE;
                        $media->save();
                        
                        $languages = Languages::all();

                        if(!empty($languages)){
                            foreach ($languages as $key => $value) {
                                $media_trans                = new MediaTranslations;
                                $media_trans->medias_id     = $media->id;
                                $media_trans->languages_id  = $value->id;
                                $media_trans->title         = $new_file_name;
                                $media_trans->description   = "Image";
                                $media_trans->save();
                            }
                        }

                        $lifestyle_media = new LifestyleMedias;
                        $lifestyle_media->lifestyles_id = $model->id;
                        $lifestyle_media->medias_id     = $media->id;
                        $lifestyle_media->save();
                        
                        $check = true;
                    }
                }
            }

            /* UPLOAD COVER IMAGE*/
            if(!empty($extra['cover_image'])){

                // $model->cover->delete();
                $url = UrlGenerator::GetUploadsUrl();

                $file = $extra['cover_image'];
                $extension = $file->extension();

                if(self::validateUpload($extension)){
                    $new_file_name = time() . time() . '_lifestyles.' . $file->extension();
                    $new_path = '/uploads/medias/lifestyles/' . $model->id . '/';
                    $file->storeAs( $new_path , $new_file_name);
                    
                    $media = new Media;
                    $media->url = $url . 'medias/lifestyles/' . $model->id . '/' . $new_file_name;
                    $media->type = Media::TYPE_IMAGE;
                    $media->save();
                    
                    $languages = Languages::all();

                    if(!empty($languages)){
                        foreach ($languages as $key => $value) {
                            $media_trans = new MediaTranslations;
                            $media_trans->medias_id     = $media->id;
                            $media_trans->languages_id  = $value->id;
                            $media_trans->title         = $new_file_name;
                            $media_trans->description   = "Image";
                            $media_trans->save();
                        }
                    }

                    $model->cover_media_id = $media->id;
                    $model->save();

                    $lifestyle_media = new LifestyleMedias;
                    $lifestyle_media->lifestyles_id = $model->id;
                    $lifestyle_media->medias_id     = $media->id;
                    $lifestyle_media->save();

                    $check = true;
                }
            }elseif(!empty($extra['media_cover_image'])){
                
                $model->cover_media_id = $extra['media_cover_image'];
                $model->save();
                $check = true;
            }

            if($extra['remove-cover-image'] == 1){
                $model->cover_media_id = null;
                $model->save();

                $check = true;
            }

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

    public static function validateUpload($extension) {
        
        $extension = strtolower($extension);

        switch($extension){
            case 'jpeg':
                return true;
            case 'jpg':
                return true;
                break;
            case 'png':
                return true;
                break;
            case 'gif':
                return true;
                break;
            default:
                return false;
        }
    }
}
