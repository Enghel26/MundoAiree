@extends('layouts.admin')

@section('title', 'Gestión de Servicios - Panel Mundo Aire, SRL')
@section('page_title', 'Servicios Técnicos')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
        <div>
            <p class="text-xs text-slate-500">Administra los servicios que se muestran en la página web y configuran los mensajes de WhatsApp.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-500 text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-md transition">
            <i data-lucide="plus" class="w-4 h-4"></i>
            <span>Nuevo Servicio</span>
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 shadow-xs overflow-hidden">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-bold border-b border-slate-200">
                <tr>
                    <th class="py-3.5 px-6">Servicio</th>
                    <th class="py-3.5 px-4">Descripción Breve</th>
                    <th class="py-3.5 px-4">Orden</th>
                    <th class="py-3.5 px-4">Estado</th>
                    <th class="py-3.5 px-4">WhatsApp Link</th>
                    <th class="py-3.5 px-6 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                @foreach($services as $service)
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-brand-50 text-brand-600 flex items-center justify-center font-bold">
                                    <i data-lucide="{{ $service->icon ?: 'tool' }}" class="w-4 h-4"></i>
                                </div>
                                <span class="font-bold text-navy-900 text-sm">{{ $service->title }}</span>
                            </div>
                        </td>
                        <td class="py-4 px-4 max-w-xs truncate text-slate-500">
                            {{ $service->short_description }}
                        </td>
                        <td class="py-4 px-4">
                            <span class="px-2 py-0.5 rounded bg-slate-100 font-bold text-slate-700">{{ $service->order }}</span>
                        </td>
                        <td class="py-4 px-4">
                            @if($service->is_active)
                                <span class="px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-extrabold">Activo</span>
                            @else
                                <span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 text-[10px] font-bold">Inactivo</span>
                            @endif
                        </td>
                        <td class="py-4 px-4">
                            <a href="{{ $service->whatsapp_url }}" target="_blank" class="text-emerald-600 font-bold hover:underline flex items-center gap-1">
                                <i data-lucide="message-circle" class="w-3.5 h-3.5"></i> Probar Chat
                            </a>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="p-1.5 text-slate-500 hover:text-brand-600 hover:bg-slate-100 rounded-lg transition" title="Editar">
                                    <i data-lucide="edit-2" class="w-4 h-4"></i>
                                </a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este servicio?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition" title="Eliminar">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
