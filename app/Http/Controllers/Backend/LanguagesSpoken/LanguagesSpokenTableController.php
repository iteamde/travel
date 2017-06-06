<?php

namespace App\Http\Controllers\Backend\LanguagesSpoken;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\LanguagesSpoken\LanguagesSpokenRepository;
use App\Http\Requests\Backend\LanguagesSpoken\ManageLanguagesSpokenRequest;
use App\Models\Regions\LanguagesSpoken;

/**
 * Class LanguagesSpokenTableController.
 */
class LanguagesSpokenTableController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $language_spoken;

    /**
     * @param LanguagesSpokenRepository $language_spoken
    **/
    public function __construct(LanguagesSpokenRepository $language_spoken)
    {
        $this->language_spoken = $language_spoken;
    }

    /**
     * @param ManageLanguagesSpokenRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageLanguagesSpokenRequest $request)
    {   
        return Datatables::of($this->language_spoken->getForDataTable())
            ->addColumn('action', function ($language_spoken) {
                return $language_spoken->action_buttons;
            })
        ->make(true);
    }
}
