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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title',300);
            $table->text('description',3000);
            $table->decimal('price',10,2);
            $table->integer('qty');
            $table->foreignId('category_id')->nullable()->references('id')->on('categories')->onUpdate('cascade');
            $table->foreignId('size_id')->nullable()->references('id')->on('sizes')->onUpdate('cascade');
            $table->foreignId('color_id')->nullable()->references('id')->on('colors')->onUpdate('cascade'); 
            $table->foreignId('brand_id')->nullable()->references('id')->on('brands')->onUpdate('cascade'); 
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
