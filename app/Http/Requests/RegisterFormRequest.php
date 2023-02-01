<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:255','confirmed']
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'نام کمتر از 255 کارکتر باشد',
            'name.string' => 'نوع داده نام با خطا مواجه شد',
            'email.required' => 'ایمیل نباید خالی باشد',
            'email.email' => 'ایمیل معتبر نیست',
            'email.unique' => 'ایمیل از قبل استفاده شده',
            'password.required' => 'رمز نباید خالی باشد',
            'password.min' => 'رمز بیشتر از 8 کارکتر باشد',
            'password.max' => 'رمز کمتر از 255 کارکتر باشد',
            'password.confirmed' => 'فیلد رمز و تکرار رمز یکسان نیست'
        ];
    }
}
