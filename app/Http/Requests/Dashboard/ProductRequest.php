<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:150',
            'description' => 'required|string|max:2000',
            'price' => 'required|numeric', // تأكد من إضافة 'numeric' للتحقق من أن السعر هو رقم
            'discount_percentage' => 'required|numeric', // أيضًا هنا
            'after_discount' => 'required|numeric', // أيضًا هنا
            'qty' => 'required|integer', // تأكد من استخدام 'integer' للتحقق من الكمية
            'sku' => 'required|string', // إذا كانت SKU تحتاج إلى نص، يمكنك تركها كما هي
            'sub_category_id' => 'required|exists:sub_categories,id',
            'size_id' => 'required|exists:sizes,id',
            'color_id' => 'required|exists:colors,id',
            'brand_id' => 'required|exists:brands,id',
            'photos' => 'required|array', // تأكد من أن لديك 'array' إذا كنت تقبل ملفات متعددة
            'photos.*' => 'mimes:jpg,jpeg,webp,gif,png|max:2048', // تحديد الأنواع والحد الأقصى لكل صورة
        ];
    }
    
    public function messages()
    {
        return [
            'title.required' => 'يرجى إدخال اسم المنتج.',
            'title.string' => 'يجب أن يكون الاسم نصًا.',
            'title.max' => 'يجب أن يكون الاسم أقل من 150 حرفًا.',
    
            'description.required' => 'يرجى إدخال وصف المنتج.',
            'description.string' => 'يجب أن يكون الوصف نصًا.',
            'description.max' => 'يجب أن يكون الوصف أقل من 2000 حرف.',
    
            'price.required' => 'يرجى إدخال سعر المنتج.',
            'price.numeric' => 'يجب أن يكون السعر رقمًا.',
    
            'discount_percentage.required' => 'يرجى إدخال نسبة الخصم.',
            'discount_percentage.numeric' => 'يجب أن تكون نسبة الخصم رقمًا.',
    
            'after_discount.required' => 'يرجى إدخال السعر بعد الخصم.',
            'after_discount.numeric' => 'يجب أن يكون السعر بعد الخصم رقمًا.',
    
            'qty.required' => 'يرجى إدخال كمية المنتج.',
            'qty.integer' => 'يجب أن تكون الكمية عددًا صحيحًا.',
    
            'sku.required' => 'يرجى إدخال SKU للمنتج.',
            'sku.string' => 'يجب أن يكون SKU نصًا.',
    
            'sub_category_id.required' => 'يرجى اختيار فئة فرعية.',
            'sub_category_id.exists' => 'الفئة الفرعية المختارة غير موجودة.',
    
            'size_id.required' => 'يرجى اختيار حجم.',
            'size_id.exists' => 'الحجم المختار غير موجود.',
    
            'color_id.required' => 'يرجى اختيار لون.',
            'color_id.exists' => 'اللون المختار غير موجود.',
    
            'brand_id.required' => 'يرجى اختيار علامة تجارية.',
            'brand_id.exists' => 'العلامة التجارية المختارة غير موجودة.',
    
            'photos.required' => 'يرجى رفع صورة واحدة على الأقل.',
            'photos.array' => 'يجب أن تكون الصور مصفوفة.',
            'photos.*.mimes' => 'يجب أن تكون الصور من نوع: jpg, jpeg, webp, gif, png.',
            'photos.*.max' => 'يجب ألا يتجاوز حجم كل صورة 2 ميغابايت.',
        ];
    }
    
}