<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SizeRequest extends FormRequest
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
            'name.required' => 'حقل أسم المقاس مطلوب',
            'name.max' => 'اسم المقاس لا يتجاوز 50 حرف',
            'name.unique' => 'أسم المقاس موجود بالفعل',
        ];
    }
}
