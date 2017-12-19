<?php

namespace App\Http\Controllers\Backend\Country;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Country\CountryRepository;
use App\Http\Requests\Backend\User\ManageCountryRequest;

/**
 * Class UserTableController.
 */
class CountryTableController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $countries;

    /**
     * @param CountryRepository $countries
     */
    public function __construct(CountryRepository $countries)
    {
        $this->countries = $countries;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->countries->getForDataTable())
            ->escapeColumns(['code'])
            ->addColumn('',function(){
                return null;
            })
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
                config('locations.country_table').'.id',
                config('locations.country_table').'.code',
                config('locations.country_table').'.lat',
                config('locations.country_table').'.lng',
                config('locations.country_table').'.active'
            ]);
    }
}
