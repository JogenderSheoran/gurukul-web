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
        Schema::create('disclosure_teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_name')->nullable();
            $table->string('qualification')->nullable();
            $table->string('designation')->nullable();
            $table->string('subject')->nullable();
            $table->string('experience')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disclosure_teachers');
    }
};
