<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:students,email,'.$this->route('student')->id,
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Ingrese el nombre del estudiante',
            'email.required' => 'Ingrese el correo electrónico del estudiante',
            'email.unique' => 'El correo electrónico del estudiante ingresado ya ha sido registrado',
        ];
    }
}
