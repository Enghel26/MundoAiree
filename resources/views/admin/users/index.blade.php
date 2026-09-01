@extends('layouts.admin')

@section('title', 'Mantenimiento de Usuarios y Roles - Mundo Aire, SRL')
@section('page_title', 'Usuarios y Roles del Sistema')

@section('content')
<div class="space-y-6">
    
    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex flex-wrap items-center gap-3 w-full sm:w-auto">
            <form method="GET" action="{{ route('admin.users.index') }}" class="flex items-center gap-2 w-full sm:w-80">
                <div class="relative w-full">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar por usuario o nombre..." class="w-full pl-9 pr-3 py-2 text-xs border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3 top-2.5"></i>
                </div>
                <button type="submit" class="p-2 bg-slate-800 text-white rounded-xl text-xs font-semibold">Buscar</button>
            </form>

            @if(request()->filled('rol') || request()->filled('q'))
                <a href="{{ route('admin.users.index') }}" class="text-xs text-slate-500 hover:text-brand-600 font-bold underline">Limpiar filtros</a>
            @endif
        </div>

        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-500 text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-md transition w-full sm:w-auto justify-center">
            <i data-lucide="user-plus" class="w-4 h-4"></i>
            <span>Crear Nuevo Usuario</span>
        </a>
    </div>

    <!-- Quick Role Pill Filters -->
    <div class="flex flex-wrap items-center gap-2">
        <span class="text-xs font-bold text-slate-500 uppercase tracking-wider mr-1">Filtrar Rol:</span>
        <a href="{{ route('admin.users.index') }}" class="px-3 py-1 rounded-lg text-xs font-bold transition {{ !request('rol') ? 'bg-navy-900 text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
            Todos ({{ \App\Models\User::count() }})
        </a>
        @foreach($roles as $r)
            <a href="{{ route('admin.users.index', ['rol' => $r->id]) }}" class="px-3 py-1 rounded-lg text-xs font-bold transition {{ request('rol') == $r->id ? 'bg-navy-900 text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                {{ $r->nombre }} ({{ $r->users()->count() }})
            </a>
        @endforeach
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-bold border-b border-slate-200">
                    <tr>
                        <th class="py-3.5 px-6">Usuario / Nombre</th>
                        <th class="py-3.5 px-4">Rol Asignado</th>
                        <th class="py-3.5 px-4">Correo Electrónico</th>
                        <th class="py-3.5 px-4">Fecha de Registro</th>
                        <th class="py-3.5 px-6 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                    @forelse($users as $user)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-navy-900 to-brand-600 text-white flex items-center justify-center font-black text-sm uppercase shadow-xs shrink-0">
                                        {{ substr($user->usuario ?? 'A', 0, 2) }}
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <span class="font-extrabold text-navy-900 text-sm">&#64;{{ $user->usuario }}</span>
                                            @if(auth()->id() === $user->id)
                                                <span class="px-2 py-0.5 rounded-full bg-brand-50 text-brand-700 font-extrabold text-[10px]">Tú</span>
                                            @endif
                                        </div>
                                        <span class="text-[11px] text-slate-500 block">{{ $user->nombre }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                @php
                                    $roleColor = $user->role?->color ?? 'blue';
                                    $colorClasses = [
                                        'purple' => 'bg-purple-50 text-purple-700 border-purple-200',
                                        'indigo' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
                                        'emerald' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                        'amber' => 'bg-amber-50 text-amber-700 border-amber-200',
                                        'sky' => 'bg-sky-50 text-sky-700 border-sky-200',
                                        'blue' => 'bg-blue-50 text-blue-700 border-blue-200',
                                    ][$roleColor] ?? 'bg-slate-100 text-slate-700 border-slate-200';
                                @endphp
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg border {{ $colorClasses }} text-[11px] font-bold">
                                    <i data-lucide="shield" class="w-3.5 h-3.5"></i>
                                    <span>{{ $user->role_name }}</span>
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-slate-600 font-medium">{{ $user->email ?? 'Sin correo asignado' }}</span>
                            </td>
                            <td class="py-4 px-4 text-slate-400 font-medium">
                                {{ $user->created_at ? $user->created_at->format('d/m/Y H:i') : 'Inicial' }}
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="{{ route('admin.users.edit', $user) }}" class="inline-flex p-1.5 text-slate-500 hover:text-brand-600 hover:bg-brand-50 rounded-lg transition" title="Editar Usuario">
                                    <i data-lucide="edit-2" class="w-4 h-4"></i>
                                </a>

                                @if(auth()->id() !== $user->id)
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar el usuario {{ $user->usuario }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Eliminar Usuario">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-12 text-slate-400 text-sm">
                                <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center mx-auto mb-3 text-slate-400">
                                    <i data-lucide="users" class="w-6 h-6"></i>
                                </div>
                                No se encontraron usuarios con los filtros seleccionados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div class="p-4 border-t border-slate-100">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
