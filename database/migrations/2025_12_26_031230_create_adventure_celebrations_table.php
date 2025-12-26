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
        Schema::create('adventure_celebrations', function (Blueprint $table) {
            $table->id();
            $table->enum('section_type', ['adventure', 'celebration'])->comment('Type: adventure or celebration');
            $table->string('card_image')->nullable()->comment('Single card image');
            $table->string('title')->comment('Title of the adventure/celebration');
            $table->string('gallery_link')->nullable()->comment('Google Photos gallery link');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adventure_celebrations');
    }
};
