@extends('layouts.admin')

@section('title', 'Crear Nueva Marca - Mundo Aire, SRL')
@section('page_title', 'Agregar Nueva Marca de Aires')

@section('content')
<div class="max-w-3xl">
    <div class="mb-6">
        <a href="{{ route('admin.brands.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-500 hover:text-brand-600 transition">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            <span>Volver a Lista de Marcas</span>
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 shadow-xs p-6 sm:p-8">
        <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Nombre de la Marca -->
            <div>
                <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nombre de la Marca <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="Ej: GREE, AIRMAX, MIDEA, CARRIER..." class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:outline-none @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Slug Opcional -->
            <div>
                <label for="slug" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Slug Identificador (Opcional)</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" placeholder="Se generará automáticamente si lo dejas en blanco (ej: gree, airmax)" class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:outline-none @error('slug') border-red-500 @enderror">
                <p class="text-[11px] text-slate-400 mt-1">Usado en URLs y nombres de archivo.</p>
                @error('slug')
                    <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Logo de la Marca (Subida de Archivo o URL) -->
            <div class="space-y-3 pt-2">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Logo de la Marca</label>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Opción 1: Subir Archivo -->
                    <div class="border-2 border-dashed border-slate-200 hover:border-brand-500 rounded-2xl p-4 text-center transition bg-slate-50/50">
                        <i data-lucide="upload-cloud" class="w-8 h-8 text-slate-400 mx-auto mb-2"></i>
                        <span class="block text-xs font-bold text-slate-700">Subir Imagen / SVG</span>
                        <span class="block text-[10px] text-slate-400 mb-3">PNG, JPG, SVG o WebP (Máx 4MB)</span>
                        <input type="file" name="logo_file" accept="image/*,.svg" class="text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100">
                    </div>

                    <!-- Opción 2: Ruta Existente -->
                    <div class="border border-slate-200 rounded-2xl p-4 bg-white flex flex-col justify-center space-y-2">
                        <span class="block text-xs font-bold text-slate-700">O ruta en public:</span>
                        <input type="text" name="logo_url" value="{{ old('logo_url') }}" placeholder="images/Marcas/nombre.png" class="w-full px-3 py-2 text-xs border border-slate-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:outline-none">
                        <span class="text-[10px] text-slate-400">Si el archivo ya existe en public/images/Marcas</span>
                    </div>
                </div>
                @error('logo_file')
                    <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Estado Activo -->
            <div class="pt-3 flex items-center gap-3">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="w-4 h-4 text-brand-600 rounded-md border-slate-300 focus:ring-brand-500">
                <label for="is_active" class="text-xs font-bold text-slate-700 cursor-pointer">Marca Activa y Visible en el Catálogo</label>
            </div>

            <!-- Botones de Acción -->
            <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.brands.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 text-xs font-bold hover:bg-slate-50 transition">Cancelar</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-500 text-white text-xs font-bold shadow-md transition flex items-center gap-2">
                    <i data-lucide="check" class="w-4 h-4"></i>
                    <span>Guardar Marca</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
