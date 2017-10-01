<?php

namespace App\Http\Controllers\Backend\Regions;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Regions\RegionsRepository;
use App\Http\Requests\Backend\Regions\ManageRegionsRequest;
use App\Models\Regions\Regions;

/**
 * Class RegionsTableController.
 */
class RegionsTableController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $regions;

    /**
     * @param RegionsRepository $regions
    **/
    public function __construct(RegionsRepository $regions)
    {
        $this->regions = $regions;
    }

    /**
     * @param ManageRegionsRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageRegionsRequest $request)
    {   
        return Datatables::of($this->regions->getForDataTable())
            ->addColumn('',function(){
                return null;
            })
            ->addColumn('action', function ($regions) {
                return $regions->action_buttons;
            })
        ->make(true);
    }
}
