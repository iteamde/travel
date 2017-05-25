<?php

namespace App\Repositories\Backend\Access\Country;

use App\Models\Access\Country\Countries;
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
    public function create($input)
    {
        $data = $input['data'];
        $roles = $input['roles'];

        $user = $this->createUserStub($data);

        DB::transaction(function () use ($user, $data, $roles) {
            if ($user->save()) {
                //User Created, Validate Roles
                if (! count($roles['assignees_roles'])) {
                    throw new GeneralException(trans('exceptions.backend.access.users.role_needed_create'));
                }

                //Attach new roles
                $user->attachRoles($roles['assignees_roles']);

                //Send confirmation email if requested
                if (isset($data['confirmation_email']) && $user->confirmed == 0) {
                    $user->notify(new UserNeedsConfirmation($user->confirmation_code));
                }

                event(new UserCreated($user));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.create_error'));
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
