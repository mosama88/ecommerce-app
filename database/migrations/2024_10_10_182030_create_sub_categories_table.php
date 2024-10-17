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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'category_id')->references('id')->on('categories')->onUpdate('cascade');
            $table->string('name', 50);
            $table->string('description', 200)->nullable();
            $table->integer('com_code');
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->timestamps();
        });



        DB::table('sub_categories')->insert([
            [
                'id' => 1,
                'category_id' => 8,
                'name' => 'بنطلون',
                'description' => null,
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => null,
            ],
            [
                'id' => 2,
                'category_id' => 7,
                'name' => 'ساعه رجالى',
                'description' => null,
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => null,
            ],
            [
                'id' => 3,
                'category_id' => 9,
                'name' => 'بنطلون',
                'description' => null,
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => null,
            ],
            [
                'id' => 4,
                'category_id' => 9,
                'name' => 'تيشيرت',
                'description' => null,
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => null,
            ],
            [
                'id' => 5,
                'category_id' => 9,
                'name' => 'تيشيرت',
                'description' => null,
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => null,
            ],
            [
                'id' => 6,
                'category_id' => 8,
                'name' => 'قميص',
                'description' => null,
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => null,
            ],
            [
                'id' => 7,
                'category_id' => 9,
                'name' => 'فستان',
                'description' => null,
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => null,

            ],
        ]);
    }






    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
