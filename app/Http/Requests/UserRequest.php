<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        $isRequired = isset($this->id) ? 'nullable' : 'required';
        return [
            'name' => ['required', 'string', 'max:128', 'unique:admins,name'],
            'email' => ['required', 'email:rfc,dns', 'unique:admins,email'],
            'roles' => ['required'],
            'password' => [$isRequired, 'min:8', 'confirmed']
        ];
    }
}
