<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class submitIntervalRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id|string',
            'book_id' => 'required|exists:users,id|string',
            'start_page' => 'required|numeric',
            'end_page' => 'required|numeric'
        ];
    }


    public function messages()
    {
        return [
            'user_id.required' => 'The user id is required.',
            'user_id.exists' => 'The user id is not exist.',
            'user_id.string' => 'The user id should be string.',

            'book_id.required' => 'The book id is required.',
            'book_id.exists' => 'The book id is not exist.',
            'book_id.string' => 'The book id should be string.',

            'start_page.required' => 'The start page is required.',
            'start_page.numeric' => 'The start page should be number.',

            'end_page.required' => 'The end page is required.',
            'end_page.numeric' => 'The start page should be number.',
        ];
    }
}
