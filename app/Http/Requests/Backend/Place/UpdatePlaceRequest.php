<?php

namespace App\Http\Requests\Backend\ActivityTypes;

use App\Http\Requests\Request;
use App\Models\Access\language\Languages;

/**
 * Class UpdateRegionsRequest.
 */
class UpdateCountryRequest extends Request
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
        $inputs = [];
        $languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
        foreach ($languages as $key => $language) {
            $inputs['title_'.$language->id] = 'required|max:255';
        }
        $inputs['active'] = 'required';
        return $inputs;
    }
}
