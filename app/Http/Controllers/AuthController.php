<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function dashboard()
    {
        return view('auth.dashboard');
    }

    public function logout(Request $request)
    {
        foreach (['admin', 'cliente', 'web'] as $guard) {
            if (auth()->guard($guard)->check()) {
                auth()->guard($guard)->logout();
                break;
            }
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('LoginIndex');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $validated['username'])->first();

        if (! $user) {
            return back()->withErrors([
                'username' => 'Usuario no existe.',
            ])->withInput();
        }

        if (! Hash::check($validated['password'], $user->password)) {
            return back()->withErrors([
                'username' => 'Contraseña incorrecta.',
            ])->withInput();
        }

        switch ($user->role_id) {
            case 1:
                $guard = 'admin';
                break;

            case 2:
                $guard = 'cliente';
                break;

            default:
                $guard = 'web';
                break;
        }

        if (auth()->guard($guard)->attempt([
            'username' => $validated['username'],
            'password' => $validated['password'],
        ])) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'username' => 'No se pudo iniciar sesión.',
        ])->withInput();
    }
}
