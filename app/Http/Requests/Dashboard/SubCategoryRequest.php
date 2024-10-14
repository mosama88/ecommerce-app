<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50|unique:sub_categories,name',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'حقل أسم الفئة مطلوب',
            'name.max' => 'اسم الفئة لا يتجاوز 50 حرف',
            'name.unique' => 'أسم الفئة موجود بالفعل',
            'category_id.required' => 'أسم الفئة مطلوب',
        ];
    }
}