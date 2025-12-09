<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $name
 * @property mixed $workload_hours
 * @property mixed $description
 * @property mixed teacher_id
 * @property mixed teacher
 * @property mixed $color
 * @property mixed $active
 */
class SubjectResource extends JsonResource
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
            'name' => $this->name,
            'workload_hours' => $this->workload_hours,
            'description' => $this->description,
            'teacher' => [
                'id' => $this->teacher->id,
                'name' => $this->teacher->name,
            ],
            'color' => $this->color,
            'active' => $this->active,
        ];
    }
}
