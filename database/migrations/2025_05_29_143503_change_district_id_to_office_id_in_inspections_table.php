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
            // Drop existing foreign key and column if it exists
            if (Schema::hasColumn('inspections', 'district_id')) {
                $table->dropForeign(['district_id']);
                $table->dropColumn('district_id');
            }

            // Add new office_id column and foreign key
            $table->unsignedBigInteger('office_id')->nullable()->after('id');
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inspections', function (Blueprint $table) {
            // Drop new office_id foreign key and column
            $table->dropForeign(['office_id']);
            $table->dropColumn('office_id');

            // Restore district_id column
            $table->unsignedBigInteger('district_id')->nullable()->after('id');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
        });
    }
};
