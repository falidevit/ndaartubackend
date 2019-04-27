<?php

namespace NdarrtuAPI\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use NdarrtuAPI\Models\justifications;

class CreatejustificationsRequest extends FormRequest
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
