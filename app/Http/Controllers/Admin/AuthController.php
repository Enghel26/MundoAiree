<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ], [
            'usuario.required' => 'Ingresa tu nombre de usuario de administrador.',
            'password.required' => 'Ingresa tu contraseña.',
        ]);

        $loginInput = trim($request->input('usuario'));
        $password = $request->input('password');

        // Buscar por usuario o por correo
        $user = User::where('usuario', $loginInput)
                    ->orWhere('email', $loginInput)
                    ->first();

        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user, $request->filled('remember'));
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'))
                ->with('success', '¡Bienvenido al Panel Administrativo de Mundo Aire, SRL!');
        }

        return back()->withErrors([
            'usuario' => 'El usuario o la contraseña son incorrectos.',
        ])->onlyInput('usuario');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('info', 'Has cerrado sesión exitosamente.');
    }
}
