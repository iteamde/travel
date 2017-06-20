<?php

namespace App\Http\Controllers\Backend\Hotels;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Hotels\HotelsRepository;
use App\Http\Requests\Backend\Hotels\ManageHotelsRequest;

/**
 * Class HotelsTableController.
 */
class HotelsTableController extends Controller
{
    /**
     * @var HotelsRepository
     */
    protected $hotels;

    /**
     * @param HotelsRepository $hotels
     */
    public function __construct(HotelsRepository $hotels)
    {
        $this->hotels = $hotels;
    }

    /**
     * @param ManageHotelsRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->hotels->getForDataTable())
            // ->escapeColumns(['code'])
            ->addColumn('action', function ($hotels) {
                return $hotels->action_buttons;
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
                config('hotels.hotels_table').'.id',
                config('hotels.hotels_table').'.lat',
                config('hotels.hotels_table').'.lng',
                config('hotels.hotels_table').'.active'
            ]);
    }
}
