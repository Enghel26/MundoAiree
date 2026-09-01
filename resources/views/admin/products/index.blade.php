@extends('layouts.admin')

@section('title', 'Gestión de Catálogo - Mundo Aire, SRL')
@section('page_title', 'Catálogo de Aires Acondicionados')

@section('content')
<div class="space-y-6">
    
    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-3 w-full sm:w-auto">
            <form method="GET" action="{{ route('admin.products.index') }}" class="flex items-center gap-2 w-full sm:w-80">
                <div class="relative w-full">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar por nombre o modelo..." class="w-full pl-9 pr-3 py-2 text-xs border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3 top-2.5"></i>
                </div>
                <button type="submit" class="p-2 bg-slate-800 text-white rounded-xl text-xs font-semibold">Buscar</button>
            </form>
        </div>

        <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-500 text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-md transition w-full sm:w-auto justify-center">
            <i data-lucide="plus" class="w-4 h-4"></i>
            <span>Agregar Aire Acondicionado</span>
        </a>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-bold border-b border-slate-200">
                    <tr>
                        <th class="py-3.5 px-6">Equipo / Modelo</th>
                        <th class="py-3.5 px-4">Marca / Tipo</th>
                        <th class="py-3.5 px-4">Capacidad</th>
                        <th class="py-3.5 px-4">Disponibles</th>
                        <th class="py-3.5 px-4">Precio Est.</th>
                        <th class="py-3.5 px-4">Estado (Visibilidad)</th>
                        <th class="py-3.5 px-4">WhatsApp Link</th>
                        <th class="py-3.5 px-6 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                    @forelse($products as $product)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="py-4 px-6">
                                <div class="font-bold text-navy-900 text-sm">{{ $product->nombre }}</div>
                                @if($product->codigo_modelo)
                                    <span class="text-[11px] text-slate-400 font-mono">Mod: {{ $product->codigo_modelo }}</span>
                                @endif
                            </td>
                            <td class="py-4 px-4">
                                <span class="font-semibold text-slate-900 block">{{ $product->brand?->nombre ?? $product->brand?->name }}</span>
                                <span class="text-[11px] text-slate-500">{{ $product->category?->nombre ?? $product->category?->name }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-2.5 py-1 rounded-lg bg-navy-900 text-white font-bold text-[11px]">
                                    {{ number_format($product->capacidad_btu) }} BTU
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                @if($product->cantidad_disponible > 5)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 text-xs font-bold border border-emerald-200">
                                        <i data-lucide="boxes" class="w-3.5 h-3.5"></i>
                                        <span>{{ $product->cantidad_disponible }} Uds.</span>
                                    </span>
                                @elseif($product->cantidad_disponible > 0)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-amber-50 text-amber-700 text-xs font-bold border border-amber-200" title="Bajo inventario">
                                        <i data-lucide="alert-triangle" class="w-3.5 h-3.5"></i>
                                        <span>{{ $product->cantidad_disponible }} Uds.</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-rose-50 text-rose-700 text-xs font-bold border border-rose-200">
                                        <i data-lucide="x-circle" class="w-3.5 h-3.5"></i>
                                        <span>Agotado (0)</span>
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-4">
                                @if($product->precio)
                                    <span class="font-bold text-slate-900">{{ $product->etiqueta_precio ?? 'RD$ ' . number_format($product->precio, 2) }}</span>
                                @else
                                    <span class="text-slate-400 italic">Por cotización</span>
                                @endif
                            </td>

                            <!-- Switch Interactivo para Activar / Desactivar -->
                            <td class="py-4 px-4" 
                                x-data="{ 
                                    active: {{ $product->activo ? 'true' : 'false' }}, 
                                    loading: false,
                                    async toggle() {
                                        if (this.loading) return;
                                        this.loading = true;
                                        const prev = this.active;
                                        this.active = !this.active;
                                        try {
                                            const res = await fetch('{{ route('admin.products.toggle-status', $product->id) }}', {
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
                                <div class="flex items-center gap-3">
                                    <!-- iOS Style Toggle Switch Button -->
                                    <button 
                                        type="button" 
                                        @click="toggle()" 
                                        :disabled="loading"
                                        :class="active ? 'bg-emerald-500' : 'bg-slate-300'"
                                        class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 disabled:opacity-50"
                                        :title="active ? 'Clic para ocultar del catálogo' : 'Clic para mostrar en catálogo'">
                                        <span class="sr-only">Alternar visibilidad</span>
                                        <span 
                                            aria-hidden="true" 
                                            :class="active ? 'translate-x-5' : 'translate-x-0'" 
                                            class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow-sm ring-0 transition duration-200 ease-in-out flex items-center justify-center">
                                            <span x-show="loading" class="w-2.5 h-2.5 border-2 border-emerald-600 border-t-transparent rounded-full animate-spin"></span>
                                        </span>
                                    </button>

                                    <!-- Label de Estado -->
                                    <span 
                                        :class="active ? 'text-emerald-700 bg-emerald-50 border-emerald-200' : 'text-slate-500 bg-slate-100 border-slate-200'" 
                                        class="px-2 py-0.5 rounded-md text-[11px] font-bold border transition-colors select-none">
                                        <span x-text="active ? 'Activo' : 'Oculto'"></span>
                                    </span>
                                </div>
                            </td>

                            <td class="py-4 px-4">
                                <a href="{{ $product->whatsapp_url }}" target="_blank" class="inline-flex items-center gap-1 text-[11px] text-emerald-600 hover:underline font-bold">
                                    <i data-lucide="message-circle" class="w-3.5 h-3.5"></i> Probar Chat
                                </a>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="p-1.5 text-slate-500 hover:text-brand-600 hover:bg-slate-100 rounded-lg transition" title="Editar">
                                        <i data-lucide="edit-2" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este equipo?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition" title="Eliminar">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-10 text-center text-slate-400">
                                No se encontraron equipos en el catálogo.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $products->links() }}
        </div>
    </div>

</div>
@endsection
