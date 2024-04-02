<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

//Model
use App\Models\type;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $types = Type::all();
        return view('auth.register',compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'resturant_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address'=>['required', 'string', 'max:255'],
            'vat_number'=>['required', 'string', 'max:11'],
            'resturant_image'=>['required', 'image', 'max:2048'],
            'types'=>['required','array','exists:types,id'],
        ],[
            'resturant_name.required' => 'Il campo Nome del ristorante è obbligatorio.',//messaggi di validazione
            'resturant_name.string' => 'Il campo Nome del ristorante deve essere una stringa.',
            'resturant_name.max' => 'Il campo Nome del ristorante non può superare i 255 caratteri.',
            'email.required' => 'Il campo Email è obbligatorio.',
            'email.string' => 'Il campo Email deve essere una stringa.',
            'email.email' => 'Il campo Email deve essere un indirizzo email valido.',
            'email.max' => 'Il campo Email non può superare i 255 caratteri.',
            'email.unique' => 'Questo indirizzo email è già stato utilizzato.',
            'password.required' => 'Il campo Password è obbligatorio.',
            'password.confirmed' => 'Il campo Password non corrisponde alla conferma.',
            'address.required' => 'Il campo Indirizzo è obbligatorio.',
            'address.string' => 'Il campo Indirizzo deve essere una stringa.',
            'address.max' => 'Il campo Indirizzo non può superare i 255 caratteri.',
            'vat_number.required' => 'Il campo Partita IVA è obbligatorio.',
            'vat_number.string' => 'Il campo Partita IVA deve essere una stringa.',
            'vat_number.max' => 'Il campo Partita IVA non può superare i 11 caratteri.',
            'resturant_image.required' => 'Il campo Immagine del ristorante è obbligatorio.',
            'resturant_image.image' => 'Il file Immagine del ristorante deve essere un\'immagine.',
            'resturant_image.max' => 'Il file Immagine del ristorante non può superare i 2048 kilobyte (2MB).',
            'types.required' => 'Il campo Tipi è obbligatorio.',
            'types.array' => 'Il campo Tipi deve essere un array.',
            'types.exists' => 'Il tipo selezionato non è valido.',
        ]);
        //aggiunta immagine dell'utente nella cartella storage
        $imagePath = $request->file('resturant_image')->store('img/user', 'public');
        //creazione dell'utente all'interno del DB
        $user = User::create([
            'resturant_name' => $request->resturant_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'vat_number' => $request->vat_number,
            'resturant_image'=>$imagePath 
        ]);

        //creo la relazione tra user e types tramite attach
        if (isset($request['types'])) {
            foreach ($request['types'] as $type) {
                $user->types()->attach($type);
            }
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
