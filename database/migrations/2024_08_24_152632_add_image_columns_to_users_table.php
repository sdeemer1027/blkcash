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
            // Adding columns for image IDs
            $table->unsignedBigInteger('snd')->nullable()->after('email'); // Adjust the position if needed
            $table->unsignedBigInteger('rcv')->nullable()->after('snd');

            // Optionally, you can add foreign key constraints if these IDs reference another table
            // $table->foreign('snd')->references('id')->on('imagesettings');
            // $table->foreign('rcv')->references('id')->on('imagesettings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Dropping the columns if the migration is rolled back
            $table->dropColumn(['snd', 'rcv']);
        });
    }
};
