<?php

namespace App\Repositories\Backend\Place;

use App\Models\Place\Place;
use App\Models\Place\PlaceTranslations;
use App\Models\Place\Relationship\PlaceRelationship;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Backend\Access\Role\RoleRepository;
use App\Models\Place\PlaceMedias;

use App\Models\ActivityMedia\Media;
use App\Models\ActivityMedia\MediaTranslations;
use App\Models\Access\language\Languages;

use App\Helpers\UrlGenerator;


/**
 * Class PlaceRepository.
 */
class PlaceRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Place::class;

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
    public function getForDataTable($media = null)
    {
        /**
         * Note: You must return deleted_at or the User getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
        if($media == '3'){
            $dataTableQuery = $this->query()
            // ->with('roles')
            ->with('transsingle')
            ->with('city')
            ->with('country')
            ->select([
                config('locations.place_table').'.id',
                config('locations.place_table').'.cities_id',
                config('locations.place_table').'.countries_id',
                config('locations.place_table').'.place_type',
                config('locations.place_table').'.media_done',
                config('locations.place_table').'.active'
            ]);
        }else{
            $dataTableQuery = $this->query()
                // ->with('roles')
                ->with('transsingle')
                ->with('city')
                ->with('country')
                ->select([
                    config('locations.place_table').'.id',
                    config('locations.place_table').'.cities_id',
                    config('locations.place_table').'.countries_id',
                    config('locations.place_table').'.place_type',
                    config('locations.place_table').'.media_done',
                    config('locations.place_table').'.active'
                ]);
            if($media == '1' || $media == 1){
                $dataTableQuery = $dataTableQuery->where('media_done', '=' ,0);
            }else{
                $dataTableQuery = $dataTableQuery->where('media_done','=',1);
            }
        }

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }

    /**
     * @param array $input
     */
    public function create($input , $extra)
    {
        $model = new Place;
        $model->countries_id  = $extra['countries_id'];
        $model->cities_id  = $extra['cities_id'];
        // $model->place_type_ids  = $extra['place_types_ids'];
        $model->active      = $extra['active'];
        $model->lat         = $extra['lat'];
        $model->lng         = $extra['lng'];
        $model->safety_degrees_id = $extra['safety_degrees_id'];
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
                            $new_file_name = time() . $i++ . '_place.' . $file->extension();
                            $new_path = '/uploads/medias/places/' . $model->id . '/';
                            $file->storeAs( $new_path , $new_file_name);

                            $media = new Media;
                            $media->url = $url . 'medias/places/' . $model->id . '/' . $new_file_name;
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

                            $place_media = new PlaceMedias;
                            $place_media->places_id = $model->id;
                            $place_media->medias_id = $media->id;
                            $place_media->save();
                        }
                    }
                }

                if(!empty($extra['medias'])){
                    foreach ($extra['medias'] as $key => $value) {
                       $PlaceMedias = new PlaceMedias;
                       $PlaceMedias->places_id = $model->id;
                       $PlaceMedias->medias_id = $value;
                       $PlaceMedias->save();
                    }
                }

                foreach ($input as $key => $value) {
                    $trans                  = new PlaceTranslations;
                    $trans->places_id       = $model->id;
                    $trans->languages_id    = $key;
                    $trans->title           = $value['title_'.$key];
                    $trans->description     = $value['description_'.$key];
                    $trans->address         = $value['address_'.$key];
                    $trans->phone           = $value['phone_'.$key];
                    $trans->highlights      = $value['highlights_'.$key];
                    $trans->working_days    = $value['working_days_'.$key];
                    $trans->working_times   = $value['working_times_'.$key];
                    $trans->how_to_go       = $value['how_to_go_'.$key];
                    $trans->when_to_go      = $value['when_to_go_'.$key];
                    $trans->num_activities  = $value['num_activities_'.$key];
                    $trans->popularity      = $value['popularity_'.$key];

                    $trans->conditions      = $value['conditions_'.$key];
                    $trans->price_level     = $value['price_level_'.$key];
                    $trans->num_checkins    = $value['num_checkins_'.$key];
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
        $model = Place::findOrFail(['id' => $id]);
        $model = $model[0];
        $model->countries_id  = $extra['countries_id'];
        $model->cities_id  = $extra['cities_id'];
        //$model->place_type_ids  = $extra['place_types_ids'];
        $model->active      = $extra['active'];
        $model->lat         = $extra['lat'];
        $model->lng         = $extra['lng'];
        $model->safety_degrees_id = $extra['safety_degrees_id'];

        $prev = PlaceTranslations::where(['places_id' => $id])->get();
        if(!empty($prev)){
            foreach ($prev as $key => $value) {
                $value->delete();
            }
        }

        /*
        $prev_medias = PlaceMedias::where(['places_id' => $id])->get();
        if(!empty($prev_medias)){
            foreach ($prev_medias as $key => $value) {
                if($value->media->type == null){
                    $value->delete();
                }
            }
        }

        if(!empty($extra['delete-images'])){
            $images_arr = explode(',' , $extra['delete-images']);

            if(!empty($images_arr)){
                foreach ($images_arr as $key => $value) {
                    $temp = Media::where(['id' => $value])->first();

                    if(!empty($temp)){
                        if($temp->type == Media::TYPE_IMAGE){
                            $places_media = PlaceMedias::where(['medias_id' => $temp->id])->first();
                            $path = storage_path() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'medias' . DIRECTORY_SEPARATOR . 'places' . DIRECTORY_SEPARATOR;
                            if(!empty($places_media)){

                                $filename = explode('/',$temp->url);
                                $filename = end($filename);
                                $path .= $places_media->places_id . DIRECTORY_SEPARATOR;
                                $path .= $filename;

                                if(is_file($path)){
                                    unlink($path);
                                }
                            }
                            $temp->delete();
                        }
                    }
                }
            }
        }*/

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
                            $new_path = '/uploads/medias/places/' . $model->id . '/';
                            $file->storeAs( $new_path , $new_file_name);

                            $media = new Media;
                            $media->url = $url . 'medias/places/' . $model->id . '/' . $new_file_name;
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

                            $place_media = new PlaceMedias;
                            $place_media->places_id = $model->id;
                            $place_media->medias_id = $media->id;
                            $place_media->save();
                        }
                    }
                }

                if(!empty($extra['medias'])){
                    foreach ($extra['medias'] as $key => $value) {
                       $PlaceMedias = new PlaceMedias;
                       $PlaceMedias->places_id = $model->id;
                       $PlaceMedias->medias_id = $value;
                       $PlaceMedias->save();
                    }
                }

                foreach ($input as $key => $value) {
                    $trans = new PlaceTranslations;
                    $trans->places_id       = $model->id;
                    $trans->languages_id    = $key;
                    $trans->title           = $value['title_'.$key];
                    $trans->description     = $value['description_'.$key];
                    $trans->address         = $value['address_'.$key];
                    $trans->phone           = $value['phone_'.$key];
                    $trans->highlights      = $value['highlights_'.$key];
                    $trans->working_days    = $value['working_days_'.$key];
                    $trans->working_times   = $value['working_times_'.$key];
                    $trans->how_to_go       = $value['how_to_go_'.$key];
                    $trans->when_to_go      = $value['when_to_go_'.$key];
                    $trans->num_activities  = $value['num_activities_'.$key];
                    $trans->popularity      = $value['popularity_'.$key];
                    $trans->conditions      = $value['conditions_'.$key];
                    $trans->price_level     = $value['price_level_'.$key];
                    $trans->num_checkins    = $value['num_checkins_'.$key];
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
