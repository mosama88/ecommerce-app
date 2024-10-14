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
            'name' => 'required|string|max:50|unique:colors,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'حقل أسم الفئة مطلوب',
            'name.max' => 'اسم الفئة لا يتجاوز 50 حرف',
            'name.unique' => 'أسم الفئة موجود بالفعل',
        ];
    }
}