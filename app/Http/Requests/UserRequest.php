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
        $arrRules = [
            'name' => ['required', 'string', 'max:128'],
            'email' => ['required', 'email:rfc,dns'],
            'roles' => ['required'],
            'password' => ['min:8', 'confirmed']
        ];
        if (isset($this->id)) {
            $arrRules['name'][] = "unique:admins,name,$this->id";
            $arrRules['email'][] = "unique:admins,email,$this->id,id";
            $arrRules['password'][] = 'nullable';
        } else {
            $arrRules['name'][] = 'unique:admins,name';
            $arrRules['email'][] = 'unique:admins,email';
            $arrRules['password'][] = 'required';
        }

        return $arrRules;
    }
}
