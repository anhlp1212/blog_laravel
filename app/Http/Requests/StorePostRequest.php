<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
        $isRequired = isset($this->id) ? 'nullable' : 'required';
        $isUnique = isset($this->id) ? 'nullable' : 'unique:posts';
        return [
            'title' => ['required', $isUnique, 'max:255'],
            'description' => 'required',
            'image' => [$isRequired, 'image', 'max:5000']
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'title' => 'Title',
        ];
    }
}
