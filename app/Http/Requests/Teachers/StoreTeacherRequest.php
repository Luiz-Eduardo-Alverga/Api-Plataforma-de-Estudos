<?php

namespace App\Http\Requests\Teachers;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
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
            "name" => ["required", "string", "max:255"],
            "email" => ["nullable", "string", "email", "max:255"],
            "phone" => ["nullable", "string", "max:255"],
            "speciality" => ["nullable", "max:255"],
            "admission_date" => ["nullable", "date"],
            "active" => ["boolean", "nullable"]
        ];
    }
}
