<?php

namespace App\Http\Controllers\Backend\Lifestyle;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Lifestyle\LifestyleRepository;
use App\Http\Requests\Backend\Lifestyle\ManageLifestyleRequest;
use App\Models\SafetyDegree\SafetyDegree;

/**
 * Class LifestyleTableController.
 */
class LifestyleTableController extends Controller
{
    /**
     * @var LifestyleRepository
     */
    protected $lifestyle;

    /**
     * @param LifestyleRepository $lifestyle
     */
    public function __construct(LifestyleRepository $lifestyle)
    {
        $this->lifestyle = $lifestyle;
    }

    /**
     * @param ManageLifestyleRequest $lifestyle
     *
     * @return mixed
     */
    public function __invoke(ManageLifestyleRequest $request)
    {      
        return Datatables::of($this->lifestyle->getForDataTable())
            ->addColumn('action', function ($single_lifestyle) {
                return $single_lifestyle->action_buttons;
            })
        ->make(true);
    }
}
