@extends('layouts.app')

@section('title', $product->name . ' - Mundo Airee, SRL')

@section('content')
<!-- Page Header Dinámico y Animado en Azul Corporativo #080187 -->
<section class="relative bg-gradient-to-b from-[#080187] via-[#060166] to-[#04014d] text-white pt-28 sm:pt-36 pb-14 sm:pb-20 overflow-hidden">
    <!-- Capa de Textura de Puntos Geométrica -->
    <div class="absolute inset-0 dot-grid-pattern opacity-30 pointer-events-none"></div>

    <!-- Orbes de Luz Ambiental Animados -->
    <div class="absolute -top-20 right-10 w-96 h-96 bg-sky-400/20 rounded-full blur-3xl animate-orb-1 pointer-events-none"></div>
    <div class="absolute top-1/2 -left-20 -translate-y-1/2 w-[400px] h-[400px] bg-blue-500/25 rounded-full blur-3xl animate-orb-2 pointer-events-none"></div>

    <!-- Líneas de Brisa Dinámica -->
    <div class="absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-sky-400/40 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex items-center space-x-2 text-xs text-blue-200 mb-3">
            <a href="{{ route('home') }}" class="hover:text-white transition">Inicio</a>
            <span>/</span>
            <a href="{{ route('products.index') }}" class="hover:text-white transition">Catálogo</a>
            <span>/</span>
            <span class="text-sky-300 font-bold">{{ $product->name }}</span>
        </div>
        <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight leading-tight">
            {{ $product->name }}
        </h1>
        <div class="mt-4 flex flex-wrap items-center gap-3">
            <span class="px-3.5 py-1.5 bg-white/10 text-sky-300 text-xs font-bold rounded-xl border border-white/20 backdrop-blur-md">
                {{ number_format($product->btu_capacity) }} BTU
            </span>
            @if($product->brand?->logo_url)
                <div class="px-3 py-1 bg-white rounded-xl shadow-xs flex items-center justify-center h-8">
                    <img src="{{ $product->brand->logo_url }}" alt="{{ $product->brand->name }}" class="max-h-5 w-auto object-contain {{ $product->brand->slug === 'airmax' ? 'scale-[1.5]' : '' }}">
                </div>
            @else
                <span class="px-3 py-1 bg-white/10 text-white text-xs font-semibold rounded-lg border border-white/20">
                    Marca: {{ $product->brand?->name }}
                </span>
            @endif
            @if($product->model_code)
                <span class="px-3 py-1 bg-white/10 text-white text-xs font-semibold rounded-lg border border-white/20">
                    Modelo: {{ $product->model_code }}
                </span>
            @endif
        </div>
    </div>
</section>

<!-- Product Detail Body -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left: Visual & Specs -->
            <div class="lg:col-span-7 space-y-8">
                <!-- Large Image Container con Logo de Marca -->
                <div class="bg-gradient-to-b from-blue-50/60 to-slate-50/60 border border-slate-200 rounded-3xl p-12 flex flex-col items-center justify-center relative overflow-hidden shadow-sm min-h-[340px]">
                    @if($product->brand?->logo_url)
                        <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-md px-3.5 py-2 rounded-2xl border border-slate-200 shadow-xs flex items-center justify-center h-10">
                            <img src="{{ $product->brand->logo_url }}" alt="{{ $product->brand->name }}" class="max-h-6 w-auto object-contain {{ $product->brand->slug === 'airmax' ? 'scale-[1.6]' : '' }} {{ $product->brand->slug === 'gree' ? 'scale-[1.2]' : '' }}">
                        </div>
                    @endif

                    @if($product->image_url)
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="max-h-56 max-w-full object-contain drop-shadow-md">
                    @else
                        <div class="flex flex-col items-center justify-center text-center">
                            @if($product->brand?->logo_url)
                                <img src="{{ $product->brand->logo_url }}" alt="{{ $product->brand->name }}" class="max-h-24 max-w-[200px] object-contain drop-shadow-md mb-4 {{ $product->brand->slug === 'airmax' ? 'scale-[1.8]' : '' }} {{ $product->brand->slug === 'gree' ? 'scale-[1.3]' : '' }}">
                            @else
                                <i data-lucide="wind" class="w-24 h-24 text-blue-500/40 mb-4"></i>
                            @endif
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">{{ $product->category?->name }} &bull; {{ $product->brand?->name }}</span>
                        </div>
                    @endif
                </div>

                <!-- Description & Features -->
                <div class="space-y-6">
                    <h3 class="text-xl font-bold text-[#080187]">Descripción del Equipo</h3>
                    <p class="text-slate-600 leading-relaxed text-base">
                        {{ $product->description ?: $product->short_description }}
                    </p>

                    @if(!empty($product->features))
                        <div class="space-y-4 pt-4 border-t border-slate-100">
                            <h4 class="text-base font-bold text-[#080187]">Características Principales</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                @foreach($product->features as $feature)
                                    <div class="flex items-start gap-2.5 p-3 rounded-xl bg-slate-50 border border-slate-100 text-xs sm:text-sm text-slate-700 font-medium">
                                        <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5"></i>
                                        <span>{{ $feature }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Technical Specs Table -->
                <div class="space-y-4 pt-6 border-t border-slate-100">
                    <h3 class="text-xl font-bold text-[#080187]">Ficha Técnica</h3>
                    <div class="bg-slate-50 rounded-2xl border border-slate-200 overflow-hidden">
                        <table class="w-full text-xs sm:text-sm text-left">
                            <tbody class="divide-y divide-slate-200">
                                <tr>
                                    <td class="py-3 px-4 font-bold text-slate-500 w-1/3">Capacidad</td>
                                    <td class="py-3 px-4 text-slate-900 font-semibold">{{ $product->formatted_btu }}</td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 font-bold text-slate-500">Tecnología</td>
                                    <td class="py-3 px-4 text-slate-900 font-semibold">{{ $product->inverter_type }}</td>
                                </tr>
                                @if($product->seer_rating)
                                <tr>
                                    <td class="py-3 px-4 font-bold text-slate-500">Eficiencia Energética</td>
                                    <td class="py-3 px-4 text-slate-900 font-semibold">{{ $product->seer_rating }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td class="py-3 px-4 font-bold text-slate-500">Voltaje de Operación</td>
                                    <td class="py-3 px-4 text-slate-900 font-semibold">{{ $product->voltage }}</td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 font-bold text-slate-500">Refrigerante</td>
                                    <td class="py-3 px-4 text-slate-900 font-semibold">{{ $product->refrigerant }}</td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 font-bold text-slate-500">Disponibilidad</td>
                                    <td class="py-3 px-4 text-slate-900 font-semibold">
                                        @if($product->cantidad_disponible > 5)
                                            <span class="text-emerald-600 font-bold flex items-center gap-1.5">
                                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                                {{ $product->cantidad_disponible }} unidades en almacén
                                            </span>
                                        @elseif($product->cantidad_disponible > 0)
                                            <span class="text-amber-600 font-bold flex items-center gap-1.5">
                                                <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                                Últimas {{ $product->cantidad_disponible }} unidades disponibles
                                            </span>
                                        @else
                                            <span class="text-slate-500 italic">Disponible por encargo</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 font-bold text-slate-500">Marca</td>
                                    <td class="py-3 px-4 text-slate-900 font-semibold">{{ $product->brand?->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Right: Price, Direct WhatsApp Action & Guarantees -->
            <div class="lg:col-span-5 space-y-6">
                <div class="sticky top-28 bg-[#080187] text-white rounded-3xl p-6 sm:p-8 shadow-2xl border border-blue-900 space-y-6">
                    
                    <div>
                        <!-- Badge Disponibilidad / Stock -->
                        <div class="mb-3">
                            @if($product->cantidad_disponible > 5)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 text-xs font-extrabold backdrop-blur-sm">
                                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                    <span>En Stock: {{ $product->cantidad_disponible }} unidades disponibles</span>
                                </span>
                            @elseif($product->cantidad_disponible > 0)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-500/20 text-amber-300 border border-amber-400/30 text-xs font-extrabold backdrop-blur-sm">
                                    <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                                    <span>¡Bajo inventario! Quedan {{ $product->cantidad_disponible }} unidades</span>
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/10 text-slate-300 border border-white/20 text-xs font-bold">
                                    <span>Bajo encargo / Por solicitud</span>
                                </span>
                            @endif
                        </div>

                        <span class="text-xs font-bold text-sky-300 uppercase tracking-wider block mb-1">Cotización Oficial Mundo Airee, SRL</span>
                        @if($product->price)
                            <div class="text-3xl font-black text-white">
                                {{ $product->price_label ?? 'RD$ ' . number_format($product->price, 2) }}
                            </div>
                        @else
                            <div class="text-2xl font-extrabold text-white">
                                Precio a Cotizar
                            </div>
                        @endif
                        <p class="text-xs text-blue-100 mt-1">Incluye asesoría técnica y cálculo de capacidad.</p>
                    </div>

                    <!-- Direct WhatsApp Pre-filled Button -->
                    <div class="space-y-3 pt-2">
                        <a href="{{ $product->whatsapp_url }}" target="_blank" rel="noopener" class="w-full flex items-center justify-center gap-3 bg-whatsapp hover:bg-whatsappDark text-white font-bold py-4 px-6 rounded-2xl shadow-lg shadow-emerald-600/30 hover:scale-[1.02] transition-all duration-200 text-base">
                            <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-6 h-6 object-contain brightness-0 invert">
                            <span>Cotizar</span>
                        </a>
                        <p class="text-[11px] text-center text-blue-200 leading-tight">
                            Atención directa por asesores técnicos de Mundo Airee, SRL.
                        </p>
                    </div>

                    <!-- Trust checklist -->
                    <div class="pt-6 border-t border-blue-800/80 space-y-3 text-xs text-blue-100">
                        <div class="flex items-center gap-3">
                            <i data-lucide="shield-check" class="w-4 h-4 text-sky-300"></i>
                            <span>Garantía de fábrica en compresor y piezas</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i data-lucide="truck" class="w-4 h-4 text-sky-300"></i>
                            <span>Entrega rápida disponible en Santo Domingo</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i data-lucide="wrench" class="w-4 h-4 text-sky-300"></i>
                            <span>Opción de instalación técnica profesional</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Related Products -->
@if($relatedProducts->isNotEmpty())
<section class="py-16 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h3 class="text-2xl font-bold text-[#080187] mb-8">Equipos Relacionados</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($relatedProducts as $rel)
                <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-xs flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center text-xs text-slate-500 mb-2 font-bold">
                            @if($rel->brand?->logo_url)
                                <img src="{{ $rel->brand->logo_url }}" alt="{{ $rel->brand->name }}" class="max-h-4 w-auto object-contain">
                            @else
                                <span>{{ $rel->brand?->name }}</span>
                            @endif
                            <span class="text-[#080187] bg-blue-50 px-2 py-0.5 rounded font-black">{{ number_format($rel->btu_capacity) }} BTU</span>
                        </div>
                        <h4 class="font-bold text-[#080187] hover:underline mb-2">
                            <a href="{{ route('products.show', $rel->slug) }}">{{ $rel->name }}</a>
                        </h4>
                    </div>
                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                        <a href="{{ route('products.show', $rel->slug) }}" class="text-xs font-bold text-[#080187]">Ver Ficha</a>
                        <a href="{{ $rel->whatsapp_url }}" target="_blank" class="text-xs font-bold text-emerald-600 flex items-center gap-1">
                            <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-3.5 h-3.5 object-contain">
                            <span>Cotizar</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
