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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id')->constrained('assignments')->onDelete('cascade');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->string('file'); // file tugas siswa
            $table->timestamp('submitted_at')->nullable(); // kapan siswa submit
            $table->integer('score')->nullable(); // nilai guru
            $table->text('feedback')->nullable(); // catatan guru
            $table->timestamps();

            $table->unique(['assignment_id', 'student_id']); // 1 siswa 1 submission per assignment
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
