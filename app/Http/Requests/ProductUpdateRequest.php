<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id'=>'required|numeric',
            'name'=>'required|string|max:255',
            'menu_item'=>'required|string|max:255',
            'price'=>'required|numeric|min:0',
            'product_image'=>'nullable|image|max:1024',
            'is_active'=>'nullable',
        ];
    }
}
