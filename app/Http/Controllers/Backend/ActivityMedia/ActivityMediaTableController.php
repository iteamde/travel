<?php

namespace App\Http\Controllers\Backend\ActivityMedia;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\ActivityMedia\ActivityMediaRepository;
use App\Http\Requests\Backend\ActivityMedia\ManageActivityMediaRequest;

/**
 * Class ActivityMediaTableController.
 */
class ActivityMediaTableController extends Controller
{
    /**
     * @var ActivityMediaRepository
     */
    protected $activitymedia;

    /**
     * @param ActivityMediaRepository $cultures
     */
    public function __construct(ActivityMediaRepository $activitymedia)
    {
        $this->activitymedia = $activitymedia;
    }

    /**
     * @param ManageActivityMediaRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->activitymedia->getForDataTable())
            ->addColumn('action', function ($activitymedia) {
                return $activitymedia->action_buttons;
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
                config('media.media_table').'.id',
            ]);
    }
}
