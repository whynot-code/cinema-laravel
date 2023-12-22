<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieUpdateRequest extends FormRequest
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
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'author' => 'required',
            'description' => 'required',
            'trailer_link' => 'required',
            'production_date' => 'required',
            'release_date' => 'required',
            'main_image' => 'required',
        ];
    }

      /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'trailer_link' => 'required',
            'production_date' => 'required',
            'release_date' => 'required',
            'main_image' => 'required',
        ];
    }
}
