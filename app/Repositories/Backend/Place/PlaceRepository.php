<?php

namespace App\Repositories\Backend\Place;

use App\Models\Place\Place;
use App\Models\Place\PlaceTranslations;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Backend\Access\Role\RoleRepository;

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
                config('locations.place_table').'.id',
                config('locations.place_table').'.lat',
                config('locations.place_table').'.lng',
                config('locations.place_table').'.active'
            ]);

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
        $model->place_type_ids  = $extra['place_types_ids'];
        $model->active      = $extra['active'];
        $model->lat         = $extra['lat'];
        $model->lng         = $extra['lng'];
        $model->safety_degrees_id = $extra['safety_degrees_id'];

        DB::transaction(function () use ($model, $input, $extra) {
            $check = 1;
            
            if ($model->save()) {
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
        $model->place_type_ids  = $extra['place_types_ids'];
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

        DB::transaction(function () use ($model, $input, $extra) {
            $check = 1;
            
            if ($model->save()) {
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
}
