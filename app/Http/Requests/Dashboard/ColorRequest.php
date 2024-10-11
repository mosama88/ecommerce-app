<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
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
            'name.required' => 'حقل أسم اللون مطلوب',
            'name.max' => 'اسم اللون لا يتجاوز 50 حرف',
            'name.unique' => 'أسم اللون موجود بالفعل',
        ];
    }
}