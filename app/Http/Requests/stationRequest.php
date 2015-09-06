<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class stationRequest extends Request
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
        //dd(Request::all());
        return [
            //
            'address' => 'required',
            'name' => 'required|string',
            'phone_1' => 'required|numeric|digits:10|regex:/^0[91]\\d{8}$/',
            'service_type_id[]' => 'min:1',
        ];
    }
}
