<?php

// app/Http/Requests/Auth/RegisterRequest.php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use TranslateService;

// Facad-i düzgün istifadə edin

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'agree' => 'accepted',
            'user_type' => 'required|not_in:0'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => TranslateService::getTranslation('validation', 'email_required', app()->getLocale()),
            'email.string' => TranslateService::getTranslation('validation', 'email_string', app()->getLocale()),
            'email.email' => TranslateService::getTranslation('validation', 'email_email', app()->getLocale()),
            'email.unique' => TranslateService::getTranslation('validation', 'email_unique', app()->getLocale()),
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
            'agree.accepted' => TranslateService::getTranslation('validation', 'agree_accepted', app()->getLocale()),
            'user_type.required' => TranslateService::getTranslation(
                'validation',
                'user_type_required',
                app()->getLocale()
            ),
            'user_type.not_in' => TranslateService::getTranslation(
                'validation',
                'user_type_invalid',
                app()->getLocale()
            ),
        ];
    }
}
