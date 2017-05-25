<?php

namespace App\Http\Controllers\Backend\Access\Languages;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Access\Languages\LanguagesRepository;
use App\Http\Requests\Backend\Access\Language\ManageLanguagesRequest;
use App\Models\Access\language\Languages;
/**
 * Class UserTableController.
 */
class LanguagesTableController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $languages;

    /**
     * @param LanguagesRepository $languages
     */
    public function __construct(LanguagesRepository $languages)
    {
        $this->languages = $languages;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageLanguagesRequest $request)
    {
        if($request->status == 2 ) {
            $model = Languages::select(['id', 'title', 'code', 'active'])->where(["active" => '2']);

            return Datatables::of($model)
                ->addColumn('action', function ($language) {
                    return $language->action_buttons;
                })
                ->make(true);
                        
        }

        return Datatables::of($this->languages->getForDataTable())
            ->addColumn('action', function ($language) {
                return $language->action_buttons;
            })
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
                config('access.language_table').'.id',
                config('access.language_table').'.title',
                config('access.language_table').'.code',
                config('access.language_table').'.active'
            ]);
    }
}
