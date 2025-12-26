<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Fix banner_image values that were set to 0 or '0'
        DB::table('page_banners')
            ->where('banner_image', '0')
            ->update(['banner_image' => null]);
            
        DB::table('page_banners')
            ->where('banner_image', '=', DB::raw('CAST(0 AS CHAR)'))
            ->update(['banner_image' => null]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No need to reverse this fix
    }
};
