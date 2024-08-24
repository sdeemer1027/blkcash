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
        Schema::create('imagesettings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('path');
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->string('format')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        $nu = 1;
        while($nu < 32) {
            \App\Models\Imagesetting::create([
                'name' => $nu.'.gif',
                'path' => 'img/settings',
                'format' => 'gif',
                'is_active' => '1',
            ]);
            $nu++;
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagesettings');
    }
};
