<?php

namespace App\Http\Controllers\Backend\Interest;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Interest\InterestRepository;
use App\Http\Requests\Backend\User\ManageInterestRequest;

/**
 * Class InterestTableController.
 */
class InterestTableController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $interests;

    /**
     * @param CountryRepository $countries
     */
    public function __construct(InterestRepository $interests)
    {
        $this->interests = $interests;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->interests->getForDataTable())
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
                config('interest.interest_table').'.id',
            ]);
    }
}
