@extends('layouts.admin')

@section('title', 'Editar Aire Acondicionado - Panel Mundo Aire, SRL')
@section('page_title', 'Editar Producto: ' . $product->name)

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 hover:text-navy-900 transition">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Volver al Catálogo
        </a>
        <a href="{{ $product->whatsapp_url }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs text-emerald-600 font-bold hover:underline">
            <i data-lucide="message-circle" class="w-4 h-4"></i> Probar Enlace WhatsApp
        </a>
    </div>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl p-8 border border-slate-200 shadow-xs space-y-6">
        @csrf
        @method('PUT')

        <div class="border-b border-slate-100 pb-4">
            <h3 class="text-lg font-bold text-navy-900">Editar Información del Equipo</h3>
            <p class="text-xs text-slate-500">Actualiza las especificaciones, precio o plantilla del mensaje de WhatsApp.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Name -->
            <div class="sm:col-span-2">
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Nombre Completo del Producto *</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
            </div>

            <!-- Brand -->
            <div>
                <div class="flex items-center justify-between mb-1">
                    <label class="block text-xs font-bold uppercase text-slate-600">Marca *</label>
                    <a href="{{ route('admin.brands.create') }}" target="_blank" class="text-[11px] font-bold text-brand-600 hover:text-brand-700 hover:underline flex items-center gap-1" title="Abrir creador de marcas en nueva pestaña">
                        <i data-lucide="plus" class="w-3 h-3"></i>
                        <span>Crear Marca</span>
                    </a>
                </div>
                <select name="brand_id" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm bg-white focus:ring-2 focus:ring-brand-500 focus:outline-none">
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Category / Type -->
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Tipo de Equipo *</label>
                <select name="category_id" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm bg-white focus:ring-2 focus:ring-brand-500 focus:outline-none">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Model Code -->
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Código o Modelo de Fábrica</label>
                <input type="text" name="model_code" value="{{ old('model_code', $product->model_code) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
            </div>

            <!-- BTU Capacity -->
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Capacidad en BTU *</label>
                <select name="btu_capacity" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm bg-white focus:ring-2 focus:ring-brand-500 focus:outline-none">
                    <option value="9000" {{ old('btu_capacity', $product->btu_capacity) == 9000 ? 'selected' : '' }}>9,000 BTU (0.75 Ton)</option>
                    <option value="12000" {{ old('btu_capacity', $product->btu_capacity) == 12000 ? 'selected' : '' }}>12,000 BTU (1 Ton)</option>
                    <option value="18000" {{ old('btu_capacity', $product->btu_capacity) == 18000 ? 'selected' : '' }}>18,000 BTU (1.5 Tons)</option>
                    <option value="24000" {{ old('btu_capacity', $product->btu_capacity) == 24000 ? 'selected' : '' }}>24,000 BTU (2 Tons)</option>
                    <option value="36000" {{ old('btu_capacity', $product->btu_capacity) == 36000 ? 'selected' : '' }}>36,000 BTU (3 Tons)</option>
                    <option value="48000" {{ old('btu_capacity', $product->btu_capacity) == 48000 ? 'selected' : '' }}>48,000 BTU (4 Tons)</option>
                    <option value="60000" {{ old('btu_capacity', $product->btu_capacity) == 60000 ? 'selected' : '' }}>60,000 BTU (5 Tons)</option>
                </select>
            </div>

            <!-- Inverter / Technology -->
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Tecnología *</label>
                <input type="text" name="inverter_type" value="{{ old('inverter_type', $product->inverter_type) }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
            </div>

            <!-- SEER Rating -->
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Eficiencia SEER</label>
                <input type="text" name="seer_rating" value="{{ old('seer_rating', $product->seer_rating) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
            </div>

            <!-- Voltage -->
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Voltaje</label>
                <input type="text" name="voltage" value="{{ old('voltage', $product->voltage) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
            </div>

            <!-- Refrigerant -->
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Gas Refrigerante</label>
                <input type="text" name="refrigerant" value="{{ old('refrigerant', $product->refrigerant) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
            </div>

            <!-- Price -->
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Precio Numérico (RD$)</label>
                <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
            </div>

            <!-- Price Label -->
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Etiqueta de Precio Visible</label>
                <input type="text" name="price_label" value="{{ old('price_label', $product->price_label) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
            </div>

            <!-- Cantidad Disponible (Stock) -->
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Cantidad Disponible (Stock en Inventario) <span class="text-red-500">*</span></label>
                <input type="number" min="0" name="cantidad_disponible" value="{{ old('cantidad_disponible', $product->cantidad_disponible ?? 10) }}" required placeholder="Ej: 10" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
            </div>

            <!-- Short Description -->
            <div class="sm:col-span-2">
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Resumen Breve</label>
                <input type="text" name="short_description" value="{{ old('short_description', $product->short_description) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
            </div>

            <!-- Full Description -->
            <div class="sm:col-span-2">
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Descripción Completa</label>
                <textarea name="description" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- Features list -->
            <div class="sm:col-span-2">
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Características Clave (Una por línea)</label>
                <textarea name="features_text" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">{{ old('features_text', is_array($product->features) ? implode("\n", $product->features) : '') }}</textarea>
            </div>

            <!-- Custom WhatsApp Template -->
            <div class="sm:col-span-2">
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Mensaje Personalizado de WhatsApp</label>
                <input type="text" name="whatsapp_message_template" value="{{ old('whatsapp_message_template', $product->whatsapp_message_template) }}" placeholder="Hola, estoy interesado en el Aire Acondicionado [Nombre/Modelo del producto] que vi en la página web de Mundo Aire. ¿Me pueden dar más información?" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
            </div>

            <!-- Status Checkboxes -->
            <div class="sm:col-span-2 flex items-center space-x-6 pt-2">
                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-slate-700">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }} class="rounded text-brand-600">
                    <span>Destacar en la página de Inicio</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-slate-700">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }} class="rounded text-brand-600">
                    <span>Publicar / Visible en el catálogo</span>
                </label>
            </div>
        </div>

        <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
            <a href="{{ route('admin.products.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 text-xs font-bold hover:bg-slate-50 transition">
                Cancelar
            </a>
            <button type="submit" class="px-6 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-xs font-bold rounded-xl shadow-md transition">
                Actualizar Producto
            </button>
        </div>
    </form>
</div>
@endsection
