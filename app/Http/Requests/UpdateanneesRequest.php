<?php

namespace NdaartuAPI\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use NdaartuAPI\Models\annees;

class UpdateanneesRequest extends FormRequest
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
        return annees::$rules;
    }
}
