<?php

namespace App\Http\Controllers\Backend\Cultures;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Cultures\CulturesRepository;
use App\Http\Requests\Backend\Cultures\ManageCulturesRequest;

/**
 * Class CulturesTableController.
 */
class CulturesTableController extends Controller
{
    /**
     * @var CulturesRepository
     */
    protected $cultures;

    /**
     * @param CulturesRepository $cultures
     */
    public function __construct(CulturesRepository $cultures)
    {
        $this->cultures = $cultures;
    }

    /**
     * @param ManageCulturesRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->cultures->getForDataTable())
            ->addColumn('action', function ($cultures) {
                return $cultures->action_buttons;
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
                config('cultures.cultures_table').'.id',
            ]);
    }
}
