<?php

namespace App\Http\Controllers\Backend\Religion;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Religion\ReligionRepository;
use App\Http\Requests\Backend\User\ManageReligionRequest;

/**
 * Class ReligionTableController.
 */
class ReligionTableController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $religions;

    /**
     * @param CountryRepository $countries
     */
    public function __construct(ReligionRepository $religions)
    {
        $this->religions = $religions;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->religions->getForDataTable())
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
                config('religion.religion_table').'.id',
            ]);
    }
}
