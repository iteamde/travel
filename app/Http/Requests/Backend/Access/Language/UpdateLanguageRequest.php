<?php

namespace App\Http\Requests\Backend\Access\Language;

use App\Http\Requests\Request;

/**
 * Class UpdateUserRequest.
 */
class UpdateLanguageRequest extends Request
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
            'title' => 'required|max:255',
            'code'  => 'required|max:255',
            'active'=> 'required'
        ];
    }
}
