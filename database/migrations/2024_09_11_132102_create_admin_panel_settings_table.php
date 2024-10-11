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
        Schema::create('admin_panel_settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 250);
            $table->tinyInteger('system_status')->default('1')->comment('واحد مفعل - صفر معطل');
            $table->string('image', 250)->nullable();
            $table->string('photo_cover', 250)->nullable();
            $table->string('phons', 250);
            $table->string('address', 250);
            $table->string('email', 100);
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->integer('com_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_panel_settings');
    }
};
