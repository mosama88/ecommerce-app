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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile', 20);
            $table->integer('status')->default(1)->comment(' حالة الحساب تساوى واحد يكون مفعل | حالة الحساب تساوى صفر يكون غير مفعل');
            $table->rememberToken();
            $table->timestamps();
        });

         DB::table('admins')->insert([
            'id' => 1,
            'name' => 'Mohamed Osama',
            'username' => 'mosama',
            'email' => 'mosama88@hotmail.com',
            'email_verified_at' => null,
            'password' => '$2y$10$CytAwnqWFvfL2s/iuMiuo.fNDOaOBQ7ofKEp0W6FxdhRLyLUgy5TS', // Hashed password
            'mobile' => '01228759920',
            'status' => 1,
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
