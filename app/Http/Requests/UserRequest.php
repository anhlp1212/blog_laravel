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
        $isUniqueName = isset($this->id) ? "unique:admins,name,$this->id" : 'unique:admins,name';
        $isUniqueEmail = isset($this->id) ? "unique:admins,email,$this->id,id" : 'unique:admins,email';
        return [
            'name' => ['required', 'string', 'max:128', $isUniqueName],
            'email' => ['required', 'email:rfc,dns', $isUniqueEmail],
            'roles' => ['required'],
            'password' => [$isRequired, 'min:8', 'confirmed']
        ];
    }
}
