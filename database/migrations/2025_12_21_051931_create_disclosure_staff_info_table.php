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
        Schema::create('disclosure_staff_info', function (Blueprint $table) {
            $table->id();
            $table->string('principal_name')->nullable();
            $table->integer('total_teachers')->nullable();
            $table->integer('pgt_teachers')->nullable();
            $table->integer('tgt_teachers')->nullable();
            $table->integer('prt_teachers')->nullable();
            $table->string('teacher_student_ratio')->nullable();
            $table->text('special_educator_details')->nullable();
            $table->text('counsellor_and_wellness_teacher_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disclosure_staff_info');
    }
};
