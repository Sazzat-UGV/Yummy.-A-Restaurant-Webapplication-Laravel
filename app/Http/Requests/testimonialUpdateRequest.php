<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class testimonialUpdateRequest extends FormRequest
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
            'client_name'=>'required|string|max:255',
            'client_designation'=>'required|string|max:255',
            'client_message'=>'required|string',
            'rating'=>'required|numeric|max:5|min:0',
            'client_image'=>'nullable|image',
            'is_active'=>'nullable',
        ];
    }
}
