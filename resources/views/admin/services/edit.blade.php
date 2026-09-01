@extends('layouts.admin')

@section('title', 'Editar Servicio - Panel Mundo Aire, SRL')
@section('page_title', 'Editar Servicio: ' . $service->title)

@section('content')
<div class="max-w-3xl space-y-6">
    <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 hover:text-navy-900 transition">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Volver a Servicios
    </a>

    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" class="bg-white rounded-3xl p-8 border border-slate-200 shadow-xs space-y-6">
        @csrf
        @method('PUT')

        <div class="border-b border-slate-100 pb-4">
            <h3 class="text-lg font-bold text-navy-900">Editar Datos del Servicio</h3>
        </div>

        <div class="space-y-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Título del Servicio *</label>
                <input type="text" name="title" value="{{ old('title', $service->title) }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Ícono Lucide</label>
                <input type="text" name="icon" value="{{ old('icon', $service->icon) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Descripción Breve (Tarjeta) *</label>
                <textarea name="short_description" rows="2" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">{{ old('short_description', $service->short_description) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Contenido Detallado</label>
                <textarea name="content" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">{{ old('content', $service->content) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Mensaje Predeterminado de WhatsApp</label>
                <input type="text" name="whatsapp_message" value="{{ old('whatsapp_message', $service->whatsapp_message) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Orden de Visualización</label>
                    <input type="number" name="order" value="{{ old('order', $service->order) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                </div>

                <div class="flex items-center pt-6">
                    <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-slate-700">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }} class="rounded text-brand-600">
                        <span>Servicio Activo / Visible</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
            <a href="{{ route('admin.services.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 text-xs font-bold hover:bg-slate-50 transition">
                Cancelar
            </a>
            <button type="submit" class="px-6 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-xs font-bold rounded-xl shadow-md transition">
                Actualizar Servicio
            </button>
        </div>
    </form>
</div>
@endsection
