<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'ایمیل نباید خالی باشد',
            'email.email' => 'ایمیل معتبر نیست',
            'password.required' => 'رمز نباید خالی باشد',
            'password.min' => 'رمز بیشتر از 8 کارکتر باشد',
            'password.max' => 'رمز کمتر از 255 کارکتر باشد'
        ];
    }
}
