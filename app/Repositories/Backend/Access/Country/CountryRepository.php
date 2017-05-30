<?php

namespace App\Repositories\Backend\Access\Country;

use App\Models\Access\Country\Countries;
use App\Models\Access\Country\CountriesTranslations;
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
            ->select([
                config('access.country_table').'.id',
                config('access.country_table').'.code',
                config('access.country_table').'.lat',
                config('access.country_table').'.lng',
                config('access.country_table').'.active'
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
        $model->safety_degree_id = $extra['safety_degree_id'];

        DB::transaction(function () use ($model, $input, $extra) {
            $check = 1;
            
            if ($model->save()) {
                foreach ($input as $key => $value) {
                    $trans = new CountriesTranslations;
                    $trans->countries_id = $model->id;
                    $trans->languages_id = $key;
                    $trans->title        = $value['title_'.$key];
                    $trans->description  = $value['description_'.$key];
                    $trans->nationality  = $value['nationality_'.$key];
                    $trans->population   = $value['population_'.$key];
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
     * @param Model $user
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $user, array $input)
    {
        $data = $input['data'];
        $roles = $input['roles'];

        $this->checkUserByEmail($data, $user);

        // $user->name = $data['name'];
        // $user->email = $data['email'];
        // $user->status = isset($data['status']) ? 1 : 0;
        // $user->confirmed = isset($data['confirmed']) ? 1 : 0;
        $user->name              = $data['name'];
        $user->email             = $data['email'];
        $user->address           = $data['address'];
        $user->single            = $data['single'];
        $user->gender            = $data['gender'];
        $user->children          = $data['children'];
        $user->age               = $data['age'];
        $user->public_profile    = $data['public_profile'];
        $user->mobile            = $data['mobile'];
        $user->nationality       = $data['nationality'];
        $user->profile_picture   = $data['profile_picture'];
        $user->notifications     = $data['notifications'];
        $user->messages          = $data['messages'];
        $user->username          = $data['username'];
        $user->password          = bcrypt($data['password']);
        $user->status            = isset($data['status']) ? 1 : 0;
        $user->confirmed         = isset($data['confirmed']) ? 1 : 0;
        $user->sms               = $data['sms'];
        
        DB::transaction(function () use ($user, $data, $roles) {
            if ($user->save()) {
                $this->checkUserRolesCount($roles);
                $this->flushRoles($roles, $user);

                event(new UserUpdated($user));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.update_error'));
        });
    }
}
