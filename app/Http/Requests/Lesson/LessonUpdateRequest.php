<?php

namespace App\Http\Requests\Lesson;

use Illuminate\Foundation\Http\FormRequest;

class LessonUpdateRequest extends FormRequest
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
            'name' => 'required|unique:lessons,name,'.$this->route('lesson')->id,
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Ingrese el nombre de la lección',
            'name.unique' => 'El nombre de la lección ingresado ya ha sido registrado',
        ];
    }
}
