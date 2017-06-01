<?php

namespace App\Http\Controllers\Backend\ActivityTypes;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\ActivityTypes\ActivityTypesRepository;
use App\Http\Requests\Backend\User\ManageCountryRequest;

/**
 * Class ActivityTypesTableController.
 */
class ActivityTypesTableController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $activitytypes;

    /**
     * @param CountryRepository $countries
     */
    public function __construct(ActivityTypesRepository $activitytypes)
    {
        $this->activitytypes = $activitytypes;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->activitytypes->getForDataTable())
            ->addColumn('action', function ($activity_types) {
                return $activity_types->action_buttons;
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
                config('activities.activities_types_table').'.id',
            ]);
    }
}
