<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class rewardsRequest extends Request
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
            'title' => 'required',
            'cost'  => 'required|integer|regex:/^[0-9]/',
            'description' => 'required'
        ];
    }
}
