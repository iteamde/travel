<?php

namespace App\Http\Controllers\Backend\PagesCategories;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\PagesCategories\PagesCategoriesRepository;
use App\Http\Requests\Backend\PagesCategories\ManagePagesCategoriesRequest;

/**
 * Class PagesCategoriesController.
 */
class PagesCategoriesTableController extends Controller
{
    /**
     * @var PagesCategoriesRepository
     */
    protected $pages_categories;

    /**
     * @param PagesCategoriesRepository $pages_categories
     */
    public function __construct(PagesCategoriesRepository $pages_categories)
    {
        $this->pages_categories = $pages_categories;
    }

    /**
     * @param ManagePagesCategoriesRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        return Datatables::of($this->pages_categories->getForDataTable())
            ->addColumn('action', function ($pages_categories) {
                return $pages_categories->action_buttons;
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
                config('pages_categories.pages_categories_table').'.id',
            ]);
    }
}
