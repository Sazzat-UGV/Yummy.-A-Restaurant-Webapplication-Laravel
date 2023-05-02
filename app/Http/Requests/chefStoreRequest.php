<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class chefStoreRequest extends FormRequest
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
            'name'=>'required|string|max:255',
            'position'=>'required|string|max:255',
            'description'=>'nullable|string|max:255',
            'chef_image'=>'required|image|max:1024',
            'is_active'=>'nullable',
        ];
    }
}

