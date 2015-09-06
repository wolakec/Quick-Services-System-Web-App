<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class serviceValueRequest extends Request
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
        return [
            //
            'points' => 'required|integer|regex:/^[0-9]/',
            'service_type_id' => 'unique:service_type_values,service_type_id',
        ];
    }
}
