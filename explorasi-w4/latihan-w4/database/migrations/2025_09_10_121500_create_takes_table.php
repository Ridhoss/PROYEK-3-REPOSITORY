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
        Schema::create('takes', function (Blueprint $table) {
            $table->id();
            $table->date('enroll_date');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('course_id');
            $table->timestamps();

            $table->foreign('student_id')->references('student_id')->on('students')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('course_id')->references('course_id')->on('courses')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('takes');
    }
};
