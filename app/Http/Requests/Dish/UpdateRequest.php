<?php

namespace App\Http\Requests\Dish;

use Illuminate\Foundation\Http\FormRequest;

// Helpers
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
   //validazione dati
   public function rules(): array
   {
       return [
           'name' => 'required|max:64',
           'description' => 'nullable|max:5000',
           'ingredients' => 'required',
           'price' => 'required|numeric|between:0.5,999.99',
           'visible' => 'boolean',
           'image' => 'nullable|image|max:2048', // massimo 2MB per immagine
       ];
   }
   //modifica messaggi di non avvenuta validazione
   public function messages()
   {
       return [
           'name.required' => 'Il campo nome è obbligatorio.',
           'name.max' => 'Il campo nome non può superare :max caratteri.',
           'ingredients.required' => 'Il campo ingredienti è obbligatorio.',
           'price.required' => 'Il campo prezzo è obbligatorio.',
           'price.numeric' => 'Il campo prezzo deve essere un numero.',
           'price.between' => 'Il campo prezzo deve essere compreso tra :min e :max.',
           'visible.boolean' => 'Il campo visibile deve essere un valore booleano.',
           'image.image' => 'Il file caricato deve essere un\'immagine.',
           'image.max' => 'Il file caricato non può superare :max kilobytes.',
       ];
   }
}
