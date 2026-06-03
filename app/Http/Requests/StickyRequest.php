<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StickyRequest extends FormRequest
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
            'title' => 'required|string|max:100',
            'content' => 'required|string|max:1000',
            'priority' => 'required|in:low,medium,high',
            'reminder' => 'nullable|date|after_or_equal:now'

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The sticky note must have a title.',
            'title.max' => 'Title cannot exceed 100 characters.',
            'content.required' => 'The sticky note must have content.',
            'content.max' => 'Content cannot exceed 1000 characters.',
            'priority.required' => 'Please select a priority.',
            'priority.in' => 'Priority must be Low, Medium, or High.',
            'reminder.date' => 'Reminder must be a valid date and time.',
            'reminder.after_or_equal' => 'Reminder must be a future date/time.',
        ];
    }
    public function failedValidation(validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'errors' => $validator->errors()
        ], 422));
    }
}
