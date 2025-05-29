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
        Schema::table('tehsils', function (Blueprint $table) {
            $table->string('ucs')->nullable()->after('name');
            $table->string('union_councils')->nullable()->after('ucs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tehsils', function (Blueprint $table) {
            $table->dropColumn(['ucs', 'union_councils']);
        });
    }
};
