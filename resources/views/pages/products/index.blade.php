@extends('layouts.app')

@section('title', 'Catálogo de Aires Acondicionados y Componentes - Mundo Airee, SRL')

@push('styles')
<style>
    .filter-scroll {
        scrollbar-width: thin;
        scrollbar-color: #cbd5e1 transparent;
    }
    .filter-scroll::-webkit-scrollbar {
        width: 5px;
    }
    .filter-scroll::-webkit-scrollbar-track {
        background: transparent;
    }
    .filter-scroll::-webkit-scrollbar-thumb {
        background-color: #cbd5e1;
        border-radius: 9999px;
    }
    .filter-scroll::-webkit-scrollbar-thumb:hover {
        background-color: #080187;
    }
</style>
@endpush

@section('content')
<!-- Page Header Innovador Asimétrico en 2 Columnas con Selector de BTU y Showcase Tecnológico -->
<section class="relative bg-gradient-to-br from-[#080187] via-[#05015e] to-[#0f1323] text-white pt-28 sm:pt-36 pb-16 sm:pb-24 overflow-hidden">
    <!-- Capa de Textura de Puntos Geométrica -->
    <div class="absolute inset-0 dot-grid-pattern opacity-25 pointer-events-none"></div>

    <!-- Orbes de Luz Ambiental Animados -->
    <div class="absolute -top-20 -left-10 w-96 h-96 bg-blue-400/25 rounded-full blur-3xl animate-orb-1 pointer-events-none"></div>
    <div class="absolute top-1/3 -right-20 w-[450px] h-[450px] bg-cyan-400/20 rounded-full blur-3xl animate-orb-2 pointer-events-none"></div>
    <div class="absolute -bottom-20 left-1/2 -translate-x-1/2 w-80 h-80 bg-sky-300/15 rounded-full blur-3xl animate-orb-3 pointer-events-none"></div>

    <!-- Línea decorativa de brisa -->
    <div class="absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-sky-400/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
            
            <!-- Columna Izquierda: Mensaje y Selector Rápido de BTU -->
            <div class="lg:col-span-7 space-y-6 text-left">
                <!-- Badge Pulsante de Estado -->
                <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/15 backdrop-blur-md text-xs font-semibold text-sky-200 shadow-xs">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Inventario en Tiempo Real &bull; Garantía Certificada</span>
                </div>

                <!-- Título Asimétrico con Degradado Brillante -->
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight">
                    Aires Inverter y <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-300 via-cyan-200 to-white drop-shadow-md">Componentes de Calidad</span>
                </h1>

                <!-- Párrafo Descriptivo -->
                <p class="text-blue-100/90 text-base sm:text-lg leading-relaxed font-normal max-w-2xl">
                    Explora nuestra selección de equipos residenciales y comerciales de alta eficiencia energética, tuberías de cobre, mangueras, filtros y repuestos con entrega e instalación garantizada.
                </p>

                <!-- Selector Rápido de Capacidad BTU en el Hero -->
                <div class="pt-1 space-y-2.5">
                    <span class="text-xs font-bold uppercase tracking-wider text-sky-300 block">Filtrar rápidamente por capacidad:</span>
                    <div class="flex flex-wrap items-center gap-2">
                        <a href="{{ route('products.index') }}" class="px-3.5 py-2 rounded-xl text-xs font-extrabold transition {{ !request('btu') ? 'bg-white text-[#080187] shadow-md scale-105' : 'bg-white/10 text-white hover:bg-white/20 border border-white/15' }}">
                            Todos
                        </a>
                        <a href="{{ route('products.index', ['btu' => 12000]) }}" class="px-3.5 py-2 rounded-xl text-xs font-extrabold transition {{ request('btu') == 12000 ? 'bg-white text-[#080187] shadow-md scale-105' : 'bg-white/10 text-white hover:bg-white/20 border border-white/15' }}">
                            12,000 BTU
                        </a>
                        <a href="{{ route('products.index', ['btu' => 18000]) }}" class="px-3.5 py-2 rounded-xl text-xs font-extrabold transition {{ request('btu') == 18000 ? 'bg-white text-[#080187] shadow-md scale-105' : 'bg-white/10 text-white hover:bg-white/20 border border-white/15' }}">
                            18,000 BTU
                        </a>
                        <a href="{{ route('products.index', ['btu' => 24000]) }}" class="px-3.5 py-2 rounded-xl text-xs font-extrabold transition {{ request('btu') == 24000 ? 'bg-white text-[#080187] shadow-md scale-105' : 'bg-white/10 text-white hover:bg-white/20 border border-white/15' }}">
                            24,000 BTU
                        </a>
                        <a href="{{ route('products.index', ['btu' => 36000]) }}" class="px-3.5 py-2 rounded-xl text-xs font-extrabold transition {{ request('btu') == 36000 ? 'bg-white text-[#080187] shadow-md scale-105' : 'bg-white/10 text-white hover:bg-white/20 border border-white/15' }}">
                            36,000 BTU
                        </a>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha: Showcase Tecnológico de Climatización -->
            <div class="lg:col-span-5">
                <div class="relative rounded-3xl p-6 sm:p-7 bg-white/10 backdrop-blur-xl border border-white/20 shadow-2xl shadow-[#04014d]/50 space-y-5 hover:border-sky-300/40 transition duration-300">
                    
                    <!-- Header del Showcase -->
                    <div class="flex items-center justify-between border-b border-white/15 pb-4">
                        <div class="flex items-center gap-2">
                            <i data-lucide="zap" class="w-4 h-4 text-emerald-400"></i>
                            <span class="text-xs font-bold text-white uppercase tracking-wider">Eficiencia Energética SEER 20+</span>
                        </div>
                        <span class="px-2.5 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 text-[11px] font-black border border-emerald-500/30">
                            Eco Inverter
                        </span>
                    </div>

                    <!-- Mini Ilustración de Consola con Display Digital -->
                    <div class="p-4 rounded-2xl bg-gradient-to-b from-white/15 to-white/5 border border-white/10 flex items-center justify-between">
                        <div class="space-y-1">
                            <span class="text-[11px] font-bold text-sky-300 uppercase block">Tecnología de Flujo Frío</span>
                            <h4 class="font-extrabold text-white text-sm">Ultra Silencioso &bull; Filtro Antibacterial</h4>
                        </div>
                        <div class="bg-[#0f1323] px-3.5 py-1.5 rounded-xl border border-sky-400/40 text-center">
                            <span class="font-mono text-base font-bold text-sky-300">21°C</span>
                            <span class="block text-[8px] font-semibold text-emerald-400">EN LÍNEA</span>
                        </div>
                    </div>

                    <!-- Insignias de Marcas Líderes -->
                    <div class="space-y-2">
                        <span class="text-[11px] font-semibold text-blue-200 uppercase tracking-wider block">Marcas Oficiales Disponibles:</span>
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="px-3 py-1 bg-white/10 rounded-xl text-xs font-extrabold text-white border border-white/15">GREE</span>
                            <span class="px-3 py-1 bg-white/10 rounded-xl text-xs font-extrabold text-white border border-white/15">AIRMAX</span>
                            <span class="px-3 py-1 bg-white/10 rounded-xl text-xs font-extrabold text-white border border-white/15">CONFORTMATIC</span>
                            <span class="px-3 py-1 bg-white/10 rounded-xl text-xs font-extrabold text-white border border-white/15">ROYAL</span>
                        </div>
                    </div>

                    <!-- Botón Rápido de Cotización -->
                    <a href="{{ \App\Helpers\WhatsAppHelper::makeLink('¡Hola Mundo Airee SRL! Me gustaría cotizar la compra de un equipo o repuestos del catálogo.') }}" target="_blank" rel="noopener" class="w-full flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-3 rounded-2xl shadow-lg transition text-xs">
                        <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-4 h-4 object-contain brightness-0 invert">
                        <span>Cotizar</span>
                    </a>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- Catalog Main Area with Floating Filters (x-data para drawer móvil y panel flotante) -->
<section class="py-16 bg-slate-50 min-h-screen relative" x-data="{ mobileFilterOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Botón Flotante para Dispositivos Móviles (Fixed FAB) -->
        <div class="lg:hidden fixed bottom-6 left-1/2 -translate-x-1/2 z-40">
            <button 
                @click="mobileFilterOpen = true" 
                type="button" 
                class="inline-flex items-center gap-2.5 px-6 py-3.5 bg-[#080187] text-white font-extrabold text-sm rounded-full shadow-2xl shadow-blue-900/60 border border-blue-400/40 hover:scale-105 transition-all duration-200 backdrop-blur-md"
            >
                <i data-lucide="sliders-horizontal" class="w-4 h-4 text-sky-300"></i>
                <span>Filtrar Productos</span>
                @php
                    $appliedCount = count(array_filter(request()->only(['categoria', 'marca', 'btu', 'q'])));
                @endphp
                @if($appliedCount > 0)
                    <span class="w-5 h-5 rounded-full bg-brand-500 text-white text-[11px] font-black flex items-center justify-center shadow-xs">
                        {{ $appliedCount }}
                    </span>
                @endif
            </button>
        </div>

        <!-- Drawer Flotante / Modal de Filtros para Móvil -->
        <div 
            x-show="mobileFilterOpen" 
            x-cloak 
            class="fixed inset-0 z-50 lg:hidden flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-950/60 backdrop-blur-sm transition-opacity"
            x-transition.opacity
        >
            <div 
                @click.away="mobileFilterOpen = false" 
                class="bg-white w-full max-w-lg max-h-[85vh] rounded-t-3xl sm:rounded-3xl shadow-2xl border border-slate-200 flex flex-col overflow-hidden"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="translate-y-full sm:scale-95 sm:opacity-0"
                x-transition:enter-end="translate-y-0 sm:scale-100 sm:opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="translate-y-0 sm:scale-100 sm:opacity-100"
                x-transition:leave-end="translate-y-full sm:scale-95 sm:opacity-0"
            >
                <!-- Drawer Header -->
                <div class="px-6 py-4 bg-slate-50 border-b border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-xl bg-blue-100 text-[#080187] flex items-center justify-center">
                            <i data-lucide="sliders-horizontal" class="w-4 h-4"></i>
                        </div>
                        <h3 class="font-black text-lg text-[#080187]">Filtros de Búsqueda</h3>
                    </div>
                    <button @click="mobileFilterOpen = false" class="p-2 rounded-xl text-slate-400 hover:text-slate-700 hover:bg-slate-200 transition">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>

                <!-- Drawer Form Content -->
                <div class="p-6 overflow-y-auto filter-scroll space-y-6 flex-1">
                    <form action="{{ route('products.index') }}" method="GET" class="space-y-6">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1.5">Buscar</label>
                            <div class="relative">
                                <input type="text" name="q" value="{{ request('q') }}" placeholder="Modelo, marca, repuesto..." class="w-full pl-9 pr-3 py-2.5 text-sm border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-slate-50">
                                <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3 top-3.5"></i>
                            </div>
                        </div>

                        <!-- Capacidad BTU -->
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-2">Capacidad (BTU)</label>
                            <div class="grid grid-cols-2 gap-2">
                                @foreach($btuCapacities as $btu)
                                    <label class="flex items-center gap-2 p-2.5 rounded-xl border text-xs font-medium cursor-pointer transition {{ request('btu') == $btu ? 'bg-blue-50 border-[#080187] text-[#080187] font-bold shadow-xs' : 'border-slate-200 text-slate-700' }}">
                                        <input type="radio" name="btu" value="{{ $btu }}" {{ request('btu') == $btu ? 'checked' : '' }} class="text-[#080187]">
                                        <span>{{ number_format($btu) }} BTU</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Categoría -->
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-2">Categoría</label>
                            <div class="space-y-1.5">
                                @foreach($categories as $cat)
                                    <label class="flex items-center justify-between p-2.5 rounded-xl text-xs cursor-pointer hover:bg-slate-50 transition {{ request('categoria') == $cat->slug ? 'bg-blue-50 text-[#080187] font-bold border border-blue-200 shadow-xs' : 'text-slate-600 border border-transparent' }}">
                                        <div class="flex items-center gap-2">
                                            <input type="radio" name="categoria" value="{{ $cat->slug }}" {{ request('categoria') == $cat->slug ? 'checked' : '' }} class="text-[#080187]">
                                            <span>{{ $cat->name }}</span>
                                        </div>
                                        <span class="text-[10px] bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full font-semibold">{{ $cat->products_count }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Marca -->
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-2">Marca</label>
                            <div class="space-y-1.5">
                                @foreach($brands as $brand)
                                    <label class="flex items-center justify-between p-2.5 rounded-xl text-xs cursor-pointer hover:bg-slate-50 transition {{ request('marca') == $brand->slug ? 'bg-blue-50 text-[#080187] font-bold border border-blue-200 shadow-xs' : 'text-slate-600 border border-transparent' }}">
                                        <div class="flex items-center gap-2">
                                            <input type="radio" name="marca" value="{{ $brand->slug }}" {{ request('marca') == $brand->slug ? 'checked' : '' }} class="text-[#080187]">
                                            <span>{{ $brand->name }}</span>
                                        </div>
                                        <span class="text-[10px] bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full font-semibold">{{ $brand->products_count }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="pt-2 space-y-2">
                            <button type="submit" class="w-full py-3.5 bg-[#080187] hover:bg-blue-900 text-white font-extrabold rounded-2xl text-sm shadow-md transition">
                                Aplicar Filtros
                            </button>
                            @if(request()->hasAny(['categoria', 'marca', 'btu', 'tipo', 'q', 'orden']))
                                <a href="{{ route('products.index') }}" class="block text-center py-2 text-xs text-rose-600 hover:underline font-bold">
                                    Limpiar todos los filtros
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left Sidebar: PANEL DE FILTROS FLOTANTE EN ESCRITORIO (sticky top-28) -->
            <aside class="hidden lg:block lg:col-span-3 sticky top-28 z-30">
                <div class="bg-white/95 backdrop-blur-md rounded-3xl p-6 shadow-xl shadow-blue-950/10 border border-slate-200/90 max-h-[calc(100vh-140px)] overflow-y-auto filter-scroll space-y-6 overscroll-contain pr-3 transition-all duration-300 hover:shadow-2xl">
                    
                    <!-- Floating Header -->
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4 sticky -top-6 bg-white/95 backdrop-blur-md pt-1 z-10">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-lg bg-blue-50 text-[#080187] flex items-center justify-center shadow-xs">
                                <i data-lucide="sliders-horizontal" class="w-4 h-4 text-[#080187]"></i>
                            </div>
                            <h3 class="font-black text-[#080187] text-base">Filtros</h3>
                        </div>
                        @if(request()->hasAny(['categoria', 'marca', 'btu', 'tipo', 'q', 'orden']))
                            <a href="{{ route('products.index') }}" class="text-xs text-rose-600 hover:underline font-bold">
                                Limpiar
                            </a>
                        @endif
                    </div>

                    <!-- Search Box -->
                    <form action="{{ route('products.index') }}" method="GET" class="space-y-6">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1.5">Buscar</label>
                            <div class="relative">
                                <input type="text" name="q" value="{{ request('q') }}" placeholder="Modelo, marca, repuesto..." class="w-full pl-9 pr-3 py-2.5 text-sm border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-slate-50/70">
                                <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3 top-3.5"></i>
                            </div>
                        </div>

                        <!-- Filter by BTU Capacity -->
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-2">Capacidad (BTU)</label>
                            <div class="grid grid-cols-2 gap-1.5">
                                @foreach($btuCapacities as $btu)
                                    <label class="flex items-center gap-2 p-2 rounded-xl border text-xs font-medium cursor-pointer transition {{ request('btu') == $btu ? 'bg-blue-50 border-[#080187] text-[#080187] font-bold shadow-xs' : 'border-slate-200 hover:bg-slate-50 text-slate-700' }}">
                                        <input type="radio" name="btu" value="{{ $btu }}" onchange="this.form.submit()" {{ request('btu') == $btu ? 'checked' : '' }} class="hidden">
                                        <span>{{ number_format($btu) }} BTU</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Filter by Category -->
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-2">Categoría</label>
                            <div class="space-y-1.5">
                                @foreach($categories as $cat)
                                    <label class="flex items-center justify-between p-2 rounded-xl text-xs cursor-pointer hover:bg-slate-50 transition {{ request('categoria') == $cat->slug ? 'bg-blue-50 text-[#080187] font-bold border border-blue-200 shadow-xs' : 'text-slate-600 border border-transparent' }}">
                                        <div class="flex items-center gap-2">
                                            <input type="radio" name="categoria" value="{{ $cat->slug }}" onchange="this.form.submit()" {{ request('categoria') == $cat->slug ? 'checked' : '' }} class="text-[#080187]">
                                            <span>{{ $cat->name }}</span>
                                        </div>
                                        <span class="text-[10px] bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full font-semibold">{{ $cat->products_count }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Filter by Brand -->
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-2">Marca</label>
                            <div class="space-y-1.5">
                                @foreach($brands as $brand)
                                    <label class="flex items-center justify-between p-2 rounded-xl text-xs cursor-pointer hover:bg-slate-50 transition {{ request('marca') == $brand->slug ? 'bg-blue-50 text-[#080187] font-bold border border-blue-200 shadow-xs' : 'text-slate-600 border border-transparent' }}">
                                        <div class="flex items-center gap-2">
                                            <input type="radio" name="marca" value="{{ $brand->slug }}" onchange="this.form.submit()" {{ request('marca') == $brand->slug ? 'checked' : '' }} class="text-[#080187]">
                                            <span>{{ $brand->name }}</span>
                                        </div>
                                        <span class="text-[10px] bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full font-semibold">{{ $brand->products_count }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="sticky -bottom-6 bg-white/95 backdrop-blur-md pt-2 pb-1 z-10 border-t border-slate-100">
                            <button type="submit" class="w-full py-3 bg-[#080187] hover:bg-blue-900 text-white font-bold rounded-xl text-xs shadow-md shadow-blue-900/30 transition hover:scale-[1.02]">
                                Aplicar Filtros
                            </button>
                        </div>
                    </form>
                </div>
            </aside>

            <!-- Right Products Grid -->
            <main class="lg:col-span-9 space-y-6">
                <!-- Header with count & sort -->
                <div class="bg-white p-4 rounded-2xl border border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4 shadow-xs">
                    <span class="text-xs sm:text-sm font-medium text-slate-600">
                        Mostrando <strong class="text-[#080187]">{{ $products->total() }}</strong> productos disponibles
                    </span>

                    <div class="flex items-center gap-2">
                        <label class="text-xs font-bold text-slate-500">Ordenar:</label>
                        <form method="GET" action="{{ route('products.index') }}" class="inline">
                            @foreach(request()->except('orden') as $key => $val)
                                <input type="hidden" name="{{ $key }}" value="{{ $val }}">
                            @endforeach
                            <select name="orden" onchange="this.form.submit()" class="text-xs border border-slate-200 rounded-lg px-3 py-1.5 bg-white font-medium focus:ring-1 focus:ring-blue-500">
                                <option value="destacados" {{ request('orden') == 'destacados' ? 'selected' : '' }}>Destacados</option>
                                <option value="menor_btu" {{ request('orden') == 'menor_btu' ? 'selected' : '' }}>Menor Capacidad BTU</option>
                                <option value="mayor_btu" {{ request('orden') == 'mayor_btu' ? 'selected' : '' }}>Mayor Capacidad BTU</option>
                                <option value="menor_precio" {{ request('orden') == 'menor_precio' ? 'selected' : '' }}>Menor Precio</option>
                                <option value="mayor_precio" {{ request('orden') == 'mayor_precio' ? 'selected' : '' }}>Mayor Precio</option>
                            </select>
                        </form>
                    </div>
                </div>

                @if($products->isEmpty())
                    <div class="bg-white rounded-3xl p-12 text-center border border-slate-200 space-y-4">
                        <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto text-slate-400">
                            <i data-lucide="package-search" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-lg font-bold text-[#080187]">No se encontraron productos con los filtros seleccionados</h3>
                        <p class="text-sm text-slate-500 max-w-md mx-auto">
                            Intenta cambiar la capacidad BTU, la marca o limpiar los filtros para ver todos los equipos y repuestos.
                        </p>
                        <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-[#080187] hover:underline">
                            Ver todo el catálogo
                        </a>
                    </div>
                @else
                    <!-- Grid de Productos con Logo de Marca y Click Completo -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($products as $product)
                            <div 
                                onclick="window.location.href='{{ route('products.show', $product->slug) }}'" 
                                class="relative bg-white rounded-3xl border border-slate-200/90 hover:border-[#080187] overflow-hidden shadow-xs hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group cursor-pointer"
                            >
                                <!-- Enlace extendido para accesibilidad -->
                                <a href="{{ route('products.show', $product->slug) }}" class="absolute inset-0 z-0" aria-label="{{ $product->name }}"></a>

                                <div class="relative z-10 pointer-events-none">
                                    <!-- Image Area con Logo de Marca -->
                                    <div class="relative bg-gradient-to-b from-blue-50/60 to-slate-50/60 p-6 flex items-center justify-center overflow-hidden h-52 border-b border-slate-100">
                                        <!-- BTU Badge -->
                                        <div class="absolute top-3 left-3 z-10 flex flex-col gap-1">
                                            <span class="px-2.5 py-1 bg-[#080187] text-white text-[11px] font-bold rounded-lg shadow">
                                                {{ number_format($product->btu_capacity) }} BTU
                                            </span>
                                            @if($product->seer_rating)
                                                <span class="px-2.5 py-0.5 bg-brand-500 text-white text-[10px] font-semibold rounded-md shadow-xs">
                                                    {{ $product->seer_rating }}
                                                </span>
                                            @endif
                                        </div>

                                        <!-- Brand Logo Badge en la esquina superior derecha -->
                                        <div class="absolute top-3 right-3 z-10 px-3 py-1.5 bg-white/95 backdrop-blur-md rounded-xl shadow-xs border border-slate-200 flex items-center justify-center h-9 min-w-[54px] max-w-[95px]">
                                            @if($product->brand?->logo_url)
                                                <img src="{{ $product->brand->logo_url }}" alt="{{ $product->brand->name }}" class="max-h-5 w-auto object-contain {{ $product->brand->slug === 'airmax' ? 'scale-[1.6]' : '' }} {{ $product->brand->slug === 'gree' ? 'scale-[1.2]' : '' }}">
                                            @else
                                                <span class="text-[11px] font-black text-slate-800">{{ $product->brand?->name }}</span>
                                            @endif
                                        </div>

                                        <!-- Imagen del Producto o Logo Central -->
                                        <div class="w-full h-full flex flex-col items-center justify-center group-hover:scale-105 transition duration-300">
                                            @if($product->image_url)
                                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="max-h-36 max-w-full object-contain drop-shadow-md">
                                            @else
                                                <div class="flex flex-col items-center justify-center text-slate-400">
                                                    @if($product->brand?->logo_url)
                                                        <img src="{{ $product->brand->logo_url }}" alt="{{ $product->brand->name }}" class="max-h-16 max-w-[130px] object-contain drop-shadow-sm mb-2 {{ $product->brand->slug === 'airmax' ? 'scale-[1.5]' : '' }} {{ $product->brand->slug === 'gree' ? 'scale-[1.2]' : '' }}">
                                                    @else
                                                        <i data-lucide="wind" class="w-16 h-16 text-blue-500/40 mb-2"></i>
                                                    @endif
                                                    <span class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">{{ $product->category?->name }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Card Content -->
                                    <div class="p-5 space-y-2.5">
                                        <div class="flex items-center justify-between text-[11px] text-slate-400 font-bold uppercase">
                                            <span>{{ $product->category?->name }}</span>
                                            @if($product->seer_rating)
                                                <span class="text-brand-500 font-semibold">{{ $product->seer_rating }}</span>
                                            @endif
                                        </div>

                                        <h3 class="text-base font-extrabold text-[#080187] group-hover:text-blue-700 transition leading-snug">
                                            {{ $product->name }}
                                        </h3>

                                        <p class="text-slate-500 text-xs line-clamp-2 leading-relaxed">
                                            {{ $product->short_description }}
                                        </p>

                                        <div class="pt-2 flex flex-wrap items-center justify-between gap-2 text-[10px] text-slate-600 font-medium">
                                            <div class="flex items-center gap-1.5">
                                                <span class="bg-slate-100 px-2 py-0.5 rounded font-semibold">{{ $product->inverter_type }}</span>
                                                <span class="bg-slate-100 px-2 py-0.5 rounded font-semibold">{{ $product->voltage }}</span>
                                            </div>

                                            <!-- Disponibilidad / Stock -->
                                            @if($product->cantidad_disponible > 5)
                                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-extrabold text-[10px] border border-emerald-200/60">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                                    <span>{{ $product->cantidad_disponible }} disponibles</span>
                                                </span>
                                            @elseif($product->cantidad_disponible > 0)
                                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-amber-50 text-amber-700 font-extrabold text-[10px] border border-amber-200/60">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                                    <span>Últimas {{ $product->cantidad_disponible }} uds</span>
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 font-bold text-[10px]">
                                                    <span>Bajo pedido</span>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Card Footer: Price & WhatsApp Action -->
                                <div class="p-5 pt-0 space-y-3 relative z-20">
                                    @if($product->price)
                                        <div class="flex items-baseline justify-between border-t border-slate-100 pt-3 pointer-events-none">
                                            <span class="text-xs text-slate-400 font-medium">Precio estimado:</span>
                                            <span class="text-base font-black text-[#080187]">{{ $product->price_label ?? 'RD$ ' . number_format($product->price, 2) }}</span>
                                        </div>
                                    @endif

                                    <!-- Direct WhatsApp Button -->
                                    <a href="{{ $product->whatsapp_url }}" target="_blank" rel="noopener" onclick="event.stopPropagation()" class="w-full flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-3 rounded-xl shadow-xs transition text-xs pointer-events-auto" title="Cotizar">
                                        <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-4 h-4 object-contain brightness-0 invert">
                                        <span>Cotizar</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="pt-6">
                        {{ $products->links() }}
                    </div>
                @endif
            </main>

        </div>
    </div>
</section>
@endsection
