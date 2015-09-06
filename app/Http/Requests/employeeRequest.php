<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class employeeRequest extends Request
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
            
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone_1' => 'required|numeric|digits:10|regex:/^0[91]\\d{8}$/',  
            'employee_id' => 'numeric|unique:employees,employee_id',
        ];
    }
}
