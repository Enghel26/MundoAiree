@extends('layouts.admin')

@section('title', 'Editar Usuario ' . $user->usuario . ' - Mundo Aire, SRL')
@section('page_title', 'Editar Usuario: ' . $user->usuario)

@section('content')
<div class="max-w-3xl">
    <div class="mb-6">
        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-500 hover:text-brand-600 transition">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            <span>Volver a Lista de Usuarios</span>
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 shadow-xs p-6 sm:p-8">
        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Rol Asignado -->
            <div>
                <label for="rol_id" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Rol del Usuario <span class="text-red-500">*</span></label>
                <div class="relative">
                    <select name="rol_id" id="rol_id" required class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl bg-white focus:ring-2 focus:ring-brand-500 focus:outline-none @error('rol_id') border-red-500 @enderror">
                        @foreach($roles as $r)
                            <option value="{{ $r->id }}" {{ old('rol_id', $user->rol_id) == $r->id ? 'selected' : '' }}>
                                {{ $r->nombre }} &mdash; ({{ $r->descripcion }})
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('rol_id')
                    <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nombre Completo -->
            <div>
                <label for="nombre" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nombre Completo <span class="text-red-500">*</span></label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $user->nombre) }}" required class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:outline-none @error('nombre') border-red-500 @enderror">
                @error('nombre')
                    <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nombre de Usuario -->
            <div>
                <label for="usuario" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nombre de Usuario (Para Iniciar Sesión) <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="text" name="usuario" id="usuario" value="{{ old('usuario', $user->usuario) }}" required class="w-full pl-10 pr-4 py-3 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:outline-none @error('usuario') border-red-500 @enderror">
                    <i data-lucide="user" class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5"></i>
                </div>
                @error('usuario')
                    <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Correo Electrónico Opcional -->
            <div>
                <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Correo Electrónico</label>
                <div class="relative">
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="w-full pl-10 pr-4 py-3 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:outline-none @error('email') border-red-500 @enderror">
                    <i data-lucide="mail" class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5"></i>
                </div>
                @error('email')
                    <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Cambio de Contraseña (Opcional) -->
            <div class="pt-4 border-t border-slate-100 space-y-4">
                <div>
                    <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider">Cambiar Contraseña</h4>
                    <p class="text-[11px] text-slate-400">Deja estos campos en blanco si deseas conservar la contraseña actual.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Nueva Contraseña -->
                    <div>
                        <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nueva Contraseña</label>
                        <div class="relative">
                            <input type="password" name="password" id="password" placeholder="••••••••" class="w-full pl-10 pr-4 py-3 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:outline-none @error('password') border-red-500 @enderror">
                            <i data-lucide="lock" class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5"></i>
                        </div>
                        @error('password')
                            <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div>
                        <label for="password_confirmation" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Confirmar Nueva Contraseña</label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="w-full pl-10 pr-4 py-3 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:outline-none">
                            <i data-lucide="check-circle" class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botones de Acción -->
            <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.users.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 text-xs font-bold hover:bg-slate-50 transition">Cancelar</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-500 text-white text-xs font-bold shadow-md transition flex items-center gap-2">
                    <i data-lucide="check" class="w-4 h-4"></i>
                    <span>Actualizar Usuario</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
