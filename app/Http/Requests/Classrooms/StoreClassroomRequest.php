<?php

namespace App\Http\Requests\Classrooms;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreClassroomRequest extends FormRequest
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
            "title" => ["required", "string"],
            "description" => ["required", "string"],
            "subject_id" => ["required", "integer", Rule::exists(Subject::class, 'id')],
            "teacher_id" => ["required", "integer", Rule::exists(Teacher::class, 'id')],
            "starts_at" => ["required", "date"],
            "duration_minutes" => ["required", "integer"],
            "type" => ["required", Rule::in(['presencial', 'online', 'hibrida'])],
            "status" => ["required", Rule::in(['agendada', 'concluida', 'cancelada'])]
        ];
    }
}
