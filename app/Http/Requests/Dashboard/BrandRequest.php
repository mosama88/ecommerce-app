<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50|unique:colors,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'حقل أسم العلامه التجارية مطلوب',
            'name.max' => 'اسم العلامه التجارية لا يتجاوز 50 حرف',
            'name.unique' => 'أسم العلامه التجارية موجود بالفعل',
        ];
    }
}