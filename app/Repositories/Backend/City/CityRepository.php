<?php

namespace App\Repositories\Backend\City;

use App\Models\City\Cities;
use App\Models\City\CitiesTranslations;
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

        DB::transaction(function () use ($model, $input, $extra) {
            $check = 1;
            
            if ($model->save()) {
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
}