<?php

namespace App\Http\Controllers\Backend\Embassies;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Embassies\EmbassiesRepository;
use App\Http\Requests\Backend\User\ManageEmbassiesRequest;

/**
 * Class EmbassiesTableController.
 */
class EmbassiesTableController extends Controller
{
    /**
     * @var EmbassiesRepository
     */
    protected $embassies;

    /**
     * @param EmbassiesRepository $embassies
     */
    public function __construct(EmbassiesRepository $embassies)
    {
        $this->embassies = $embassies;
    }

    /**
     * @param ManageEmbassiesRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->embassies->getForDataTable())
            ->addColumn('action', function ($embassies) {
                return $embassies->action_buttons;
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
                config('embassies.embassies_table').'.id',
                config('embassies.embassies_table').'.code',
                config('embassies.embassies_table').'.lat',
                config('embassies.embassies_table').'.lng',
                config('embassies.embassies_table').'.active'
            ]);
    }
}
