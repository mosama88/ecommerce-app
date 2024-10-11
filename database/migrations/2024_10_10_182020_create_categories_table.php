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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('description', 200);
            $table->integer('com_code');
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->timestamps();
        });

        // التصنيفات مع الأوصاف باللغة العربية
        $categories = [
            ['name' => 'الإلكترونيات', 'description' => 'جميع أنواع المنتجات الإلكترونية', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'الهواتف المحمولة', 'description' => 'أحدث الهواتف المحمولة والإكسسوارات', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'أجهزة الكمبيوتر المحمولة والمكتبية', 'description' => 'أجهزة الكمبيوتر المحمولة والمكتبية والإكسسوارات', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'الكاميرات', 'description' => 'الكاميرات الاحترافية والعادية', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'التقنية القابلة للارتداء', 'description' => 'الساعات الذكية والأجهزة القابلة للارتداء', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'الأجهزة المنزلية', 'description' => 'جميع أنواع الأجهزة المنزلية', 'created_by' => 1, 'com_code' => 1],

            ['name' => 'الأزياء', 'description' => 'أحدث صيحات الموضة والأزياء', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'ملابس الرجال', 'description' => 'مجموعة متنوعة من ملابس الرجال', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'ملابس النساء', 'description' => 'مجموعة متنوعة من ملابس النساء', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'الأحذية', 'description' => 'أحدث تصاميم الأحذية للرجال والنساء', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'الإكسسوارات', 'description' => 'إكسسوارات متنوعة للأزياء', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'المجوهرات', 'description' => 'أحدث التصاميم في المجوهرات', 'created_by' => 1, 'com_code' => 1],

            ['name' => 'الجمال والعناية الشخصية', 'description' => 'منتجات العناية الشخصية والجمال', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'العناية بالبشرة', 'description' => 'منتجات العناية بالبشرة المختلفة', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'العناية بالشعر', 'description' => 'منتجات العناية بالشعر والمنتجات التجميلية', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'مستحضرات التجميل', 'description' => 'مستحضرات التجميل المختلفة', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'العطور', 'description' => 'أحدث العطور العالمية', 'created_by' => 1, 'com_code' => 1],
            ['name' => 'الصحة والعافية', 'description' => 'منتجات الصحة والعافية', 'created_by' => 1, 'com_code' => 1],
        ];

        // إدخال البيانات في قاعدة البيانات
        DB::table('categories')->insert($categories);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};