<?php

namespace NdarrtuAPI\Http\Requests\API;

use NdarrtuAPI\Models\absences;
use InfyOm\Generator\Request\APIRequest;

class CreateabsencesAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return absences::$rules;
    }
}
