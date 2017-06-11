<?php

namespace App\Http\Controllers\Backend\AgeRanges;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\AgeRanges\AgeRangesRepository;
use App\Http\Requests\Backend\AgeRanges\ManageAgeRangesRequest;

/**
 * Class AgeRangesTableController.
 */
class AgeRangesTableController extends Controller
{
    /**
     * @var AgeRangesRepository
     */
    protected $ageranges;

    /**
     * @param AgeRangesRepository $ageranges
     */
    public function __construct(AgeRangesRepository $ageranges)
    {
        $this->ageranges = $ageranges;
    }

    /**
     * @param ManageAgeRangesRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->ageranges->getForDataTable())
            ->addColumn('action', function ($ageranges) {
                return $ageranges->action_buttons;
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
                config('ageranges.ageranges_table').'.id',
            ]);
    }
}
