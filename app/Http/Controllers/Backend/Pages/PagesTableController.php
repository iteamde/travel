<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Pages\PagesRepository;
use App\Http\Requests\Backend\Pages\ManagePagesRequest;

/**
 * Class PagesTableController.
 */
class PagesTableController extends Controller
{
    /**
     * @var PagesRepository
     */
    protected $pages;

    /**
     * @param PagesRepository $pages
     */
    public function __construct(PagesRepository $pages)
    {
        $this->pages = $pages;
    }

    /**
     * @param ManagePagesRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->pages->getForDataTable())
            ->addColumn('action', function ($pages) {
                return $pages->action_buttons;
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
                config('pages.pages_table').'.id',
            ]);
    }
}
