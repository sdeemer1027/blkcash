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
        Schema::table('request_wallet', function (Blueprint $table) {
            $table->text('notes')->nullable(); // Adding a nullable text column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('request_wallet', function (Blueprint $table) {
            $table->dropColumn('notes');
        });
    }
};
