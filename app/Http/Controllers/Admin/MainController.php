<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\type;
class MainController extends Controller
{

    public function dashboard()
    {
        $user = auth()->user();
        $types = Type::all();
        return view('admin.dashboard', compact('user','types'));
    }


}
