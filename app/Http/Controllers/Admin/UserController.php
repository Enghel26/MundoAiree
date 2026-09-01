<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('role');

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where('nombre', 'like', "%{$search}%")
                  ->orWhere('usuario', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        }

        if ($request->filled('rol')) {
            $query->where('rol_id', $request->rol);
        }

        $users = $query->latest()->paginate(15)->withQueryString();
        $roles = Role::where('activo', true)->get();

        return view('admin.users.index', compact('users', 'roles'));
    }

    public function create()
    {
        $roles = Role::where('activo', true)->get();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rol_id' => 'required|exists:roles,id',
            'nombre' => 'required|string|max:255',
            'usuario' => 'required|string|max:100|unique:usuarios,usuario',
            'email' => 'nullable|email|max:255|unique:usuarios,email',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'rol_id.required' => 'Debes seleccionar un rol para el usuario.',
            'rol_id.exists' => 'El rol seleccionado no es válido.',
            'nombre.required' => 'El nombre completo es obligatorio.',
            'usuario.required' => 'El nombre de usuario es obligatorio.',
            'usuario.unique' => 'Este nombre de usuario ya está registrado.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        $user = User::create([
            'rol_id' => $validated['rol_id'],
            'nombre' => $validated['nombre'],
            'usuario' => strtolower(trim($validated['usuario'])),
            'email' => $validated['email'] ?? null,
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('admin.users.index')->with('success', "El usuario '{$user->usuario}' con rol {$user->role_name} fue creado exitosamente.");
    }

    public function edit(User $user)
    {
        $roles = Role::where('activo', true)->get();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'rol_id' => 'required|exists:roles,id',
            'nombre' => 'required|string|max:255',
            'usuario' => 'required|string|max:100|unique:usuarios,usuario,' . $user->id,
            'email' => 'nullable|email|max:255|unique:usuarios,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ], [
            'rol_id.required' => 'Debes seleccionar un rol.',
            'nombre.required' => 'El nombre completo es obligatorio.',
            'usuario.required' => 'El nombre de usuario es obligatorio.',
            'usuario.unique' => 'Este nombre de usuario ya está en uso por otra cuenta.',
            'email.unique' => 'Este correo electrónico ya está en uso.',
            'password.min' => 'La nueva contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
        ]);

        $data = [
            'rol_id' => $validated['rol_id'],
            'nombre' => $validated['nombre'],
            'usuario' => strtolower(trim($validated['usuario'])),
            'email' => $validated['email'] ?? null,
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', "El usuario '{$user->usuario}' fue actualizado exitosamente.");
    }

    public function destroy(User $user)
    {
        // Evitar que el usuario actual se elimine a sí mismo
        if ($user->id === Auth::id()) {
            return redirect()->route('admin.users.index')->with('error', 'No puedes eliminar tu propio usuario en sesión activa.');
        }

        // Evitar eliminar si es el único usuario administrador restante
        if (User::count() <= 1) {
            return redirect()->route('admin.users.index')->with('error', 'No puedes eliminar el único usuario del sistema.');
        }

        $username = $user->usuario;
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', "El usuario '{$username}' fue eliminado correctamente.");
    }
}
