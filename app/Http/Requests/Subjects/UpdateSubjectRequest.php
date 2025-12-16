<?php

namespace App\Http\Requests\Subjects;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSubjectRequest extends FormRequest
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
            "name" => [ "string", "max:255"],
            "description" => [ "string", "max:500"],
            "workload_hours" => ["decimal:0,2"],
            "teacher_id" => [Rule::exists(Teacher::class, 'id')],
            "active" => ["boolean"],
            "color" => [ "nullable"],
        ];
    }
}
