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
        Schema::table('principal_messages', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->string('designation')->default('Principal')->after('name');
            $table->string('image')->nullable()->after('designation');
            $table->text('short_description')->after('image');
            $table->longText('full_description')->after('short_description');
            $table->enum('status', ['active', 'inactive'])->default('active')->after('full_description');
        });
        
        Schema::table('chairman_messages', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->string('designation')->default('Chairman')->after('name');
            $table->string('image')->nullable()->after('designation');
            $table->text('short_description')->after('image');
            $table->longText('full_description')->after('short_description');
            $table->enum('status', ['active', 'inactive'])->default('active')->after('full_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('principal_messages', function (Blueprint $table) {
            $table->dropColumn(['name', 'designation', 'image', 'short_description', 'full_description', 'status']);
        });
        
        Schema::table('chairman_messages', function (Blueprint $table) {
            $table->dropColumn(['name', 'designation', 'image', 'short_description', 'full_description', 'status']);
        });
    }
};
