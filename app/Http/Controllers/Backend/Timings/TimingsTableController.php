<?php

namespace App\Http\Controllers\Backend\Timings;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Timings\TimingsRepository;
use App\Http\Requests\Backend\Timings\ManageTimingsRequest;

/**
 * Class TimingsTableController.
 */
class TimingsTableController extends Controller
{
    /**
     * @var TimingsRepository
     */
    protected $timings;

    /**
     * @param TimingsRepository $timings
     */
    public function __construct(TimingsRepository $timings)
    {
        $this->timings = $timings;
    }

    /**
     * @param ManageTimingsRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->timings->getForDataTable())
            ->addColumn('action', function ($timing) {
                return $timing->action_buttons;
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
                config('timings.timings_table').'.id',
            ]);
    }
}
