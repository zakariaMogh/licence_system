<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'first_name' => 'required|string|max:60',
            'last_name' => 'required|string|max:60',
            'email' => 'required|email|max:60',
            'phone' => 'required|string|max:60',
            'company_name' => 'required|string|max:60',
            'licence' => 'required|integer|exists:licences,id',
        ];

        if ($this->method() === 'PUT') {
            unset($rules['serial_key']);
//            $rules['code'] = 'required|string|unique:products,code,'.$this->product->id;
        }
        return $rules;
    }
}
