<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $title
 * @property mixed $description
 * @property mixed $subject_id
 * @property mixed $subject
 * @property mixed $teacher_id
 * @property mixed $teacher
 * @property mixed $starts_at
 * @property mixed $duration_minutes
 * @property mixed $type
 * @property mixed $status
 * @property mixed $grade
 */
class ExamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'subject' => [
                'id' => $this->subject->id,
                'name' => $this->subject->name,
            ],
            'teacher' => [
                'id' => $this->teacher->id,
                'name' => $this->teacher->name,
            ],
            'starts_at' => $this->starts_at,
            'duration_minutes' => $this->duration_minutes,
            'type' => $this->type,
            'status' => $this->status,
            'grade' => $this->grade,
        ];
    }
}
