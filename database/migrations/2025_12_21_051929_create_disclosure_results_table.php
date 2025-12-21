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
        Schema::create('disclosure_results', function (Blueprint $table) {
            $table->id();
            $table->enum('class_type', ['X', 'XII']);
            $table->string('year')->nullable();
            $table->integer('no_of_registered_students')->nullable();
            $table->integer('no_of_students_passed')->nullable();
            $table->decimal('pass_percentage', 5, 2)->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disclosure_results');
    }
};
