<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\User;
use App\Models\type;
class MainController extends Controller
{

    public function dashboard()
    {
        $user = User::all();
        $types = Type::all();
        return view('admin.dashboard', compact('user','types'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $email)
    {
        $user = User::where('email', $email)->firstOrFail();
        $types = Type::all();
        return view('admin.dashboard', compact('user','types'));
    }
}
