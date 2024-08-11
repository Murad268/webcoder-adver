<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use TranslateService;

class ResetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'password' => 'required|min:8|confirmed',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'token.required' => TranslateService::getTranslation(
                'message',
                'invalid_token_or_email',
                app()->getLocale()
            ),

            'password.required' => TranslateService::getTranslation(
                'validation',
                'password_required',
                app()->getLocale()
            ),
            'password.string' => TranslateService::getTranslation('validation', 'password_string', app()->getLocale()),
            'password.min' => TranslateService::getTranslation('validation', 'password_min', app()->getLocale()),
            'password.confirmed' => TranslateService::getTranslation(
                'validation',
                'password_confirm',
                app()->getLocale()
            ),
        ];
    }
}
