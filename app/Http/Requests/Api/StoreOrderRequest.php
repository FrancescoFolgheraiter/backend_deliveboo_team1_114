<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'params.name' => 'required|string|max:255',
            'params.surname' => 'required|string|max:255',
            'params.address' => 'required|string|max:255',
            'params.phone_number' => 'required|string|max:20',
            'params.total_price' => 'required|numeric|min:0',
            'params.note' => 'nullable|string|max:255',
            'params.order' => 'required|array',
        ];
    }
}
