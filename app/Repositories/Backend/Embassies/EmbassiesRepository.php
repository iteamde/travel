<?php

namespace App\Repositories\Backend\Embassies;

/* Embassies Models Start */
use App\Models\Embassies\Embassies;
use App\Models\Embassies\EmbassiesTranslations;
/* Embassies Models End */

use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Backend\Access\Role\RoleRepository;
use App\Models\Embassies\EmbassiesMedias;
use App\Models\ActivityMedia\Media;
use App\Models\ActivityMedia\MediaTranslations;

use App\Helpers\UrlGenerator;

/**
 * Class EmbassiesRepository.
 */
class EmbassiesRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Embassies::class;

    /**
     * @var RoleRepository
     */
    protected $role;

    /**
     * @param RoleRepository $role
     */
    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }

    /**
     * @param        $permissions
     * @param string $by
     *
     * @return mixed
     */
    public function getByPermission($permissions, $by = 'name')
    {
        if (! is_array($permissions)) {
            $permissions = [$permissions];
        }

        return $this->query()->whereHas('roles.permissions', function ($query) use ($permissions, $by) {
            $query->whereIn('permissions.'.$by, $permissions);
        })->get();
    }

    /**
     * @param        $roles
     * @param string $by
     *
     * @return mixed
     */
    public function getByRole($roles, $by = 'name')
    {
        if (! is_array($roles)) {
            $roles = [$roles];
        }

        return $this->query()->whereHas('roles', function ($query) use ($roles, $by) {
            $query->whereIn('roles.'.$by, $roles);
        })->get();
    }

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
        $records = Embassies::offset(0)->limit(10)->get();
        echo '<pre>';
        print_r($records);
        exit;
        $dataTableQuery = $this->query()
            // ->with('roles')
            ->with('transsingle')
            ->select([
                 config('embassies.embassies_table').'.id',
                config('embassies.embassies_table').'.lat',
                config('embassies.embassies_table').'.lng',
                config('embassies.embassies_table').'.cities_id',
                config('embassies.embassies_table').'.active',
                config('embassies.embassies_table').'.place_type',
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }

    /**
     * @param array $input
     */
    public function create($input , $extra)
    {
        $model                  = new Embassies;
        $model->countries_id    = $extra['country_id'];
        $model->cities_id  = $extra['cities_id'];
        $model->active          = $extra['active'];
        $model->lat             = $extra['lat'];
        $model->lng             = $extra['lng'];
        // $model->safety_degrees_id = $extra['safety_degrees_id'];
        $model->provider_id = 0;

        DB::transaction(function () use ($model, $input, $extra) {
            $check = 1;
            
            if ($model->save()) {

                if(!empty($extra['files'])){

                    $url = UrlGenerator::GetUploadsUrl();
                    $i = 0;
                    foreach ($extra['files'] as $key => $file) {
                        $extension = $file->extension();

                        if(self::validateUpload($extension)){
                            $new_file_name = time() . $i++ . '_embassy.' . $file->extension();
                            $new_path = '/uploads/medias/embassies/' . $model->id . '/';
                            $file->storeAs( $new_path , $new_file_name);

                            $media = new Media;
                            $media->url = $url . 'medias/embassies/' . $model->id . '/' . $new_file_name;
                            $media->type = Media::TYPE_IMAGE;
                            $media->save();

                            $languages = Languages::all();

                            if(!empty($languages)){
                                foreach ($languages as $key => $value) {
                                    $media_trans = new MediaTranslations;
                                    $media_trans->medias_id = $media->id;
                                    $media_trans->languages_id = $value->id;
                                    $media_trans->title = $new_file_name;
                                    $media_trans->description = "Image";
                                    $media_trans->save();
                                }
                            }

                            $embassies_media = new EmbassiesMedias;
                            $embassies_media->embassies_id = $model->id;
                            $embassies_media->medias_id = $media->id;
                            $embassies_media->save();
                        }
                    }
                }

                if(!empty($extra['medias'])){
                    foreach ($extra['medias'] as $key => $value) {
                       $EmbassyMedias = new EmbassiesMedias;
                       $EmbassyMedias->embassies_id = $model->id;
                       $EmbassyMedias->medias_id = $value;
                       $EmbassyMedias->save();
                    }
                }

                /* Store Different Translation of $this Embassies */
                foreach ($input as $key => $value) {
                    $trans = new EmbassiesTranslations;
                    $trans->embassies_id = $model->id;
                    $trans->languages_id = $key;
                    $trans->title        = $value['title_'.$key];
                    $trans->description  = $value['description_'.$key];

                    $trans->address         = $value['address_'.$key];
                    $trans->phone           = $value['phone_'.$key];
                    // $trans->highlights      = $value['highlights_'.$key];
                    $trans->working_days    = $value['working_days_'.$key];
                    // $trans->working_times   = $value['working_times_'.$key];
                    // $trans->how_to_go       = $value['how_to_go_'.$key];
                    $trans->when_to_go      = $value['when_to_go_'.$key];
                    // $trans->num_activities  = $value['num_activities_'.$key];
                    // $trans->popularity      = $value['popularity_'.$key];

                    // $trans->conditions      = $value['conditions_'.$key];
                    $trans->price_level     = $value['price_level_'.$key];
                    // $trans->num_checkins    = $value['num_checkins_'.$key];
                    $trans->history         = $value['history_'.$key];
                    
                    if(!$trans->save()) {
                        $check = 0;
                    }
                }

                if($check){
                    return true;
                }
            }

            throw new GeneralException('Unexpected Error Occured!');
        });
    }

    
    /**
     * @param array $input
     */
    public function update($id , $model , $input , $extra)
    {
        $model                  = Embassies::findOrFail(['id' => $id]);
        $model                  = $model[0];
        $model->countries_id    = $extra['country_id'];
        $model->cities_id  = $extra['cities_id'];
        $model->active          = $extra['active'];
        $model->lat             = $extra['lat'];
        $model->lng             = $extra['lng'];
        // $model->safety_degrees_id = $extra['safety_degrees_id'];
        $model->provider_id = 0;
        
        /* Delete Previous EmbassiesTranslations */
        $prev = EmbassiesTranslations::where(['embassies_id' => $id])->get();
        if(!empty($prev)){
            foreach ($prev as $key => $value) {
                $value->delete();
            }
        }

        DB::transaction(function () use ($model, $input, $extra) {
            $check = 1;
            
            if ($model->save()) {

                if(!empty($extra['files'])){

                    $url = UrlGenerator::GetUploadsUrl();
                    $i = 0;
                    foreach ($extra['files'] as $key => $file) {
                        $extension = $file->extension();

                        if(self::validateUpload($extension)){
                            $new_file_name = time() . $i++ . '_place.' . $file->extension();
                            $new_path = '/uploads/medias/embassies/' . $model->id . '/';
                            $file->storeAs( $new_path , $new_file_name);

                            $media = new Media;
                            $media->url = $url . 'medias/embassies/' . $model->id . '/' . $new_file_name;
                            $media->type = Media::TYPE_IMAGE;
                            $media->save();

                            $languages = Languages::all();

                            if(!empty($languages)){
                                foreach ($languages as $key => $value) {
                                    $media_trans = new MediaTranslations;
                                    $media_trans->medias_id = $media->id;
                                    $media_trans->languages_id = $value->id;
                                    $media_trans->title = $new_file_name;
                                    $media_trans->description = "Image";
                                    $media_trans->save();
                                }
                            }

                            $embassies_media = new EmbassiesMedias;
                            $embassies_media->embassies_id = $model->id;
                            $embassies_media->medias_id = $media->id;
                            $embassies_media->save();
                        }
                    }
                }

                if(!empty($extra['medias'])){
                    foreach ($extra['medias'] as $key => $value) {
                       $$EmbassyMedias = new EmbassiesMedias;
                       $EmbassyMedias->embassies_id = $model->id;
                       $EmbassyMedias->medias_id = $value;
                       $EmbassyMedias->save();
                    }
                }

                /* Store New Translations For $this Embassies */
                foreach ($input as $key => $value) {
                    $trans = new EmbassiesTranslations;
                    $trans->embassies_id = $model->id;
                    $trans->languages_id = $key;
                    $trans->title        = $value['title_'.$key];
                    $trans->description  = $value['description_'.$key];
                    $trans->address         = $value['address_'.$key];
                    $trans->phone           = $value['phone_'.$key];
                    // $trans->highlights      = $value['highlights_'.$key];
                    $trans->working_days    = $value['working_days_'.$key];
                    // $trans->working_times   = $value['working_times_'.$key];
                    // $trans->how_to_go       = $value['how_to_go_'.$key];
                    $trans->when_to_go      = $value['when_to_go_'.$key];
                    // $trans->num_activities  = $value['num_activities_'.$key];
                    // $trans->popularity      = $value['popularity_'.$key];

                    // $trans->conditions      = $value['conditions_'.$key];
                    $trans->price_level     = $value['price_level_'.$key];
                    // $trans->num_checkins    = $value['num_checkins_'.$key];
                    $trans->history         = $value['history_'.$key];
            
                    if(!$trans->save()) {
                        $check = 0;
                    }
                }

                if($check){
                    return true;
                }
            }

            throw new GeneralException('Unexpected Error Occured!');
        });
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
