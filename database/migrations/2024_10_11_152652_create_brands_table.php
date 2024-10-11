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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('description', 200)->nullable();
            $table->integer('com_code');
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->timestamps();
        });

        // العلامات التجارية مع الأوصاف باللغة العربية
        $brands = [
            ['name' => 'سامسونج', 'description' => 'إلكترونيات استهلاكية ومنتجات تقنية مبتكرة', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'أبل', 'description' => 'شركة التكنولوجيا العالمية المعروفة بأجهزة iPhone وMac', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'هواوي', 'description' => 'الشركة الرائدة في مجال الهواتف الذكية وحلول الاتصالات', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'نايكي', 'description' => 'شركة رياضية عالمية متخصصة في الملابس والأحذية الرياضية', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'أديداس', 'description' => 'شركة رياضية عالمية معروفة بالأحذية والملابس الرياضية', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'سوني', 'description' => 'شركة يابانية رائدة في مجال الإلكترونيات والترفيه', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'إل جي', 'description' => 'شركة عالمية متخصصة في تصنيع الإلكترونيات والأجهزة المنزلية', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'بوما', 'description' => 'شركة رياضية عالمية معروفة بالملابس والأحذية', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'تويوتا', 'description' => 'شركة يابانية متخصصة في صناعة السيارات', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'فورد', 'description' => 'شركة أمريكية رائدة في صناعة السيارات', 'created_by' => 1, 'com_code' => 1],
        ];

        // إدخال البيانات في قاعدة البيانات
        DB::table('brands')->insert($brands);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
