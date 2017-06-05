<?php

namespace App\Http\Controllers\Backend\Levels;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Levels\LevelsRepository;
use App\Http\Requests\Backend\Levels\ManageLevelsRequest;

/**
 * Class LevelsTableController.
 */
class LevelsTableController extends Controller
{
    /**
     * @var LevelsRepository
     */
    protected $levels;

    /**
     * @param CountryRepository $countries
     */
    public function __construct(LevelsRepository $levels)
    {
        $this->levels = $levels;
    }

    /**
     * @param ManageLevelsRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->levels->getForDataTable())
            ->addColumn('action', function ($level) {
                return $level->action_buttons;
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
                config('levels.levels_table').'.id',
            ]);
    }
}
