<?php

namespace App\Http\Controllers\Backend\EmergencyNumbers;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\EmergencyNumbers\EmergencyNumbersRepository;
use App\Http\Requests\Backend\EmergencyNumbers\ManageEmergencyNumbersRequest;

/**
 * Class EmergencyNumbersTableController.
 */
class EmergencyNumbersTableController extends Controller
{
    /**
     * @var EmergencyNumbersRepository
     */
    protected $emergencynumbers;

    /**
     * @param EmergencyNumbersRepository $emergencynumbers
     */
    public function __construct(EmergencyNumbersRepository $emergencynumbers)
    {
        $this->emergencynumbers = $emergencynumbers;
    }

    /**
     * @param ManageWeekdaysRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->emergencynumbers->getForDataTable())
            ->addColumn('action', function ($emergencynumbers) {
                return $emergencynumbers->action_buttons;
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
