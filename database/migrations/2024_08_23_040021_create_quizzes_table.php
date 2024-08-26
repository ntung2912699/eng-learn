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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lesson_id'); // Liên kết với bài học
            $table->string('question');
            $table->string('audio_file');
            $table->string('answer_type')->default('text'); // Loại câu trả lời: 'text', 'multiple_choice', v.v.
            $table->json('options')->nullable(); // Các lựa chọn nếu là câu hỏi trắc nghiệm
            $table->string('correct_answer');
            $table->integer('order')->default(0); // Thứ tự của câu hỏi trong bài quiz
            $table->timestamps();

            // Foreign key
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
