<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        Schema::table('inspections', function (Blueprint $table) {
            $table->dropForeign(['tehsil_id']);
        });

        // Drop check constraints on gender dynamically
        $constraints = DB::select("
            SELECT name
            FROM sys.check_constraints
            WHERE parent_object_id = OBJECT_ID('inspections')
              AND definition LIKE '%gender%'
        ");

        foreach ($constraints as $constraint) {
            DB::statement("ALTER TABLE inspections DROP CONSTRAINT [$constraint->name]");
        }

        Schema::table('inspections', function (Blueprint $table) {
            $table->dropColumn([
                'school_name',
                'level',
                'gender',
                'tehsil_id',
            ]);
        });

        Schema::table('inspections', function (Blueprint $table) {
            $table->json('data')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('inspections', function (Blueprint $table) {
            $table->string('school_name')->nullable();
            $table->string('level')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();

            $table->unsignedBigInteger('tehsil_id')->nullable();
            $table->unsignedBigInteger('union_council_id')->nullable();
        });

        Schema::table('inspections', function (Blueprint $table) {
            $table->foreign('tehsil_id')->references('id')->on('tehsils')->onDelete('set null');
            $table->foreign('union_council_id')->references('id')->on('union_councils')->onDelete('set null');
        });

        Schema::table('inspections', function (Blueprint $table) {
            $table->dropColumn(['data', 'latitude', 'longitude']);
        });
    }
};
