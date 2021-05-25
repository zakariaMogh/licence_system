<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:60',
            'code' => 'required|string|max:60|unique:products,code',
            'version' => 'required|numeric|max:99999.9999|min:0',
        ];

        if ($this->method() === 'PUT')
        {
            unset($rules['code']);
//            $rules['code'] = 'required|string|unique:products,code,'.$this->product->id;
        }
        return $rules;
    }
}
