<?php

namespace App\Http\Controllers\Backend\Place;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Place\PlaceRepository;
use App\Http\Requests\Backend\Place\ManagePlaceRequest;
use App\Models\PlaceTypes\PlaceTypes;

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
        //\App\Models\City\Cities::

        return Datatables::of($this->places->getForDataTable())
            ->escapeColumns(['code'])
            ->addColumn('',function(){
                return null;
            })
            ->addColumn('action', function ($place) {
                return $place->action_buttons;
            })
            ->addColumn('city_title', function ($place) {
                return $place->city->transsingle->title;
            })
            ->withTrashed()
            ->make(true);
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        $this->query()
            // ->with('users', 'permissions')
            ->select([
                config('locations.place_table').'.id'
            ]);
    }
}
