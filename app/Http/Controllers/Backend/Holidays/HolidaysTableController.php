<?php

namespace App\Http\Controllers\Backend\Holidays;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Holidays\HolidaysRepository;
use App\Http\Requests\Backend\Holidays\ManageHolidaysRequest;

/**
 * Class HolidaysTableController.
 */
class HolidaysTableController extends Controller
{
    /**
     * @var HolidaysRepository
     */
    protected $holidays;

    /**
     * @param HolidaysRepository $holidays
     */
    public function __construct(HolidaysRepository $holidays)
    {
        $this->holidays = $holidays;
    }

    /**
     * @param ManageHolidaysRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->holidays->getForDataTable())
            ->addColumn('action', function ($holidays) {
                return $holidays->action_buttons;
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
                config('holidays.holidays_table').'.id',
            ]);
    }
}
