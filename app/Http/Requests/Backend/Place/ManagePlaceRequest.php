<?php

namespace App\Http\Requests\Backend\Place;

use App\Http\Requests\Request;

/**
 * Class UpdateRoleRequest.
 */
class ManagePlaceRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->hasRole(4);
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
