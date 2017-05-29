<?php

namespace App\Http\Controllers\Backend\SafetyDegrees;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\SafetyDegrees\SafetyDegreesRepository;
use App\Http\Requests\Backend\SafetyDegrees\ManageSafetyDegreesRequest;
use App\Models\SafetyDegree\SafetyDegree;

/**
 * Class SafetyDegreesTableController.
 */
class SafetyDegreesTableController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $degrees;

    /**
     * @param SafetyDegreesRepository $degrees
     */
    public function __construct(SafetyDegreesRepository $degrees)
    {
        $this->degrees = $degrees;
    }

    /**
     * @param ManageSafetyDegreesRequest $degrees
     *
     * @return mixed
     */
    public function __invoke(ManageSafetyDegreesRequest $request)
    {      
        return Datatables::of($this->degrees->getForDataTable())
            ->addColumn('action', function ($degree) {
                return $degree->action_buttons;
            })
        ->make(true);
    }
}
