<?php

namespace App\Repositories\Backend\Country;

/* Country Models Start */
use App\Models\Country\Countries;
use App\Models\Country\CountriesTranslations;
use App\Models\Country\CountriesAirports;
use App\Models\Country\CountriesCurrencies;
use App\Models\Country\CountriesCapitals;
use App\Models\Country\CountriesHolidays;
use App\Models\Country\CountriesEmergencyNumbers;
use App\Models\Country\CountriesLanguagesSpoken;
use App\Models\Country\CountriesAdditionalLanguages;
use App\Models\Country\CountriesLifestyles;
use App\Models\Country\CountriesMedias;
use App\Models\Country\CountriesReligions;
/* Country Models End */

use App\Models\ActivityMedia\Media;
use App\Models\ActivityMedia\MediaTranslations;
use App\Models\Access\language\Languages;

use App\Helpers\UrlGenerator;

use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Backend\Access\Role\RoleRepository;

/**
 * Class CountryRepository.
 */
class CountryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Countries::class;

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
                config('locations.country_table').'.id',
                config('locations.country_table').'.code',
                config('locations.country_table').'.lat',
                config('locations.country_table').'.lng',
                config('locations.country_table').'.active'
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }

    /**
     * @param array $input
     */
    public function create($input , $extra)
    {
        $model = new Countries;
        $model->regions_id  = $extra['region_id'];
        $model->active      = $extra['active'];
        $model->code        = $extra['code'];
        $model->lat         = $extra['lat'];
        $model->lng         = $extra['lng'];
        // $model->safety_degree_id = $extra['safety_degree_id'];

        DB::transaction(function () use ($model, $input, $extra) {
            $check = 1;
            
            if ($model->save()) {

                if(!empty($extra['files'])){
                    
                    $url = UrlGenerator::GetUploadsUrl();
                    $i = 0;
                    foreach ($extra['files'] as $key => $file) {
                        $extension = $file->extension();
                        
                        if(self::validateUpload($extension)){
                            $new_file_name = time() . $i++ . '_country.' . $file->extension();
                            $new_path = '/storage/app/public/medias/countries/' . $model->id . '/';
                            $file->storeAs( $new_path , $new_file_name);
                            
                            $media = new Media;
                            $media->url = $url . 'medias/countries/' . $model->id . '/' . $new_file_name;
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

                            $country_media = new CountriesMedias;
                            $country_media->countries_id = $model->id;
                            $country_media->medias_id = $media->id;
                            $country_media->save();
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
                        $new_file_name = time() . time() . '_country.' . $file->extension();
                        $new_path = '/storage/app/public/medias/countries/' . $model->id . '/';
                        $file->storeAs( $new_path , $new_file_name);
                        
                        $media = new Media;
                        $media->url = $url . 'medias/countries/' . $model->id . '/' . $new_file_name;
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

                        $country_media = new CountriesMedias;
                        $country_media->countries_id = $model->id;
                        $country_media->medias_id    = $media->id;
                        $country_media->save();
                    }
                }elseif(!empty($extra['media_cover_image'])){
                    $model->cover_media_id = $extra['media_cover_image'];
                    $model->save();
                }
                
                /* ADD Religions IN CountriesReligions */  
                if(!empty($extra['religions'])){
                    foreach ($extra['religions'] as $key => $value) {
                        $CountriesReligions = new CountriesReligions;
                        $CountriesReligions->countries_id = $model->id;
                        $CountriesReligions->religions_id = $value;
                        $CountriesReligions->save();
                    }
                }

                /* ADD Medias IN CountriesMedias */  
                if(!empty($extra['medias'])){
                    foreach ($extra['medias'] as $key => $value) {
                        $CountriesMedias = new CountriesMedias;
                        $CountriesMedias->countries_id = $model->id;
                        $CountriesMedias->medias_id = $value;
                        $CountriesMedias->save();
                    }
                }

                /* ADD LIFESTYLEs IN CountriesLifestyles */  
                if(!empty($extra['lifestyles'])){
                    foreach ($extra['lifestyles'] as $key => $value) {
                        $CountriesLifestyles = new CountriesLifestyles;
                        $CountriesLifestyles->countries_id = $model->id;
                        $CountriesLifestyles->lifestyles_id = $value;
                        $CountriesLifestyles->save();
                    }
                }

                /* ADD LANGUAGES SPOKEN IN CountriesLanguagesSpoken */  
                if(!empty($extra['languages_spoken'])){
                    foreach ($extra['languages_spoken'] as $key => $value) {
                        $CountriesLanguagesSpoken = new CountriesLanguagesSpoken;
                        $CountriesLanguagesSpoken->countries_id = $model->id;
                        $CountriesLanguagesSpoken->languages_spoken_id = $value;
                        $CountriesLanguagesSpoken->save();
                    }
                }

                /* ADD ADDITIONAL LANGUAGES SPOKEN IN CountriesLanguagesSpoken */  
                if(!empty($extra['additional_languages_spoken'])){
                    foreach ($extra['additional_languages_spoken'] as $key => $value) {
                        $CountriesLanguagesSpoken = new CountriesAdditionalLanguages;
                        $CountriesLanguagesSpoken->countries_id = $model->id;
                        $CountriesLanguagesSpoken->languages_spoken_id = $value;
                        $CountriesLanguagesSpoken->save();
                    }
                }

                /* Add Holidays In CountriesHolidays */
                if(!empty($extra['holidays'])){
                    foreach ($extra['holidays'] as $key => $value) {
                        $CountriesHolidays = new CountriesHolidays;
                        $CountriesHolidays->countries_id = $model->id;
                        $CountriesHolidays->holidays_id = $value;
                        $CountriesHolidays->save();
                    }
                }

                /* Add Places In CountriesAirports */
                if(!empty($extra['places'])){
                    foreach ($extra['places'] as $key => $value) {
                        $CountriesAirports = new CountriesAirports;
                        $CountriesAirports->countries_id = $model->id;
                        $CountriesAirports->places_id = $value;
                        $CountriesAirports->save();
                    }
                }

                /* Add Cities in CountriesCapitals */
                if(!empty($extra['cities'])){
                    foreach ($extra['cities'] as $key => $value) {
                        $CountriesCapitals = new CountriesCapitals;
                        $CountriesCapitals->countries_id = $model->id;
                        $CountriesCapitals->cities_id = $value;
                        $CountriesCapitals->save();
                    }
                }

                /* Add Numbers in CountriesEmergencyNumbers */
                if(!empty($extra['emergency_numbers'])){
                    foreach ($extra['emergency_numbers'] as $key => $value) {
                        $CountriesEmergencyNumbers = new CountriesEmergencyNumbers;
                        $CountriesEmergencyNumbers->countries_id = $model->id;
                        $CountriesEmergencyNumbers->emergency_numbers_id = $value;
                        $CountriesEmergencyNumbers->save();
                    }
                }

                /* Add Currencies in Countries Currencies */
                if(!empty($extra['currencies'])){
                    foreach ($extra['currencies'] as $key => $value) {
                        $CountriesCurrencies = new CountriesCurrencies;
                        $CountriesCurrencies->countries_id = $model->id;
                        $CountriesCurrencies->currencies_id = $value;
                        $CountriesCurrencies->save();
                    }
                }

                /* Store Different Translation of $this Country */
                foreach ($input as $key => $value) {
                    $trans = new CountriesTranslations;
                    $trans->countries_id = $model->id;
                    $trans->languages_id = $key;
                    $trans->title        = $value['title_'.$key];
                    $trans->description  = $value['description_'.$key];
                    $trans->nationality  = $value['nationality_'.$key];
                    $trans->population   = $value['population_'.$key];
                    // $trans->best_place   = $value['best_place_'.$key];
                    // $trans->best_time    = $value['best_time_'.$key];
                    $trans->cost_of_living = $value['cost_of_living_'.$key];
                    $trans->geo_stats    = $value['geo_stats_'.$key];
                    $trans->demographics = $value['demographics_'.$key];
                    $trans->economy      = $value['economy_'.$key];
                    $trans->suitable_for      = $value['suitable_for_'.$key];

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
        $model = Countries::findOrFail(['id' => $id]);
        $model = $model[0];
        $model->regions_id  = $extra['region_id'];
        $model->active      = $extra['active'];
        $model->code        = $extra['code'];
        $model->iso_code        = $extra['iso_code'];
        $model->lat         = $extra['lat'];
        $model->lng         = $extra['lng'];
        // $model->safety_degree_id = $extra['safety_degree_id'];

        /* Delete Previous CountriesTranslations */
        $prev = CountriesTranslations::where(['countries_id' => $id])->get();
        if(!empty($prev)){
            foreach ($prev as $key => $value) {
                $value->delete();
            }
        }

        /* Delete Previous CountriesAirports */
        $prev_airports = CountriesAirports::where(['countries_id' => $id])->get();
        if(!empty($prev_airports)){
            foreach ($prev_airports as $key => $value) {
                $value->delete();
            }
        }

        /* Delete Previous CountriesCurrencies */
        $prev_currencies = CountriesCurrencies::where(['countries_id' => $id])->get();
        if(!empty($prev_currencies)){
            foreach ($prev_currencies as $key => $value) {
                $value->delete();
            }
        }

        /* Delete Previous CountriesCapitals */
        $prev_capitals = CountriesCapitals::where(['countries_id' => $id])->get();
        if(!empty($prev_capitals)){
            foreach ($prev_capitals as $key => $value) {
                $value->delete();
            }
        }

        /* Delete Previous CountriesEmergencyNumbers */
        $prev_numbers = CountriesEmergencyNumbers::where(['countries_id' => $id])->get();
        if(!empty($prev_numbers)){
            foreach ($prev_numbers as $key => $value) {
                $value->delete();
            }
        }

        /* Delete Previous CountriesHolidays */
        $prev_holidays = CountriesHolidays::where(['countries_id' => $id])->get();
        if(!empty($prev_holidays)){
            foreach ($prev_holidays as $key => $value) {
                $value->delete();
            }
        }

        /* Delete Previous CountriesLanguagesSpoken */
        $prev_languages_spoken = CountriesLanguagesSpoken::where(['countries_id' => $id])->get();
        if(!empty($prev_languages_spoken)){
            foreach ($prev_languages_spoken as $key => $value) {
                $value->delete();
            }
        }

        /* Delete Previous CountriesAdditionalLanguagesSpoken */
        $prev_languages_spoken = CountriesAdditionalLanguages::where(['countries_id' => $id])->get();
        if(!empty($prev_languages_spoken)){
            foreach ($prev_languages_spoken as $key => $value) {
                $value->delete();
            }
        }

        /* Delete Previous CountriesLifestyles */
        $prev_lifestyles = CountriesLifestyles::where(['countries_id' => $id])->get();
        if(!empty($prev_lifestyles)){
            foreach ($prev_lifestyles as $key => $value) {
                $value->delete();
            }
        }

        /* Delete Previous CountriesMedias */
        $prev_medias = CountriesMedias::where(['countries_id' => $id])->get();
        
        if(!empty($prev_medias)){
            foreach ($prev_medias as $key => $value) {
                if(!empty($value->media)){
                    if($value->media->type != Media::TYPE_IMAGE){
                        $value->delete();
                    }
                }else{
                    $value->delete();
                }
            }
        }

        /* Delete Previous CountriesReligions */
        $prev_religions = CountriesReligions::where(['countries_id' => $id])->get();
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
                            $countries_media = CountriesMedias::where(['medias_id' => $temp->id])->first();
                            $path = storage_path() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'medias' . DIRECTORY_SEPARATOR . 'countries' . DIRECTORY_SEPARATOR;
                            if(!empty($countries_media)){
                                
                                $filename = explode('/',$temp->url);
                                $filename = end($filename);
                                $path .= $countries_media->countries_id . DIRECTORY_SEPARATOR;
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
                            $new_file_name = time() . $i++ . '_country.' . $file->extension();
                            $new_path = '/uploads/medias/countries/' . $model->id . '/';
                            $file->storeAs( $new_path , $new_file_name);
                            
                            $media = new Media;
                            $media->url = $url . 'medias/countries/' . $model->id . '/' . $new_file_name;
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

                            $country_media = new CountriesMedias;
                            $country_media->countries_id = $model->id;
                            $country_media->medias_id = $media->id;
                            $country_media->save();
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
                        $new_file_name = time() . time() . '_country.' . $file->extension();
                        $new_path = '/uploads/medias/countries/' . $model->id . '/';
                        $file->storeAs( $new_path , $new_file_name);
                        
                        $media = new Media;
                        $media->url = $url . 'medias/countries/' . $model->id . '/' . $new_file_name;
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

                        $country_media = new CountriesMedias;
                        $country_media->countries_id = $model->id;
                        $country_media->medias_id    = $media->id;
                        $country_media->save();
                    }
                }elseif(!empty($extra['media_cover_image'])){
                    $model->cover_media_id = $extra['media_cover_image'];
                    $model->save();
                }

                if($extra['remove-cover-image'] == 1){
                    $model->cover_media_id = null;
                    $model->save();
                }

                /* ADD Religions IN CountriesReligions */  
                if(!empty($extra['religions'])){
                    foreach ($extra['religions'] as $key => $value) {
                        $CountriesReligions = new CountriesReligions;
                        $CountriesReligions->countries_id = $model->id;
                        $CountriesReligions->religions_id = $value;
                        $CountriesReligions->save();
                    }
                }

                /* ADD Medias IN CountriesMedias */  
                if(!empty($extra['medias'])){
                    foreach ($extra['medias'] as $key => $value) {
                        $CountriesMedias = new CountriesMedias;
                        $CountriesMedias->countries_id = $model->id;
                        $CountriesMedias->medias_id = $value;
                        $CountriesMedias->save();
                    }
                }

                /* ADD Lifestyles IN CountriesLifestyles */  
                if(!empty($extra['lifestyles'])){
                    foreach ($extra['lifestyles'] as $key => $value) {
                        $CountriesLifestyles = new CountriesLifestyles;
                        $CountriesLifestyles->countries_id = $model->id;
                        $CountriesLifestyles->lifestyles_id = $value;
                        $CountriesLifestyles->save();
                    }
                }

                /* ADD LANGUAGES SPOKEN IN CountriesLanguagesSpoken */  
                if(!empty($extra['languages_spoken'])){
                    foreach ($extra['languages_spoken'] as $key => $value) {
                        $CountriesLanguagesSpoken = new CountriesLanguagesSpoken;
                        $CountriesLanguagesSpoken->countries_id = $model->id;
                        $CountriesLanguagesSpoken->languages_spoken_id = $value;
                        $CountriesLanguagesSpoken->save();
                    }
                }

                /* ADD ADDITIONAL LANGUAGES SPOKEN IN CountriesLanguagesSpoken */  
                if(!empty($extra['additional_languages_spoken'])){
                    foreach ($extra['additional_languages_spoken'] as $key => $value) {
                        $CountriesLanguagesSpoken = new CountriesAdditionalLanguages;
                        $CountriesLanguagesSpoken->countries_id = $model->id;
                        $CountriesLanguagesSpoken->languages_spoken_id = $value;
                        $CountriesLanguagesSpoken->save();
                    }
                }

                /* Add Holidays in CountriesHolidays */
                if(!empty($extra['holidays'])){
                    foreach ($extra['holidays'] as $key => $value) {
                        $CountriesHolidays = new CountriesHolidays;
                        $CountriesHolidays->countries_id = $model->id;
                        $CountriesHolidays->holidays_id = $value;
                        $CountriesHolidays->save();
                    }
                }

                /* Add Places In CountriesAirports */
                if(!empty($extra['places'])){
                    foreach ($extra['places'] as $key => $value) {
                        $CountriesAirports = new CountriesAirports;
                        $CountriesAirports->countries_id = $model->id;
                        $CountriesAirports->places_id = $value;
                        $CountriesAirports->save();
                    }
                }

                /* Add Cities in CountriesCapitals */
                if(!empty($extra['cities'])){
                    foreach ($extra['cities'] as $key => $value) {
                        $CountriesCapitals = new CountriesCapitals;
                        $CountriesCapitals->countries_id = $model->id;
                        $CountriesCapitals->cities_id = $value;
                        $CountriesCapitals->save();
                    }
                }

                /* Add Numbers in CountriesEmergencyNumbers */
                if(!empty($extra['emergency_numbers'])){
                    foreach ($extra['emergency_numbers'] as $key => $value) {
                        $CountriesEmergencyNumbers = new CountriesEmergencyNumbers;
                        $CountriesEmergencyNumbers->countries_id = $model->id;
                        $CountriesEmergencyNumbers->emergency_numbers_id = $value;
                        $CountriesEmergencyNumbers->save();
                    }
                }

                /* Add Currencies in CountriesCurrencies */
                if(!empty($extra['currencies'])){
                    foreach ($extra['currencies'] as $key => $value) {
                        $CountriesCurrencies = new CountriesCurrencies;
                        $CountriesCurrencies->countries_id = $model->id;
                        $CountriesCurrencies->currencies_id = $value;
                        $CountriesCurrencies->save();
                    }
                }

                /* Store New Translations For $this Country */
                foreach ($input as $key => $value) {
                    $trans = new CountriesTranslations;
                    $trans->countries_id    = $model->id;
                    $trans->languages_id    = $key;
                    $trans->title           = $value['title_'.$key];
                    $trans->description     = $value['description_'.$key];
                    $trans->nationality     = $value['nationality_'.$key];
                    $trans->population      = $value['population_'.$key];
                    // $trans->best_place   = $value['best_place_'.$key];
                    $trans->best_time    = $value['best_time_'.$key];
                    $trans->cost_of_living  = $value['cost_of_living_'.$key];
                    $trans->geo_stats       = $value['geo_stats_'.$key];
                    $trans->demographics    = $value['demographics_'.$key];
                    $trans->economy         = $value['economy_'.$key];
                    $trans->metrics    = $value['metrics_'.$key];
                    $trans->sockets    = $value['sockets_'.$key];
                    $trans->working_days    = $value['working_days_'.$key];
                    $trans->best_time    = $value['best_time_'.$key];
                    $trans->internet    = $value['internet_'.$key];
                    $trans->other    = $value['other_'.$key];
                    $trans->highlights    = $value['highlights_'.$key];
                    $trans->health_notes    = $value['health_notes_'.$key];
                    $trans->accommodation    = $value['accommodation_'.$key];
                    $trans->potential_dangers    = $value['potential_dangers_'.$key];
                    $trans->local_poisons    = $value['local_poisons_'.$key];
                    $trans->speed_limit    = $value['speed_limit_'.$key];
                    $trans->etiquette    = $value['etiquette_'.$key];
                    $trans->pollution_index    = $value['pollution_index_'.$key];
                    $trans->transportation    = $value['transportation_'.$key];
                    $trans->planning_tips    = $value['planning_tips_'.$key];
                    
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
