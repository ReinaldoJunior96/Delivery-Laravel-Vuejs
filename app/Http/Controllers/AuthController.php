<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\In;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->senha,
        ];
        if (Auth::attempt($credentials)) {
            $user = User::where('email', Auth::user()->email)->get();
            if ($user[0]->isAdmin()) {
                return inertia('Dashboard-admin')->with('user', compact($user));
            } else {
                return \redirect()->route('view.cardapio');
            }
        }
        return redirect()->back()->withInput()->withErrors(['Usuário ou senha inválida!']);
    }

    public function logout(User $user)
    {
        Auth::logout();
        return Redirect::route('login.user');

    }
}
