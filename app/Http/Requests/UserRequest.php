<?php

namespace App\Http\Requests;

use Exception;
use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:users,name|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|max:15|unique:users,phone',
        ];
    }
    public function messages(): array
    {
        return [
            'name.unique' => 'This name is already taken. Please choose another one.',
            'name.regex' => 'The name must contain letters(a-z) and numbers(123).',
            'name.required' => 'We need to know your first name!',
            'name.string' => 'Your first name must be a valid text format.',
            'email.required' => 'An email address is required for registration.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already in use.',
            'password.required' => 'A password is required.',
            'password.string' => 'The password must be a valid text format.',
            'password.min' => 'The password must be at least 6 characters long.',
            'phone.required' => 'A phone number is required for registration.',
            'phone.unique' => 'This phone number is already in use.',
        ];

    }
    public function failedValidation(validator $validator)
    {
        throw new HttpResponseException(
            redirect()->back()
                ->withErrors($validator)
                ->withInput()
        );
    }
}


