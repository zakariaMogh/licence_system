<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LicenceRequest extends FormRequest
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
            'serial_key' => 'required|string|max:60',
            'days' => 'sometimes|nullable|numeric|gt:0|max:9999',
            'is_demo' => 'in:0,1',
            'product' => 'required|integer|exists:products,id',
            'hard_drive_number' => 'sometimes|nullable|string|max:60',
        ];

        if ($this->method() === 'PUT') {
            unset($rules['serial_key']);
//            $rules['code'] = 'required|string|unique:products,code,'.$this->product->id;
        }
        return $rules;
    }

    public function getValidatorInstance()
    {
        $this->formatIsDemo();

        return parent::getValidatorInstance();
    }

    protected function formatIsDemo()
    {
        $this->request->set('is_demo', $this->request->get('is_demo') == 'on' ? 1 : 0);
    }
}
