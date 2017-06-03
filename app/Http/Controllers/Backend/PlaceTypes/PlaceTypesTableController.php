<?php

namespace App\Http\Controllers\Backend\PlaceTypes;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\PlaceTypes\PlaceTypesRepository;
use App\Http\Requests\Backend\PlaceTypes\ManagePlaceTypesRequest;

/**
 * Class PlaceTypesTableController.
 */
class PlaceTypesTableController extends Controller
{
    /**
     * @var PlaceTypesRepository
     */
    protected $activitytypes;

    /**
     * @param PlaceTypesRepository $countries
     */
    public function __construct(PlaceTypesRepository $activitytypes)
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
