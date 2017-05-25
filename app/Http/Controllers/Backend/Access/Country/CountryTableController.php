<?php

namespace App\Http\Controllers\Backend\Access\Country;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Access\Country\CountryRepository;
use App\Http\Requests\Backend\Access\User\ManageCountryRequest;

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
            // ->editColumn('confirmed', function ($user) {
            //     return $user->confirmed_label;
            // })
            // ->addColumn('roles', function ($user) {
            //     return $user->roles->count() ?
            //         implode('<br/>', $user->roles->pluck('name')->toArray()) :
            //         trans('labels.general.none');
            // })
            // ->addColumn('actions', function ($user) {
            //     return $user->action_buttons;
            // })
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
                config('access.country_table').'.id',
                config('access.country_table').'.code',
                config('access.country_table').'.lat',
                config('access.country_table').'.lng',
                config('access.country_table').'.active'
            ]);
    }
}
