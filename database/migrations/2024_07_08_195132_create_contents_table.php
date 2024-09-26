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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->text('about_store'); // شرح عن المتجر
            $table->text('store_features'); // ميزات المتجر
            $table->string('store_address'); // عنوان المتجر
            $table->string('phone'); // رقم الهاتف
            $table->string('email'); // البريد الإلكتروني
            $table->string('facebook_link')->nullable(); // رابط فيسبوك
            $table->string('whatsapp_link')->nullable(); // رابط واتس
            $table->string('instagram_link')->nullable(); // رابط انستا
            $table->string('homePage_image')->nullable(); // صورة الصفحة الرئيسية
            $table->string('aboutUs_image')->nullable(); // صورة صفحة من نحن
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
