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
        Schema::create('about_section_data', function (Blueprint $table) {
            $table->id();
            $table->text('principal_message')->nullable();
            $table->string('principal_image')->nullable();
            $table->text('chairman_message')->nullable();
            $table->string('chairman_image')->nullable();
            $table->text('our_vision')->nullable();
            $table->string('our_vision_image')->nullable();
            $table->text('our_mission')->nullable();
            $table->string('our_mission_image')->nullable();
            $table->text('core_value')->nullable();
            $table->string('core_value_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_section_data');
    }
};
