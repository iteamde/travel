<?php

namespace App\Http\Requests\Backend\PlaceTypes;

use App\Http\Requests\Request;

/**
 * Class ManagePlaceTypesRequest.
 */
class ManagePlaceTypesRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->hasRole(1);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}