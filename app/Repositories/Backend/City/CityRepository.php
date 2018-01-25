<?php

namespace App\Repositories\Backend\City;

use App\Models\City\Cities;
use App\Models\City\CitiesTranslations;
use App\Models\City\CitiesAirports;
use App\Models\City\CitiesCurrencies;
use App\Models\City\CitiesEmergencyNumbers;
use App\Models\City\CitiesHolidays;
use App\Models\City\CitiesLanguagesSpoken;
use App\Models\City\CitiesAdditionalLanguages;
use App\Models\City\CitiesLifestyles;
use App\Models\City\CitiesMedias;
use App\Models\City\CitiesReligions;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Backend\Access\Role\RoleRepository;

use App\Models\ActivityMedia\Media;
use App\Models\ActivityMedia\MediaTranslations;
use App\Models\Access\language\Languages;

use App\Helpers\UrlGenerator;

/**
 * Class CityRepository.
 */
class CityRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Cities::class;

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
        $dataTableQuery = $this->query()
            // ->with('roles')
            ->with('transsingle')
            ->select([
                config('locations.city_table').'.id',
                config('locations.city_table').'.code',
                config('locations.city_table').'.lat',
                config('locations.city_table').'.lng',
                config('locations.city_table').'.countries_id',
                config('locations.city_table').'.active'
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }

    /**
     * @param array $input
     */
    public function create($input , $extra)
    {
        $model                  = new Cities;
        $model->countries_id    = $extra['countries_id'];
        $model->active          = $extra['active'];
        $model->is_capital      = $extra['is_capital'];
        $model->code            = $extra['code'];
        $model->lat             = $extra['lat'];
        $model->lng             = $extra['lng'];
        // $model->safety_degree_id = $extra['safety_degree_id'];
        $model->level_of_living_id = $extra['level_of_living_id'];

        DB::transaction(function () use ($model, $input, $extra) {
            $check = 1;

            if ($model->save()) {

                if(!empty($extra['files'])){
                    
                    $url = UrlGenerator::GetUploadsUrl();
                    $i = 0;
                    foreach ($extra['files'] as $key => $file) {
                        $extension = $file->extension();

                        if(self::validateUpload($extension)){
                            $new_file_name = time() . $i++ . '_city.' . $file->extension();
                            $new_path = '/uploads/medias/cities/' . $model->id . '/';
                            $file->storeAs( $new_path , $new_file_name);
                            
                            $media = new Media;
                            $media->url = $url . 'medias/cities/' . $model->id . '/' . $new_file_name;
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

                            $cities_media = new CitiesMedias;
                            $cities_media->cities_id = $model->id;
                            $cities_media->medias_id = $media->id;
                            $cities_media->save();
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
                        $new_file_name = time() . time() . '_cities.' . $file->extension();
                        $new_path = '/uploads/medias/cities/' . $model->id . '/';
                        $file->storeAs( $new_path , $new_file_name);
                        
                        $media = new Media;
                        $media->url = $url . 'medias/cities/' . $model->id . '/' . $new_file_name;
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

                        $model->cover_media_id = $media->id;
                        $model->save();

                        $cities_media = new CitiesMedias;
                        $cities_media->cities_id    = $model->id;
                        $cities_media->medias_id    = $media->id;
                        $cities_media->save();
                    }
                }elseif(!empty($extra['media_cover_image'])){
                    $model->cover_media_id = $extra['media_cover_image'];
                    $model->save();
                }

                /* Entry in CityMedias table */
                if(!empty($extra['medias'])){
                    foreach ($extra['medias'] as $key => $value) {
                        $medias = new CitiesMedias;
                        $medias->cities_id = $model->id;
                        $medias->medias_id = $value;
                        $medias->save();
                    }
                }

                /* Entry in LanguagesSpoken table */
                if(!empty($extra['languages_spoken'])){
                    foreach ($extra['languages_spoken'] as $key => $value) {
                        $languagesSpoken = new CitiesLanguagesSpoken;
                        $languagesSpoken->cities_id = $model->id;
                        $languagesSpoken->languages_spoken_id = $value;
                        $languagesSpoken->save();
                    }
                }

                /* Entry in AdditionalLanguagesSpoken table */
                if(!empty($extra['additional_languages_spoken'])){
                    foreach ($extra['additional_languages_spoken'] as $key => $value) {
                        $languagesSpoken = new CitiesAdditionalLanguages;
                        $languagesSpoken->cities_id = $model->id;
                        $languagesSpoken->languages_spoken_id = $value;
                        $languagesSpoken->save();
                    }
                }

                /* Entry in Religions table */
                if(!empty($extra['religions'])){
                    foreach ($extra['religions'] as $key => $value) {
                        $religions = new CitiesReligions;
                        $religions->cities_id = $model->id;
                        $religions->religions_id = $value;
                        $religions->save();
                    }
                }

                /* Entry in CitiesLifestyles table */
                if(!empty($extra['lifestyles'])){
                    foreach ($extra['lifestyles'] as $key => $value) {
                        $lifestyles = new CitiesLifestyles;
                        $lifestyles->cities_id = $model->id;
                        $lifestyles->lifestyles_id = $value;
                        $lifestyles->save();
                    }
                }

                /* Entry in EmergencyNumbers table */
                if(!empty($extra['emergency_numbers'])){
                    foreach ($extra['emergency_numbers'] as $key => $value) {
                        $emergencyNum = new CitiesEmergencyNumbers;
                        $emergencyNum->cities_id = $model->id;
                        $emergencyNum->emergency_numbers_id = $value;
                        $emergencyNum->save();
                    }
                }

                /* Entry in CitiesHolidays table */
                if(!empty($extra['holidays'])){
                    foreach ($extra['holidays'] as $key => $value) {
                        $citiesHolidays = new CitiesHolidays;
                        $citiesHolidays->cities_id = $model->id;
                        $citiesHolidays->holidays_id = $value;
                        $citiesHolidays->save();
                    }
                }

                /* Entry in CitiesAirports table */
                if(!empty($extra['places'])){
                    foreach ($extra['places'] as $key => $value) {
                        $place = new CitiesAirports;
                        $place->cities_id = $model->id;
                        $place->places_id = $value;
                        $place->save();
                    }
                }

                /* Entry in CitiesCurrencies table */
                if(!empty($extra['currencies'])){
                    foreach ($extra['currencies'] as $key => $value) {
                        $airport = new CitiesCurrencies;
                        $airport->cities_id = $model->id;
                        $airport->currencies_id = $value;
                        $airport->save();
                    }
                }

                foreach ($input as $key => $value) {
                    $trans = new CitiesTranslations;
                    $trans->cities_id = $model->id;
                    $trans->languages_id = $key;
                    $trans->title        = $value['title_'.$key];
                    $trans->description  = $value['description_'.$key];
                    // $trans->best_place   = $value['best_place_'.$key];
                    $trans->best_time    = $value['best_time_'.$key];
                    $trans->cost_of_living = $value['cost_of_living_'.$key];
                    $trans->geo_stats    = $value['geo_stats_'.$key];
                    $trans->demographics = $value['demographics_'.$key];
                    // $trans->economy      = $value['economy_'.$key];
                    // $trans->suitable_for      = $value['suitable_for_'.$key];

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
        $model = Cities::findOrFail(['id' => $id]);
        $model = $model[0];
        $model->countries_id  = $extra['countries_id'];
        $model->active      = $extra['active'];
        $model->is_capital  = $extra['is_capital'];
        $model->code        = $extra['code'];
        $model->lat         = $extra['lat'];
        $model->lng         = $extra['lng'];
        // $model->safety_degree_id = $extra['safety_degree_id'];

        /* Delete Previous CitiesTranslations */
        $prev = CitiesTranslations::where(['cities_id' => $id])->get();
        if(!empty($prev)){
            foreach ($prev as $key => $value) {
                $value->delete();
            }
        }

        /* Delete Previous CitiesAirports */
        $prev_airports = CitiesAirports::where(['cities_id' => $id])->get();
        if(!empty($prev_airports)){
            foreach ($prev_airports as $key => $value) {
                $value->delete();
            }
        }

        /* Delete Previous CitiesCurrencies */
        $prev_currencies = CitiesCurrencies::where(['cities_id' => $id])->get();
        if(!empty($prev_currencies)){
            foreach ($prev_currencies as $key => $value) {
                $value->delete();
            }
        }

        /* Delete Previous CitiesNumbers */
        $prev_numbers = CitiesEmergencyNumbers::where(['cities_id' => $id])->get();
        if(!empty($prev_numbers)){
            foreach ($prev_numbers as $key => $value) {
                $value->delete();
            }
        }

        /* Delete Previous CitiesHolidays */
        $prev_holidays = CitiesHolidays::where(['cities_id' => $id])->get();
        if(!empty($prev_holidays)){
            foreach ($prev_holidays as $key => $value) {
                $value->delete();
            }
        }

        /* Delete Previous CitiesLanguagesSpoken */
        $prev_languages_spoken = CitiesLanguagesSpoken::where(['cities_id' => $id])->get();
        if(!empty($prev_languages_spoken)){
            foreach ($prev_languages_spoken as $key => $value) {
                $value->delete();
            }
        }

        /* Delete Previous CitiesAdditionalLanguagesSpoken */
        $prev_languages_spoken = CitiesAdditionalLanguages::where(['cities_id' => $id])->get();
        if(!empty($prev_languages_spoken)){
            foreach ($prev_languages_spoken as $key => $value) {
                $value->delete();
            }
        }

        /* Delete Previous CitiesLifestyles */
        $prev_lifestyles = CitiesLifestyles::where(['cities_id' => $id])->get();
        if(!empty($prev_lifestyles)){
            foreach ($prev_lifestyles as $key => $value) {
                $value->delete();
            }
        }

        /* Delete Previous CitiesMedias */
        $prev_medias = CitiesMedias::where(['cities_id' => $id])->get();
        if(!empty($prev_medias)){
            foreach ($prev_medias as $key => $value) {
                if($value->medias->type == null){
                    $value->delete();
                }
            }
        }

        /* Delete Previous CitiesReligions */
        $prev_religions = CitiesReligions::where(['cities_id' => $id])->get();
        if(!empty($prev_religions)){
            foreach ($prev_religions as $key => $value) {
                $value->delete();
            }
        }

        if(!empty($extra['delete-images'])){
            $images_arr = explode(',' , $extra['delete-images']);
            
            if(!empty($images_arr)){
                foreach ($images_arr as $key => $value) {
                    $temp = Media::where(['id' => $value])->first();
                    
                    if(!empty($temp)){
                        if($temp->type == Media::TYPE_IMAGE){
                            $city_media = CitiesMedias::where(['medias_id' => $temp->id])->first();
                            $path = storage_path() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'medias' . DIRECTORY_SEPARATOR . 'cities' . DIRECTORY_SEPARATOR;
                            
                            if(!empty($city_media)){
                                $filename = explode('/',$temp->url);
                                $filename = end($filename);
                                $path .= $city_media->cities_id . DIRECTORY_SEPARATOR;
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
                            $new_file_name = time() . $i++ . '_city.' . $file->extension();
                            $new_path = '/uploads/medias/cities/' . $model->id . '/';
                            $file->storeAs( $new_path , $new_file_name);
                            
                            $media = new Media;
                            $media->url = $url . 'medias/cities/' . $model->id . '/' . $new_file_name;
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

                            $cities_media = new CitiesMedias;
                            $cities_media->cities_id = $model->id;
                            $cities_media->medias_id = $media->id;
                            $cities_media->save();
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
                        $new_file_name = time() . time() . '_city.' . $file->extension();
                        $new_path = '/uploads/medias/cities/' . $model->id . '/';
                        $file->storeAs( $new_path , $new_file_name);
                        
                        $media = new Media;
                        $media->url = $url . 'medias/cities/' . $model->id . '/' . $new_file_name;
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

                        $model->cover_media_id = $media->id;
                        $model->save();

                        $city_media = new CitiesMedias;
                        $city_media->cities_id  = $model->id;
                        $city_media->medias_id  = $media->id;
                        $city_media->save();
                    }
                }elseif(!empty($extra['media_cover_image'])){
                    $model->cover_media_id = $extra['media_cover_image'];
                    $model->save();
                }

                if($extra['remove-cover-image'] == 1){
                    $model->cover_media_id = null;
                    $model->save();
                }

                /* Entry in CityMedias table */
                if(!empty($extra['medias'])){
                    foreach ($extra['medias'] as $key => $value) {
                        $medias = new CitiesMedias;
                        $medias->cities_id = $model->id;
                        $medias->medias_id = $value;
                        $medias->save();
                    }
                }

                /* Entry in CityReligions table */
                if(!empty($extra['religions'])){
                    foreach ($extra['religions'] as $key => $value) {
                        $religions = new CitiesReligions;
                        $religions->cities_id = $model->id;
                        $religions->religions_id = $value;
                        $religions->save();
                    }
                }

                /* Save EmergencyNumbers */
                if(!empty($extra['emergency_numbers'])){
                    foreach ($extra['emergency_numbers'] as $key => $value) {
                        $airport            = new CitiesEmergencyNumbers;
                        $airport->cities_id = $model->id;
                        $airport->emergency_numbers_id = $value;
                        $airport->save();
                    }
                }

                /* Entry in CitiesLifestyles table */
                if(!empty($extra['lifestyles'])){
                    foreach ($extra['lifestyles'] as $key => $value) {
                        $lifestyles = new CitiesLifestyles;
                        $lifestyles->cities_id = $model->id;
                        $lifestyles->lifestyles_id = $value;
                        $lifestyles->save();
                    }
                }

                /* Save CitiesLanguagesSpoken */
                if(!empty($extra['languages_spoken'])){
                    foreach ($extra['languages_spoken'] as $key => $value) {
                        $airport            = new CitiesLanguagesSpoken;
                        $airport->cities_id = $model->id;
                        $airport->languages_spoken_id = $value;
                        $airport->save();
                    }
                }

                /* Save CitiesAdditionalLanguages */
                if(!empty($extra['additional_languages_spoken'])){
                    foreach ($extra['additional_languages_spoken'] as $key => $value) {
                        $airport            = new CitiesAdditionalLanguages;
                        $airport->cities_id = $model->id;
                        $airport->languages_spoken_id = $value;
                        $airport->save();
                    }
                }

                /* Entry in CitiesHolidays table */
                if(!empty($extra['holidays'])){
                    foreach ($extra['holidays'] as $key => $value) {
                        $citiesHolidays = new CitiesHolidays;
                        $citiesHolidays->cities_id = $model->id;
                        $citiesHolidays->holidays_id = $value;
                        $citiesHolidays->save();
                    }
                }

                /* Save CitiesAirports */
                if(!empty($extra['places'])){
                    foreach ($extra['places'] as $key => $value) {
                        $airport            = new CitiesAirports;
                        $airport->cities_id = $model->id;
                        $airport->places_id = $value;
                        $airport->save();
                    }
                }

                /* Save CitiesCurrencies */
                if(!empty($extra['currencies'])){
                    foreach ($extra['currencies'] as $key => $value) {
                        $airport            = new CitiesCurrencies;
                        $airport->cities_id = $model->id;
                        $airport->currencies_id = $value;
                        $airport->save();
                    }
                }

                /* Store New CitiesTranslations */
                foreach ($input as $key => $value) {
                    $trans                  = new CitiesTranslations;
                    $trans->cities_id       = $model->id;
                    $trans->languages_id    = $key;
                    $trans->title           = $value['title_'.$key];
                    $trans->description     = $value['description_'.$key];
                    // $trans->best_place      = $value['best_place_'.$key];
                    $trans->best_time       = $value['best_time_'.$key];
                    $trans->cost_of_living  = $value['cost_of_living_'.$key];
                    $trans->geo_stats       = $value['geo_stats_'.$key];
                    $trans->demographics    = $value['demographics_'.$key];
                    // $trans->economy         = $value['economy_'.$key];
                    // $trans->suitable_for    = $value['suitable_for_'.$key];

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
