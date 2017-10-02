<?php

namespace App\Http\Controllers\Backend\Restaurants;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Restaurants\RestaurantsRepository;
use App\Http\Requests\Backend\Restaurants\ManageRestaurantsRequest;

/**
 * Class RestaurantsTableController.
 */
class RestaurantsTableController extends Controller
{
    /**
     * @var RestaurantsRepository
     */
    protected $restaurants;

    /**
     * @param RestaurantsRepository $countries
     */
    public function __construct(RestaurantsRepository $restaurants)
    {
        $this->restaurants = $restaurants;
    }

    /**
     * @param ManageRestaurantsRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {   
        /* Get Data To Populate Datatable In Restaurants Page */
        return Datatables::of($this->restaurants->getForDataTable())
            ->addColumn('',function(){
                return null;
            })
            ->addColumn('action', function ($restaurants) {
                return $restaurants->action_buttons;
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
                config('restaurants.restaurants_table').'.id',
                config('restaurants.restaurants_table').'.lat',
                config('restaurants.restaurants_table').'.lng',
                config('restaurants.restaurants_table').'.active'
            ]);
    }
}
