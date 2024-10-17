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
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->integer('com_code');
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->timestamps();
        });
        // الأحجام مع التفاصيل باللغة العربية
        $sizes = [
            ['name' => 'S', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'M', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'L', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'XL', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'XXL', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'XXXL', 'created_by' => 1, 'com_code' => 1],
        ];


        // إدخال البيانات في قاعدة البيانات
        DB::table('sizes')->insert($sizes);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sizes');
    }
};
