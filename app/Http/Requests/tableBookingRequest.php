<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tableBookingRequest extends FormRequest
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
            'email'=>'required|email|max:255',
            'phone'=>'required|string|max:13',
            'date'=>'required|date',
            'time'=>'required',
            'no_of_people'=>'required|numeric|min:1',
            'message'=>'nullable|string|max:255',
        ];
    }
}
