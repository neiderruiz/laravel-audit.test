<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $this->user->id,
            'age' => 'required|integer|min:18',
            'description' => 'required|min:5|max:255',
            'password' => 'nullable|min:5'
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'El correo ya esta en uso.'
        ];
    }
}
