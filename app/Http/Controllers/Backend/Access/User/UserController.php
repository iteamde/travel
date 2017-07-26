<?php

namespace App\Http\Controllers\Backend\Access\User;

use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Access\Role\RoleRepository;
use App\Repositories\Backend\Access\User\UserRepository;
use App\Http\Requests\Backend\Access\User\StoreUserRequest;
use App\Http\Requests\Backend\Access\User\ManageUserRequest;
use App\Http\Requests\Backend\Access\User\UpdateUserRequest;
use App\Models\AdminLogs\AdminLogs;
use Illuminate\Support\Facades\DB;

/**
 * Class UserController.
 */
class UserController extends Controller {

    /**
     * @var UserRepository
     */
    protected $users;

    /**
     * @var RoleRepository
     */
    protected $roles;

    /**
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct(UserRepository $users, RoleRepository $roles) {
        $this->users = $users;
        $this->roles = $roles;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageUserRequest $request) {
        return view('backend.access.index');
    }

    public function getlogs(ManageUserRequest $request, $admin_id = null) {
        if ($admin_id) {
            $data['logs'] = DB::table('admin_logs')
                    ->leftJoin('users', 'admin_logs.admin_id', '=', 'users.id')
                    ->where('admin_logs.admin_id', $admin_id)
                    ->select('admin_logs.admin_id', 'admin_logs.item_type', 'admin_logs.action', 'users.email', DB::raw('count(*) as total'))
                    ->groupBy('admin_logs.admin_id', 'users.email', 'admin_logs.item_type', 'admin_logs.action')
                    ->get();

            return view('backend.access.logsbyid', $data);

        } else {
            $data['logs'] = DB::table('admin_logs')
                    ->leftJoin('users', 'admin_logs.admin_id', '=', 'users.id')
                    ->select('admin_logs.admin_id', 'users.email', DB::raw('count(*) as total'))
                    ->groupBy('admin_logs.admin_id', 'users.email')
                    ->get();

            return view('backend.access.logs', $data);
        }
    }

    public function postlogs(ManageUserRequest $request) {
        $date_from = $date_to = false;
        if ($request->has('date_from')) {
            $date_from = strtotime($request->get('date_from'));
        }
        if ($request->has('date_to')) {
            $date_to = strtotime($request->get('date_to'));
        }

        $logs = DB::table('admin_logs')
                ->leftJoin('users', 'admin_logs.admin_id', '=', 'users.id')
                ->select('admin_logs.admin_id', 'users.email', DB::raw('count(*) as total'));
        if ($date_from) {
            $logs = $logs->where('admin_logs.time', '>', $date_from);
        }
        if ($date_to) {
            $logs = $logs->where('admin_logs.time', '<', $date_to);
        }

        $logs = $logs->groupBy('admin_logs.admin_id', 'users.email')
                ->get();

        $data['logs'] = $logs;
        return view('backend.access.logs', $data);
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function create(ManageUserRequest $request) {
        return view('backend.access.create')
                        ->withRoles($this->roles->getAll());
    }

    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     */
    public function store(StoreUserRequest $request) {
        if (!empty($request->file('profile_picture'))) {
            $imageName = time() . '_' . rand(10, 10000000) . '.' . $request->file('profile_picture')->getClientOriginalExtension();
            $request->file('profile_picture')->move(
                    base_path() . '/public/img/users/', $imageName
            );
        } else {
            $imageName = "";
        }

        $this->users->create([
            'data' => [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'status' => $request->input('status'),
                'confirmed' => $request->input('confirmed'),
                'confirmation_email' => $request->input('confirmation_email'),
                'address' => $request->input('address'),
                'single' => $request->input('single'),
                'gender' => $request->input('gender'),
                'children' => $request->input('children'),
                'age' => $request->input('age'),
                'mobile' => $request->input('server_phone'),
                'nationality' => $request->input('nationality'),
                'public_profile' => $request->input('public_profile'),
                'notifications' => $request->input('notifications'),
                'messages' => $request->input('messages'),
                'username' => $request->input('username'),
                'profile_picture' => $imageName,
                'sms' => $request->input('sms')
            ],
            'roles' => $request->only('assignees_roles')
        ]);

        return redirect()->route('admin.access.user.index')
                        ->withFlashSuccess(trans('alerts.backend.users.created'));
    }

    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function show(User $user, ManageUserRequest $request) {
        return view('backend.access.show')
                        ->withUser($user);
    }

    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function edit(User $user, ManageUserRequest $request) {
        return view('backend.access.edit')
                        ->withUser($user)
                        ->withUserRoles($user->roles->pluck('id')->all())
                        ->withRoles($this->roles->getAll());
    }

    /**
     * @param User              $user
     * @param UpdateUserRequest $request
     *
     * @return mixed
     */
    public function update(User $user, UpdateUserRequest $request) {
        if (!empty($request->file('profile_picture'))) {
            $imageName = time() . '_' . rand(10, 10000000) . '.' . $request->file('profile_picture')->getClientOriginalExtension();
            $request->file('profile_picture')->move(
                    base_path() . '/public/img/users/', $imageName
            );
        } else {
            $imageName = $user->imageName;
        }

        $this->users->update($user, [
            'data' => [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'status' => $request->input('status'),
                'confirmed' => $request->input('confirmed'),
                'confirmation_email' => $request->input('confirmation_email'),
                'address' => $request->input('address'),
                'single' => $request->input('single'),
                'gender' => $request->input('gender'),
                'children' => $request->input('children'),
                'age' => $request->input('age'),
                'mobile' => $request->input('server_phone'),
                'nationality' => $request->input('nationality'),
                'public_profile' => $request->input('public_profile'),
                'notifications' => $request->input('notifications'),
                'messages' => $request->input('messages'),
                'username' => $request->input('username'),
                'profile_picture' => $imageName,
                'sms' => $request->input('sms')
            ],
            'roles' => $request->only('assignees_roles')
                //$this->users->update($user, ['data' => $request->only('name', 'email', 'status', 'confirmed'), 'roles' => $request->only('assignees_roles')
        ]);

        return redirect()->route('admin.access.user.index')->withFlashSuccess(trans('alerts.backend.users.updated'));
    }

    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function destroy(User $user, ManageUserRequest $request) {
        $this->users->delete($user);

        return redirect()->route('admin.access.user.deleted')->withFlashSuccess(trans('alerts.backend.users.deleted'));
    }

}
