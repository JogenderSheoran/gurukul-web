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
        Schema::create('disclosure_infrastructure', function (Blueprint $table) {
            $table->id();
            $table->string('total_campus_area')->nullable();
            $table->integer('no_of_classrooms')->nullable();
            $table->string('size_of_classrooms')->nullable();
            $table->integer('no_of_laboratories')->nullable();
            $table->string('size_of_laboratories')->nullable();
            $table->enum('internet_facility', ['YES', 'NO'])->default('NO');
            $table->integer('no_of_girls_toilets')->nullable();
            $table->integer('no_of_boys_toilets')->nullable();
            $table->string('school_inspection_video_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disclosure_infrastructure');
    }
};
