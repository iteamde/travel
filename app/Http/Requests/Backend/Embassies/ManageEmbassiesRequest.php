<?php

namespace App\Http\Requests\Backend\Embassies;

use App\Http\Requests\Request;

/**
 * Class ManageEmbassiesRequest.
 */
class ManageEmbassiesRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->hasRole(5);
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
