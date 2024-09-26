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
        Schema::table('contents', function (Blueprint $table) {
            $table->renameColumn('homePage_image', 'desktop_about_image');
            $table->renameColumn('aboutUs_image', 'mobile_about_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->renameColumn('desktop_about_image', 'homePage_image');
            $table->renameColumn('mobile_about_image', 'aboutUs_image');
        });
    }
};
