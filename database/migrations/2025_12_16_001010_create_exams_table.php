<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('subject_id')
                ->constrained('subjects')
                ->restrictOnDelete();
            $table->foreignId('teacher_id')
                ->constrained('teachers')
                ->restrictOnDelete();
            $table->dateTime('starts_at');
            $table->unsignedSmallInteger('duration_minutes');
            $table->enum('type', ['presencial', 'online', 'hibrida'])
                ->default('presencial');
            $table->enum('status', ['agendada', 'concluida', 'cancelada'])
                ->default('agendada');
            $table->decimal('grade', 5, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['subject_id', 'teacher_id']);
            $table->index('starts_at');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
