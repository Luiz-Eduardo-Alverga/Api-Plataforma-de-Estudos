<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'speciality',
        'admission_date',
        'active',
    ];

    public function subjects(): HasMany {
        return $this->hasMany(Subject::class);
    }

    public function classrooms(): HasMany
    {
        return $this->hasMany(Classroom::class);
    }

    public function exams(): HasMany
    {
        return $this->hasMany(Exam::class);
    }
}
