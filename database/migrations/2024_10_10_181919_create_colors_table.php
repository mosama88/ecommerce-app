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
            $table->string('hex_code')->nullable();
            $table->integer('com_code');
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->timestamps();
        });
        // الألوان مع التفاصيل باللغة العربية
     // الألوان مع الأكواد اللونية والتفاصيل
     $colors = [
        ['name' => 'أحمر', 'hex_code' => '#FF0000', 'created_by' => 1, 'com_code' => 1],
        ['name' => 'أزرق', 'hex_code' => '#0000FF', 'created_by' => 1, 'com_code' => 1],
        ['name' => 'أخضر', 'hex_code' => '#008000', 'created_by' => 1, 'com_code' => 1],
        ['name' => 'أصفر', 'hex_code' => '#FFFF00', 'created_by' => 1, 'com_code' => 1],
        ['name' => 'برتقالي', 'hex_code' => '#FFA500', 'created_by' => 1, 'com_code' => 1],
        ['name' => 'أرجواني', 'hex_code' => '#800080', 'created_by' => 1, 'com_code' => 1],
        ['name' => 'أسود', 'hex_code' => '#000000', 'created_by' => 1, 'com_code' => 1],
        ['name' => 'أبيض', 'hex_code' => '#FFFFFF', 'created_by' => 1, 'com_code' => 1],
        ['name' => 'وردي', 'hex_code' => '#FFC0CB', 'created_by' => 1, 'com_code' => 1],
        ['name' => 'بني', 'hex_code' => '#A52A2A', 'created_by' => 1, 'com_code' => 1],
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
