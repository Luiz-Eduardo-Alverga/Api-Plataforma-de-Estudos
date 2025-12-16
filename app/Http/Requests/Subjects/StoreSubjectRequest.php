<?php

namespace App\Http\Requests\Subjects;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSubjectRequest extends FormRequest
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
            "description" => ["required", "string", "max:500"],
            "workload_hours" => ["required", "decimal:0,2"],
            "teacher_id" => ["required", Rule::exists(Teacher::class, 'id')],
            "active" => ["boolean"],
            "color" => ["required", "string", "max:255"],
        ];
    }
}
