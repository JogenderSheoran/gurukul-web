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
        Schema::create('infrastructure_sections', function (Blueprint $table) {
            $table->id();
            $table->enum('section_key', ['classroom', 'library', 'smart_classroom', 'music_and_dance'])->unique();
            $table->string('main_image');
            $table->text('description');
            $table->json('slider_images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infrastructure_sections');
    }
};
