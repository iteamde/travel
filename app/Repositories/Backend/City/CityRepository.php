<?php

namespace App\Repositories\Backend\City;

use App\Models\City\Cities;
use App\Models\City\CitiesTranslations;
use App\Models\City\CitiesAirports;
use App\Models\City\CitiesCurrencies;
use App\Models\City\CitiesEmergencyNumbers;
use App\Models\City\CitiesHolidays;
use App\Models\City\CitiesLanguagesSpoken;
use App\Models\City\CitiesLifestyles;
use App\Models\City\CitiesMedias;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Backend\Access\Role\RoleRepository;

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
        $model = new Cities;
        $model->countries_id= $extra['countries_id'];
        $model->active      = $extra['active'];
        $model->is_capital  = $extra['is_capital'];
        $model->code        = $extra['code'];
        $model->lat         = $extra['lat'];
        $model->lng         = $extra['lng'];
        $model->safety_degree_id = $extra['safety_degree_id'];

        DB::transaction(function () use ($model, $input, $extra) {
            $check = 1;
            
            if ($model->save()) {

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
                    $trans->best_place   = $value['best_place_'.$key];
                    $trans->best_time    = $value['best_time_'.$key];
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
        $model = Cities::findOrFail(['id' => $id]);
        $model = $model[0];
        $model->countries_id  = $extra['countries_id'];
        $model->active      = $extra['active'];
        $model->is_capital  = $extra['is_capital'];
        $model->code        = $extra['code'];
        $model->lat         = $extra['lat'];
        $model->lng         = $extra['lng'];
        $model->safety_degree_id = $extra['safety_degree_id'];

        $prev = CitiesTranslations::where(['cities_id' => $id])->get();
        if(!empty($prev)){
            foreach ($prev as $key => $value) {
                $value->delete();
            }
        }

        $prev_airports = CitiesAirports::where(['cities_id' => $id])->get();
        if(!empty($prev_airports)){
            foreach ($prev_airports as $key => $value) {
                $value->delete();
            }
        }

        $prev_currencies = CitiesCurrencies::where(['cities_id' => $id])->get();
        if(!empty($prev_currencies)){
            foreach ($prev_currencies as $key => $value) {
                $value->delete();
            }
        }

        $prev_numbers = CitiesEmergencyNumbers::where(['cities_id' => $id])->get();
        if(!empty($prev_numbers)){
            foreach ($prev_numbers as $key => $value) {
                $value->delete();
            }
        }

        $prev_holidays = CitiesHolidays::where(['cities_id' => $id])->get();
        if(!empty($prev_holidays)){
            foreach ($prev_holidays as $key => $value) {
                $value->delete();
            }
        }

        $prev_languages_spoken = CitiesLanguagesSpoken::where(['cities_id' => $id])->get();
        if(!empty($prev_languages_spoken)){
            foreach ($prev_languages_spoken as $key => $value) {
                $value->delete();
            }
        }

        $prev_lifestyles = CitiesLifestyles::where(['cities_id' => $id])->get();
        if(!empty($prev_lifestyles)){
            foreach ($prev_lifestyles as $key => $value) {
                $value->delete();
            }
        }

        $prev_medias = CitiesMedias::where(['cities_id' => $id])->get();
        if(!empty($prev_medias)){
            foreach ($prev_medias as $key => $value) {
                $value->delete();
            }
        }

        DB::transaction(function () use ($model, $input, $extra) {
            $check = 1;
            
            if ($model->save()) {

                /* Entry in CityMedias table */
                if(!empty($extra['medias'])){
                    foreach ($extra['medias'] as $key => $value) {
                        $medias = new CitiesMedias;
                        $medias->cities_id = $model->id;
                        $medias->medias_id = $value;
                        $medias->save();
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

                foreach ($input as $key => $value) {
                    $trans                  = new CitiesTranslations;
                    $trans->cities_id       = $model->id;
                    $trans->languages_id    = $key;
                    $trans->title           = $value['title_'.$key];
                    $trans->description     = $value['description_'.$key];
                    $trans->best_place      = $value['best_place_'.$key];
                    $trans->best_time       = $value['best_time_'.$key];
                    $trans->cost_of_living  = $value['cost_of_living_'.$key];
                    $trans->geo_stats       = $value['geo_stats_'.$key];
                    $trans->demographics    = $value['demographics_'.$key];
                    $trans->economy         = $value['economy_'.$key];
                    $trans->suitable_for    = $value['suitable_for_'.$key];

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
}
