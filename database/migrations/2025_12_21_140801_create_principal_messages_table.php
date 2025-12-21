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
        Schema::create('principal_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation')->default('Principal');
            $table->string('image')->nullable();
            $table->text('short_description');
            $table->longText('full_description');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('principal_messages');
    }
};
