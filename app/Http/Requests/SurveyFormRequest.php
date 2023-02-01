<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyFormRequest extends FormRequest
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
            'name' => 'nullable|string|max:255',
            'message' => 'required|min:2'
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'نام کمتر از 255 کارکتر باشد',
            'name.string' => 'نوع داده نام با خطا مواجه شد',
            'message.required' => 'انتقاد یا پیشنهاد نباید خالی باشد',
            'message.min' => 'انتقاد یا پیشنهاد بیشتر از 2 کارکتر باشد'
        ];
    }
}
