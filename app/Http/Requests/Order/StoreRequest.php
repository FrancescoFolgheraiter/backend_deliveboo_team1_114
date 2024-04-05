<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'date' => 'required|date',
            'note' => 'nullable|string|max:5000',
            'total_price' => 'required|numeric|between:0,9999.99',
            'name' => 'required|string|max:64',
            'surname' => 'required|string|max:64',
            'address' => 'required|string|max:128',
            'phone_number' => 'required|string|max:13',
        ];
    }

    //parte di messagistica in italiano
    public function messages()
    {
        return [
            'date.required' => 'Il campo data è obbligatorio.',
            'date.date' => 'Il campo data deve essere una data valida.',
            'note.string' => 'Il campo note deve essere una stringa.',
            'total_price.required' => 'Il campo prezzo totale è obbligatorio.',
            'total_price.numeric' => 'Il campo prezzo totale deve essere un numero.',
            'total_price.between' => 'Il campo prezzo totale deve essere compreso tra 0 e 9999.99.',
            'name.required' => 'Il campo nome è obbligatorio.',
            'name.string' => 'Il campo nome deve essere una stringa.',
            'name.max' => 'Il campo nome non può superare :max caratteri.',
            'surname.required' => 'Il campo cognome è obbligatorio.',
            'surname.string' => 'Il campo cognome deve essere una stringa.',
            'surname.max' => 'Il campo cognome non può superare :max caratteri.',
            'address.required' => 'Il campo indirizzo è obbligatorio.',
            'address.string' => 'Il campo indirizzo deve essere una stringa.',
            'address.max' => 'Il campo indirizzo non può superare :max caratteri.',
            'phone_number.required' => 'Il campo numero di telefono è obbligatorio.',
            'phone_number.string' => 'Il campo numero di telefono deve essere una stringa.',
            'phone_number.max' => 'Il campo numero di telefono non può superare :max caratteri.',
        ];
    }
}
