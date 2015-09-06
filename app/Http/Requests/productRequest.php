<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class productRequest extends Request
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
            'name' => 'required|string',
            'specification' => 'required|string',
            'code' => 'required|unique:products,code',
            'description' => 'required|string',
            'category_id' => 'required',
            'packages[][cost]' => 'numeric',
            'packages[][base_price]' => 'numeric',
            
        ];
    }
}
