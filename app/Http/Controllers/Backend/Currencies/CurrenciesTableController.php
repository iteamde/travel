<?php

namespace App\Http\Controllers\Backend\Currencies;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Currencies\CurrenciesRepository;
use App\Http\Requests\Backend\Currencies\ManageCurrenciesRequest;

/**
 * Class CurrenciesTableController.
 */
class CurrenciesTableController extends Controller
{
    /**
     * @var CurrenciesRepository
     */
    protected $currencies;

    /**
     * @param CurrenciesRepository $currencies
     */
    public function __construct(CurrenciesRepository $currencies)
    {
        $this->currencies = $currencies;
    }

    /**
     * @param ManageCurrenciesRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->currencies->getForDataTable())
            ->addColumn('action', function ($currencies) {
                return $currencies->action_buttons;
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
                config('currencies.currencies_table').'.id',
                config('currencies.currencies_table').'.active'
            ]);
    }
}
