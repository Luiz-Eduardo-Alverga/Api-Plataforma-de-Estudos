<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'workload_hours',
        'description',
        'teacher_id',
        'color',
        'active',
    ];

     public function teacher (): BelongsTo {
         return $this->belongsTo(Teacher::class, 'teacher_id');
     }
}
