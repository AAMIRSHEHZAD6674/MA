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
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->string('school_code');
            $table->string('level');
            $table->enum('gender', ['male', 'female']);

            // Foreign keys for location
            $table->foreignId('district_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tehsil_id')->constrained()->cascadeOnDelete();
            $table->foreignId('union_council_id')->constrained()->cascadeOnDelete();

            // School operational status
            $table->enum('school_status', ['open', 'close']);

            // Cleanliness
            $table->boolean('students_cleanliness');
            $table->boolean('school_cleanliness');

            // Assessments (optional text)
            $table->text('head_management_assessment')->nullable();
            $table->text('teaching_learning_assessment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspections');
    }
};
