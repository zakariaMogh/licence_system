<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|email|max:60|unique:users,email',
            'password' => 'required|string|confirmed|min:8|max:40',
//            'is_admin' => 'in:on,off'
        ];

        if ($this->method() === 'PUT')
        {
            $rules['password'] = 'sometimes|nullable|string|confirmed|min:8|max:40';
            $rules['email'] = 'required|email|unique:users,email,'.$this->user->id;
        }
        return $rules;
    }


//    public function getValidatorInstance()
//    {
//        $this->formatIsAdmin();
//
//        return parent::getValidatorInstance();
//    }
//
//    protected function formatIsAdmin()
//    {
//        $this->request->set('is_admin', $this->request->get('is_admin') == 'on' ? 1 : 0);
//    }
}
