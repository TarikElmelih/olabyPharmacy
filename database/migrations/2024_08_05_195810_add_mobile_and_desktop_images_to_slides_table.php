<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
       public function up()
    {
        Schema::table('slides', function (Blueprint $table) {
            $table->string('desktop_image')->nullable();
            $table->string('mobile_image')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('slides', function (Blueprint $table) {
            $table->dropColumn('desktop_image');
            $table->dropColumn('mobile_image');
        });
    }
};
