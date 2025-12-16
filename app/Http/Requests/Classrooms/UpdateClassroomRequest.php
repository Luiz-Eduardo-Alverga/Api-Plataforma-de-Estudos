<?php

namespace App\Http\Requests\Classrooms;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClassroomRequest extends FormRequest
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
            "title" => ["string"],
            "description" => ["string"],
            "subject_id" => ["integer", Rule::exists(Subject::class, 'id')],
            "teacher_id" => ["integer", Rule::exists(Teacher::class, 'id')],
            "starts_at" => ["date"],
            "duration_minutes" => [ "integer"],
            "type" => [Rule::in(['presencial', 'online', 'hibrida'])],
            "status" => [Rule::in(['agendada', 'concluida', 'cancelada'])]
        ];
    }
}
