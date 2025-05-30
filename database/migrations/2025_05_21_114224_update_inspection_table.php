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
        Schema::table('inspections', function (Blueprint $table) {
            // First drop foreign key constraints
            $table->dropForeign(['tehsil_id']);
        });

        Schema::table('inspections', function (Blueprint $table) {
            // Then drop the columns
            $table->dropColumn([
                'school_name',
                'level',
                'gender',
                'tehsil_id',
            ]);

            // Add new columns
            $table->json('data')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inspections', function (Blueprint $table) {
            // Re-add the columns
            $table->string('school_name')->nullable();
            $table->string('level')->nullable();
            $table->string('gender')->nullable();

            $table->unsignedBigInteger('tehsil_id')->nullable();
            $table->unsignedBigInteger('union_council_id')->nullable();

            // Add back foreign keys
            $table->foreign('tehsil_id')->references('id')->on('tehsils')->onDelete('set null');
            $table->foreign('union_council_id')->references('id')->on('union_councils')->onDelete('set null');

            // Drop newly added columns
            $table->dropColumn(['data', 'latitude', 'longitude']);
        });
    }
};
