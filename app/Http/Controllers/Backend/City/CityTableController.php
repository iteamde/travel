<?php

namespace App\Http\Controllers\Backend\City;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\City\CityRepository;
use App\Http\Requests\Backend\City\ManageCityRequest;

/**
 * Class CityTableController.
 */
class CityTableController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $cities;

    /**
     * @param CountryRepository $countries
     */
    public function __construct(CityRepository $cities)
    {
        $this->cities = $cities;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->cities->getForDataTable())
            ->escapeColumns(['code'])
            ->addColumn('',function(){
                return null;
            })
            ->addColumn('action', function ($city) {
                return $city->action_buttons;
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
                config('locations.city_table').'.id',
                config('locations.city_table').'.code',
                config('locations.city_table').'.lat',
                config('locations.city_table').'.lng',
                config('locations.city_table').'.active'
            ]);
    }
}
