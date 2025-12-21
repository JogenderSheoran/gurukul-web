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
        Schema::create('admission_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('student_full_name');
            $table->date('date_of_birth');
            $table->integer('age');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('nationality')->default('Indian');
            $table->string('last_class_study');
            $table->string('last_school_board');
            $table->string('admission_for_class');
            $table->string('father_full_name');
            $table->string('mother_full_name');
            $table->string('father_mobile_number');
            $table->string('mother_mobile_number');
            $table->string('email_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_enquiries');
    }
};
