<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->integer('com_code');
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->timestamps();
        });
        // الألوان مع التفاصيل باللغة العربية
        $colors = [
            ['name' => 'أحمر', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'أزرق', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'أخضر', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'أصفر', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'برتقالي', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'أرجواني', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'أسود', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'أبيض', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'وردي', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'بني', 'created_by' => 1, 'com_code' => 1],
        ];

        // إدخال البيانات في قاعدة البيانات
        DB::table('colors')->insert($colors);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colors');
    }
};