<?php

namespace App\Http\Controllers\Backend\Access\Country;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\Country\ManageCountryRequest;

class CountryController extends Controller
{
     /**
     * @param ManageCountryrRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageCountryRequest $request)
    {
        return view('backend.access.country.index');
    }

    /**
     * @param ManageCountryRequest $request
     *
     * @return mixed
     */
    public function create(ManageCountryRequest $request)
    {
        return view('backend.access.country.create');
    }
}