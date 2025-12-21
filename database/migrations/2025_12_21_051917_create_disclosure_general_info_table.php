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
        Schema::create('disclosure_general_info', function (Blueprint $table) {
            $table->id();
            $table->string('school_name')->nullable();
            $table->string('affiliation_no')->nullable();
            $table->string('school_code')->nullable();
            $table->text('complete_address')->nullable();
            $table->string('principal_name')->nullable();
            $table->string('principal_qualification')->nullable();
            $table->string('school_email')->nullable();
            $table->string('contact_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disclosure_general_info');
    }
};
