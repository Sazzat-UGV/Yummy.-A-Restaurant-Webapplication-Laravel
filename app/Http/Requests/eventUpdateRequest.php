<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class eventUpdateRequest extends FormRequest
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
            'event_name'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'price'=>'required|numeric|min:0',
            'event_image'=>'nullable|image|max:1024',
            'is_active'=>'nullable'
        ];
    }
}
