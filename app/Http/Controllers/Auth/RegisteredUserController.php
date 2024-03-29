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

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
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
            'vat_number'=>['required', 'string', 'max:255'],
            'resturant_image'=>['required', 'image', 'max:2048'],
        ]);
        
        $imagePath = $request->file('resturant_image')->store('img/user', 'public');

        $user = User::create([
            'resturant_name' => $request->resturant_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'vat_number' => $request->vat_number,
            'resturant_image'=>$imagePath 
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
