<?php

namespace App\Http\Controllers\Backend\Hobbies;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Hobbies\HobbiesRepository;
use App\Http\Requests\Backend\Hobbies\ManageHobbiesRequest;

/**
 * Class HobbiesTableController.
 */
class HobbiesTableController extends Controller
{
    /**
     * @var HobbiesRepository
     */
    protected $hobbies;

    /**
     * @param WeekdaysRepository $hobbies
     */
    public function __construct(HobbiesRepository $hobbies)
    {
        $this->hobbies = $hobbies;
    }

    /**
     * @param ManageWeekdaysRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->hobbies->getForDataTable())
            ->addColumn('action', function ($hobbies) {
                return $hobbies->action_buttons;
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
                config('hobbies.hobbies_table').'.id',
            ]);
    }
}
