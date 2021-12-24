<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Filler extends Controller
{
    public function getValues(Request $request)
    {
        $user = User::where('login', 'ivan')->first();

        if(Auth::id()==''){
            return view('main', compact('user'));
        }
        if ($request->getPathInfo() == "/") {
            return view('main', compact('user'));
        }
        if ($request->getPathInfo() == "/edit") {
            return view('edit', compact('user'));
        }
    }
}
