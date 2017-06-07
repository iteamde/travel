<?php

namespace App\Http\Controllers\Backend\Weekdays;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Weekdays\WeekdaysRepository;
use App\Http\Requests\Backend\Weekdays\ManageWeekdaysRequest;

/**
 * Class WeekdaysTableController.
 */
class WeekdaysTableController extends Controller
{
    /**
     * @var WeekdaysRepository
     */
    protected $weekdays;

    /**
     * @param WeekdaysRepository $weekdays
     */
    public function __construct(WeekdaysRepository $weekdays)
    {
        $this->weekdays = $weekdays;
    }

    /**
     * @param ManageWeekdaysRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->weekdays->getForDataTable())
            ->addColumn('action', function ($weekdays) {
                return $weekdays->action_buttons;
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
                config('weekdays.weekdays_table').'.id',
            ]);
    }
}
