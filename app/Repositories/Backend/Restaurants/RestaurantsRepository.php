<?php

namespace App\Repositories\Backend\Restaurants;

use App\Models\Restaurants\Restaurants;
use App\Models\Restaurants\RestaurantsTranslations;
use App\Models\Restaurants\RestaurantsMedias;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Backend\Access\Role\RoleRepository;

/**
 * Class RestaurantsRepository.
 */
class RestaurantsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Restaurants::class;

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
            ->with('place')
            ->select([
                config('restaurants.restaurants_table').'.id',
                config('restaurants.restaurants_table').'.lat',
                config('restaurants.restaurants_table').'.lng',
                config('restaurants.restaurants_table').'.cities_id',
                config('restaurants.restaurants_table').'.places_id',
                config('restaurants.restaurants_table').'.active'
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }

    /**
     * @param array $input
     */
    public function create($input , $extra)
    {
        $model = new Restaurants;
        $model->countries_id = $extra['countries_id'];
        $model->active       = $extra['active'];
        $model->cities_id    = $extra['cities_id'];
        $model->places_id    = $extra['places_id'];
        $model->lat          = $extra['lat'];
        $model->lng          = $extra['lng'];
        
        DB::transaction(function () use ($model, $input, $extra) {
            $check = 1;
            
            if ($model->save()) {

                if(!empty($extra['medias'])){
                    
                    foreach ($extra['medias'] as $key => $value) {
                        $RestaurantsMedias = new RestaurantsMedias;
                        $RestaurantsMedias->restaurants_id = $model->id;
                        $RestaurantsMedias->medias_id = $value;
                        $RestaurantsMedias->save();
                    }
                }

                foreach ($input as $key => $value) {

                    $trans = new RestaurantsTranslations;
                    $trans->restaurants_id = $model->id;
                    $trans->languages_id = $key;
                    $trans->title        = $value['title_'.$key];
                    $trans->description  = $value['description_'.$key];
                    $trans->working_days = $value['working_days_'.$key];
                    $trans->working_times= $value['working_times_'.$key];
                    $trans->how_to_go    = $value['how_to_go_'.$key];
                    $trans->when_to_go   = $value['when_to_go_'.$key];
                    $trans->num_activities = $value['num_activities_'.$key];
                    $trans->popularity   = $value['popularity_'.$key];
                    $trans->conditions   = $value['conditions_'.$key];

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
        $model = Restaurants::findOrFail(['id' => $id]);
        $model = $model[0];
        $model->countries_id  = $extra['countries_id'];
        $model->active      = $extra['active'];
        $model->lat         = $extra['lat'];
        $model->lng         = $extra['lng'];
        $model->cities_id = $extra['cities_id'];
        $model->places_id = $extra['places_id'];

        /* Delete Previous RestaurantsTranslations */
        $prev = RestaurantsTranslations::where(['restaurants_id' => $id])->get();
        if(!empty($prev)){
            foreach ($prev as $key => $value) {
                $value->delete();
            }
        }

        /* Delete Previous RestaurantsMedias */
        $prevMedias = RestaurantsMedias::where(['restaurants_id' => $id])->get();
        if(!empty($prevMedias)){
            foreach ($prevMedias as $key => $value) {
                $value->delete();
            }
        }

        DB::transaction(function () use ($model, $input, $extra) {
            $check = 1;
            
            if ($model->save()) {

                if(!empty($extra['medias'])){
                    foreach ($extra['medias'] as $key => $value) {
                        $RestaurantsMedias = new RestaurantsMedias;
                        $RestaurantsMedias->restaurants_id = $model->id;
                        $RestaurantsMedias->medias_id = $value;
                        $RestaurantsMedias->save();
                    }
                }

                /* Store New RestaurantsTranslations */
                foreach ($input as $key => $value) {
                    $trans                  = new RestaurantsTranslations;
                    $trans->restaurants_id  = $model->id;
                    $trans->languages_id    = $key;
                    $trans->title           = $value['title_'.$key];
                    $trans->description     = $value['description_'.$key];
                    $trans->working_days    = $value['working_days_'.$key];
                    $trans->working_times   = $value['working_times_'.$key];
                    $trans->how_to_go       = $value['how_to_go_'.$key];
                    $trans->when_to_go      = $value['when_to_go_'.$key];
                    $trans->num_activities  = $value['num_activities_'.$key];
                    $trans->popularity      = $value['popularity_'.$key];
                    $trans->conditions      = $value['conditions_'.$key];

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
