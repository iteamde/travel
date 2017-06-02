<?php

namespace App\Http\Controllers\Backend\Activity;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Activity\ActivityRepository;
use App\Http\Requests\Backend\User\ManageCountryRequest;

/**
 * Class ActivityTableController.
 */
class ActivityTableController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $activities;

    /**
     * @param ActivityRepository $activities
     */
    public function __construct(ActivityRepository $activities)
    {
        $this->activities = $activities;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->activities->getForDataTable())
            ->escapeColumns(['code'])
            ->addColumn('action', function ($country) {
                return $country->action_buttons;
            })
            ->withTrashed()
            ->make(true);
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            // ->with('users', 'permissions')
            ->select([
                config('activities.activities_table').'.id',
                config('activities.activities_table').'.code',
                config('activities.activities_table').'.lat',
                config('activities.activities_table').'.lng',
                config('activities.activities_table').'.active'
            ]);
    }
}
