@extends('layouts.admin')

@section('title', 'Gestión de Marcas - Mundo Aire, SRL')
@section('page_title', 'Mantenimiento de Marcas de Aires')

@section('content')
<div class="space-y-6">
    
    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-3 w-full sm:w-auto">
            <form method="GET" action="{{ route('admin.brands.index') }}" class="flex items-center gap-2 w-full sm:w-80">
                <div class="relative w-full">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar por nombre o slug..." class="w-full pl-9 pr-3 py-2 text-xs border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3 top-2.5"></i>
                </div>
                <button type="submit" class="p-2 bg-slate-800 text-white rounded-xl text-xs font-semibold">Buscar</button>
            </form>
        </div>

        <a href="{{ route('admin.brands.create') }}" class="inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-500 text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-md transition w-full sm:w-auto justify-center">
            <i data-lucide="plus" class="w-4 h-4"></i>
            <span>Crear Nueva Marca</span>
        </a>
    </div>

    <!-- Brands Table & Grid -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-bold border-b border-slate-200">
                    <tr>
                        <th class="py-3.5 px-6">Logo</th>
                        <th class="py-3.5 px-4">Nombre de la Marca</th>
                        <th class="py-3.5 px-4">Slug Identificador</th>
                        <th class="py-3.5 px-4">Equipos Asociados</th>
                        <th class="py-3.5 px-4">Estado</th>
                        <th class="py-3.5 px-6 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                    @forelse($brands as $brand)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="py-4 px-6">
                                <div class="w-14 h-10 rounded-xl bg-white border border-slate-200 p-1 flex items-center justify-center shadow-xs overflow-hidden">
                                    @if($brand->logo_url)
                                        <img src="{{ $brand->logo_url }}" alt="{{ $brand->name }}" class="max-h-8 max-w-full object-contain">
                                    @else
                                        <span class="text-[10px] font-bold text-slate-400">Sin logo</span>
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="font-extrabold text-navy-900 text-sm">{{ $brand->name }}</div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="font-mono text-xs text-slate-500 bg-slate-100 px-2 py-0.5 rounded-md">{{ $brand->slug }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <a href="{{ route('admin.products.index', ['q' => $brand->name]) }}" class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-blue-50 text-[#080187] font-bold text-xs hover:bg-blue-100 transition" title="Ver aires de esta marca">
                                    <i data-lucide="box" class="w-3.5 h-3.5"></i>
                                    <span>{{ $brand->products_count }} Equipos</span>
                                </a>
                            </td>
                            <!-- Switch Interactivo para Activar / Desactivar Marca -->
                            <td class="py-4 px-4" 
                                x-data="{ 
                                    active: {{ $brand->activo ? 'true' : 'false' }}, 
                                    loading: false,
                                    async toggle() {
                                        if (this.loading) return;
                                        this.loading = true;
                                        const prev = this.active;
                                        this.active = !this.active;
                                        try {
                                            const res = await fetch('{{ route('admin.brands.toggle-status', $brand->id) }}', {
                                                method: 'PATCH',
                                                headers: {
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                    'Accept': 'application/json',
                                                    'Content-Type': 'application/json',
                                                },
                                                body: JSON.stringify({ activo: this.active })
                                            });
                                            const data = await res.json();
                                            if (!data.success) {
                                                this.active = prev;
                                            }
                                        } catch (e) {
                                            this.active = prev;
                                        } finally {
                                            this.loading = false;
                                        }
                                    }
                                }">
                                <div class="flex items-center gap-2.5">
                                    <button 
                                        type="button" 
                                        @click="toggle()" 
                                        :disabled="loading"
                                        :class="active ? 'bg-emerald-500' : 'bg-slate-300'"
                                        class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 disabled:opacity-50"
                                        :title="active ? 'Clic para ocultar marca' : 'Clic para activar marca'">
                                        <span class="sr-only">Alternar visibilidad</span>
                                        <span 
                                            aria-hidden="true" 
                                            :class="active ? 'translate-x-5' : 'translate-x-0'" 
                                            class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow-sm ring-0 transition duration-200 ease-in-out flex items-center justify-center">
                                            <span x-show="loading" class="w-2.5 h-2.5 border-2 border-emerald-600 border-t-transparent rounded-full animate-spin"></span>
                                        </span>
                                    </button>
                                    <span 
                                        :class="active ? 'text-emerald-700 bg-emerald-50 border-emerald-200' : 'text-slate-500 bg-slate-100 border-slate-200'" 
                                        class="px-2 py-0.5 rounded-md text-[11px] font-bold border transition-colors select-none">
                                        <span x-text="active ? 'Activa' : 'Inactiva'"></span>
                                    </span>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="{{ route('admin.brands.edit', $brand) }}" class="inline-flex p-1.5 text-slate-500 hover:text-brand-600 hover:bg-brand-50 rounded-lg transition" title="Editar Marca">
                                    <i data-lucide="edit-2" class="w-4 h-4"></i>
                                </a>
                                <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar esta marca?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Eliminar Marca">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-12 text-slate-400 text-sm">
                                <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center mx-auto mb-3 text-slate-400">
                                    <i data-lucide="tag" class="w-6 h-6"></i>
                                </div>
                                No se encontraron marcas registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($brands->hasPages())
            <div class="p-4 border-t border-slate-100">
                {{ $brands->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
