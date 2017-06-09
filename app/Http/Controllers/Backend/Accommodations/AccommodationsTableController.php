<?php

namespace App\Http\Controllers\Backend\Accommodations;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Accommodations\AccommodationsRepository;
use App\Http\Requests\Backend\Accommodations\ManageAccommodationsRequest;

/**
 * Class AccommodationsTableController.
 */
class AccommodationsTableController extends Controller
{
    /**
     * @var AccommodationsLevelsRepository
     */
    protected $accommodations;

    /**
     * @param AccommodationsRepository $countries
     */
    public function __construct(AccommodationsRepository $accommodations)
    {
        $this->accommodations = $accommodations;
    }

    /**
     * @param ManageAccommodationsRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->accommodations->getForDataTable())
            ->addColumn('action', function ($accommodations) {
                return $accommodations->action_buttons;
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
                config('accommodations.accommodations_table').'.id',
            ]);
    }
}
