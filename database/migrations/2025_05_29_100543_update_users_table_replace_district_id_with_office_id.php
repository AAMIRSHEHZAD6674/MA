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
        Schema::table('users', function (Blueprint $table) {
            // Drop foreign key and district_id column if they exist
            if (Schema::hasColumn('users', 'district_id')) {
                $table->dropForeign(['district_id']); // drop FK constraint
                $table->dropColumn('district_id');
            }

            // Add office_id foreign key
            $table->unsignedBigInteger('office_id')->nullable()->after('id');
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Reverse the changes
            $table->dropForeign(['office_id']);
            $table->dropColumn('office_id');

            $table->unsignedBigInteger('district_id')->nullable()->after('id');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
        });
    }
};
