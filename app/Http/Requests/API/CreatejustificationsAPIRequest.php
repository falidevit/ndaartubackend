<?php

namespace NdaartuAPI\Http\Requests\API;

use NdaartuAPI\Models\justifications;
use InfyOm\Generator\Request\APIRequest;

class CreatejustificationsAPIRequest extends APIRequest
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
        return justifications::$rules;
    }
}
