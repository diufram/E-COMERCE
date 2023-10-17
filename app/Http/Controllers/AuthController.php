<?php

namespace App\Http\Controllers;


use App\Http\Requests\Auth\LoginRequest;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function registro(){
        return view('Users/Register');
    }

    public function registroSave(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function iniciar(){
        return view('Users/Login');
    }

    public function iniciarAction(LoginRequest $request){
        $request->authenticate();

        $request->session()->regenerate();
        $productos = Producto::all();
        return view('index',compact('productos'));
    }

    public function cierreSesion(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
    }
}