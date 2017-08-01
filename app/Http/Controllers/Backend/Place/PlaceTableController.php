<?php

namespace App\Http\Controllers\Backend\Place;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Place\PlaceRepository;
use App\Http\Requests\Backend\Place\ManagePlaceRequest;

/**
 * Class UserTableController.
 */
class PlaceTableController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $places;

    /**
     * @param PlaceRepository $places
     */
    public function __construct(PlaceRepository $places)
    {
        $this->places = $places;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->places->getForDataTable())
            ->escapeColumns(['code'])
            ->addColumn('action', function ($place) {
                return $place->action_buttons;
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
                config('locations.place_table').'.id',
                config('locations.place_table').'.lat',
                config('locations.place_table').'.lng',
                config('locations.place_table').'.cities_id',
                config('locations.place_table').'.active'
            ]);
    }
}
