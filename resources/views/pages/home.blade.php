@extends('layouts.app')

@section('title', 'Mundo Airee, SRL - Venta, Instalación y Reparación de Aires Acondicionados en RD')

@section('content')

<!-- Hero Carousel Slider: Pantalla completa (h-screen) con fondo y degradados en color #0f1323, y botones/letras en #080187 -->
<section class="relative overflow-hidden bg-[#0f1323] text-white h-screen min-h-[650px] w-full" x-data="{
    activeSlide: 0,
    totalSlides: 4,
    autoplayTimer: null,
    startAutoplay() {
        this.autoplayTimer = setInterval(() => {
            this.nextSlide();
        }, 3800);
    },
    stopAutoplay() {
        if (this.autoplayTimer) clearInterval(this.autoplayTimer);
    },
    nextSlide() {
        this.activeSlide = (this.activeSlide + 1) % this.totalSlides;
    },
    prevSlide() {
        this.activeSlide = (this.activeSlide - 1 + this.totalSlides) % this.totalSlides;
    },
    goToSlide(index) {
        this.activeSlide = index;
    }
}" x-init="startAutoplay()" @mouseenter="stopAutoplay()" @mouseleave="startAutoplay()">

    <!-- Slider Container -->
    <div class="relative w-full h-full">
        
        <!-- Slide 0: VENTA (venta.jpg) - TEXTO A LA DERECHA SIN MARCAS Y CON COMPONENTES -->
        <div 
            x-show="activeSlide === 0" 
            x-transition.opacity.duration.600ms
            class="absolute inset-0 w-full h-full flex items-center"
        >
            <!-- Background Image -->
            <img src="{{ asset('images/carrusel/venta.jpg') }}" alt="Venta de Aires Acondicionados y Componentes" class="absolute inset-0 w-full h-full object-cover object-center">
            
            <!-- Dark Gradient Overlay on the RIGHT side with color #0f1323 (No alterada la sombra) -->
            <div class="absolute inset-0 bg-gradient-to-l from-[#0f1323]/95 via-[#0f1323]/80 sm:via-[#0f1323]/70 to-transparent"></div>
            
            <!-- Slide Content on the RIGHT -->
            <div class="relative z-20 max-w-7xl mx-auto px-6 sm:px-12 w-full pt-16 sm:pt-20 flex justify-end">
                <div class="max-w-xl space-y-6 text-left">
                    <h1 class="text-4xl sm:text-6xl font-black tracking-tight leading-tight text-white drop-shadow-xl">
                        VENTA DE AIRES Y <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-blue-300 to-white">COMPONENTES</span>
                    </h1>

                    <p class="text-slate-100 text-base sm:text-xl font-normal leading-relaxed drop-shadow-md">
                        Venta de equipos de aire acondicionado Split e Inverter, además de componentes, mangueras, tuberías de cobre, filtros, refrigerantes y repuestos originales con garantía certificada.
                    </p>

                    <div class="pt-4 flex flex-wrap items-center gap-4">
                        <!-- Botón Principal en Azul Corporativo #080187 -->
                        <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center gap-2.5 bg-[#080187] hover:bg-blue-900 text-white font-extrabold px-8 py-4 rounded-2xl border border-blue-400/30 shadow-xl shadow-[#080187]/50 hover:scale-105 transition duration-200 text-base">
                            <i data-lucide="grid" class="w-5 h-5"></i>
                            <span>VER CATÁLOGO Y REPUESTOS</span>
                        </a>
                        <a href="{{ \App\Helpers\WhatsAppHelper::makeLink('¡Hola Mundo Airee SRL! Me gustaría cotizar la compra de un equipo o repuestos/componentes de aire.') }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-2.5 bg-whatsapp hover:bg-whatsappDark text-white font-bold px-6 py-4 rounded-xl shadow-xl shadow-emerald-500/25 hover:scale-105 transition duration-200 text-base">
                            <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-5 h-5 object-contain brightness-0 invert">
                            <span>Cotizar</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 1: INSTALACIÓN (instalacion.jpg) -->
        <div 
            x-show="activeSlide === 1" 
            x-transition.opacity.duration.600ms
            class="absolute inset-0 w-full h-full flex items-center"
        >
            <img src="{{ asset('images/carrusel/instalacion.jpg') }}" alt="Instalación Técnica de Aires" class="absolute inset-0 w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-r from-[#0f1323]/95 via-[#0f1323]/75 to-transparent"></div>
            
            <div class="relative z-20 max-w-7xl mx-auto px-6 sm:px-12 w-full pt-16 sm:pt-20">
                <div class="max-w-2xl space-y-6 text-left">
                    <h2 class="text-4xl sm:text-6xl lg:text-7xl font-black tracking-tight leading-tight text-white drop-shadow-xl">
                        INSTALACIÓN DE AIRES <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-blue-300 to-white">ACONDICIONADOS</span>
                    </h2>

                    <p class="text-slate-100 text-base sm:text-xl font-normal leading-relaxed drop-shadow-md">
                        Montaje técnico profesional con bomba de vacío, tubería de cobre y fijación segura para residencias, oficinas y locales en Santo Domingo y todo el país.
                    </p>

                    <div class="pt-4 flex flex-wrap items-center gap-4">
                        <!-- Botón Principal en Azul Corporativo #080187 -->
                        <a href="{{ route('services.show', 'instalacion-de-equipos') }}" class="inline-flex items-center justify-center gap-2.5 bg-[#080187] hover:bg-blue-900 text-white font-extrabold px-8 py-4 rounded-2xl border border-blue-400/30 shadow-xl shadow-[#080187]/50 hover:scale-105 transition duration-200 text-base">
                            <i data-lucide="wrench" class="w-5 h-5"></i>
                            <span>VER SERVICIOS DE INSTALACIÓN</span>
                        </a>
                        <a href="{{ \App\Helpers\WhatsAppHelper::makeLink('¡Hola Mundo Airee SRL! Quisiera solicitar una cotización para la instalación técnica de aire acondicionado.') }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-2.5 bg-whatsapp hover:bg-whatsappDark text-white font-bold px-6 py-4 rounded-xl shadow-xl shadow-emerald-500/25 hover:scale-105 transition duration-200 text-base">
                            <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-5 h-5 object-contain brightness-0 invert">
                            <span>Solicitar</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2: LAVADO Y MANTENIMIENTO (mantenimiento.jpg) -->
        <div 
            x-show="activeSlide === 2" 
            x-transition.opacity.duration.600ms
            class="absolute inset-0 w-full h-full flex items-center"
        >
            <img src="{{ asset('images/carrusel/mantenimiento.jpg') }}" alt="Lavado a Presión y Mantenimiento de Aires" class="absolute inset-0 w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-r from-[#0f1323]/95 via-[#0f1323]/75 to-transparent"></div>
            
            <div class="relative z-20 max-w-7xl mx-auto px-6 sm:px-12 w-full pt-16 sm:pt-20">
                <div class="max-w-2xl space-y-6 text-left">
                    <h2 class="text-4xl sm:text-6xl lg:text-7xl font-black tracking-tight leading-tight text-white drop-shadow-xl">
                        LAVADO A PRESIÓN Y <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-cyan-300 to-white">MANTENIMIENTO</span>
                    </h2>

                    <p class="text-slate-100 text-base sm:text-xl font-normal leading-relaxed drop-shadow-md">
                        Lavado técnico a presión con bolsa protectora para eliminar polvo, hongos y bacterias sin ensuciar tus paredes ni pisos. Máximo rendimiento y aire puro para tu familia.
                    </p>

                    <div class="pt-4 flex flex-wrap items-center gap-4">
                        <!-- Botón Principal en Azul Corporativo #080187 -->
                        <a href="{{ route('services.index') }}" class="inline-flex items-center justify-center gap-2.5 bg-[#080187] hover:bg-blue-900 text-white font-extrabold px-8 py-4 rounded-2xl border border-blue-400/30 shadow-xl shadow-[#080187]/50 hover:scale-105 transition duration-200 text-base">
                            <i data-lucide="sparkles" class="w-5 h-5"></i>
                            <span>VER SERVICIOS DE MANTENIMIENTO</span>
                        </a>
                        <a href="{{ \App\Helpers\WhatsAppHelper::makeLink('¡Hola Mundo Airee SRL! Me gustaría agendar el servicio de limpieza y lavado profundo a presión.') }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-2.5 bg-whatsapp hover:bg-whatsappDark text-white font-bold px-6 py-4 rounded-xl shadow-xl shadow-emerald-500/25 hover:scale-105 transition duration-200 text-base">
                            <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-5 h-5 object-contain brightness-0 invert">
                            <span>Solicitar</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3: CONTÁCTANOS (contactanos.jpg) -->
        <div 
            x-show="activeSlide === 3" 
            x-transition.opacity.duration.600ms
            class="absolute inset-0 w-full h-full flex items-center"
        >
            <img src="{{ asset('images/carrusel/contactanos.jpg') }}" alt="Contáctanos y Cotiza con Mundo Airee" class="absolute inset-0 w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-r from-[#0f1323]/95 via-[#0f1323]/75 to-transparent"></div>
            
            <div class="relative z-20 max-w-7xl mx-auto px-6 sm:px-12 w-full pt-16 sm:pt-20">
                <div class="max-w-2xl space-y-6 text-left">
                    <h2 class="text-4xl sm:text-6xl lg:text-7xl font-black tracking-tight leading-tight text-white drop-shadow-xl">
                        ¿CANSADO DE SUDAR? <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-300 via-sky-200 to-white">¡CLIMATIZA TU ESPACIO!</span>
                    </h2>

                    <p class="text-slate-100 text-base sm:text-xl font-normal leading-relaxed drop-shadow-md">
                        Dormir fresco y descansar con confort no es un lujo, ¡es calidad de vida! Contáctanos hoy mismo y cotiza tu equipo o repuestos con la mejor asesoría técnica en Santo Domingo Este.
                    </p>

                    <div class="pt-4 flex flex-wrap items-center gap-4">
                        <!-- Botón Principal en Azul Corporativo #080187 -->
                        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2.5 bg-[#080187] hover:bg-blue-900 text-white font-extrabold px-8 py-4 rounded-2xl border border-blue-400/30 shadow-xl shadow-[#080187]/50 hover:scale-105 transition duration-200 text-base">
                            <i data-lucide="send" class="w-5 h-5"></i>
                            <span>CONTACTANOS</span>
                        </a>
                        <a href="{{ \App\Helpers\WhatsAppHelper::makeLink('¡Hola Mundo Airee SRL! Me gustaría hablar con un asesor comercial.') }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-2.5 bg-whatsapp hover:bg-whatsappDark text-white font-bold px-6 py-4 rounded-xl shadow-xl shadow-emerald-500/25 hover:scale-105 transition duration-200 text-sm sm:text-base">
                            <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-5 h-5 object-contain brightness-0 invert">
                            <span>Contactar</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Navigation Arrows en #0f1323 -->
    <button @click="prevSlide()" class="absolute left-4 sm:left-8 top-1/2 -translate-y-1/2 z-30 w-12 h-12 rounded-full bg-[#0f1323]/70 hover:bg-[#0f1323]/95 text-white border border-white/20 flex items-center justify-center transition backdrop-blur-md hover:scale-110 shadow-lg" aria-label="Anterior">
        <i data-lucide="chevron-left" class="w-6 h-6"></i>
    </button>
    <button @click="nextSlide()" class="absolute right-4 sm:right-8 top-1/2 -translate-y-1/2 z-30 w-12 h-12 rounded-full bg-[#0f1323]/70 hover:bg-[#0f1323]/95 text-white border border-white/20 flex items-center justify-center transition backdrop-blur-md hover:scale-110 shadow-lg" aria-label="Siguiente">
        <i data-lucide="chevron-right" class="w-6 h-6"></i>
    </button>

    <!-- Slide Indicators / Dots en #0f1323 -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-30 flex items-center space-x-3 bg-[#0f1323]/80 px-4 py-2 rounded-full backdrop-blur-md border border-white/20">
        <template x-for="i in totalSlides" :key="i">
            <button 
                @click="goToSlide(i - 1)" 
                :class="activeSlide === (i - 1) ? 'w-8 bg-[#080187] ring-2 ring-sky-300' : 'w-2.5 bg-white/40 hover:bg-white/70'"
                class="h-2.5 rounded-full transition-all duration-300" 
                :aria-label="'Ir a diapositiva ' + i"
            ></button>
        </template>
    </div>

</section>

<!-- Carrusel de Marcas Oficiales (Sin etiquetas) -->
<section class="py-12 bg-white border-b border-slate-100 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6 text-center">
        <h2 class="text-2xl sm:text-3xl font-black text-[#080187]">
            Equipos de Climatización de Calidad Garantizada
        </h2>
    </div>

    <!-- Carrusel Infinito de Marcas (Marquee continuo) -->
    <div class="relative w-full overflow-hidden py-4">
        <div class="absolute left-0 top-0 bottom-0 w-24 bg-gradient-to-r from-white via-white/80 to-transparent z-10 pointer-events-none"></div>
        <div class="absolute right-0 top-0 bottom-0 w-24 bg-gradient-to-l from-white via-white/80 to-transparent z-10 pointer-events-none"></div>

        <div class="animate-marquee flex items-center">
            <!-- First Set -->
            @foreach($brands as $brand)
                <a href="{{ route('products.index', ['marca' => $brand->slug]) }}" class="mx-6 sm:mx-8 shrink-0 flex items-center justify-center h-16 w-36 sm:w-44 transition-all duration-300 hover:scale-105" title="Ver catálogo de {{ $brand->name }}">
                    @if($brand->logo_url)
                        <div class="flex items-center justify-center w-full h-full">
                            <img src="{{ $brand->logo_url }}" alt="{{ $brand->name }}" class="h-10 sm:h-12 w-auto max-w-[130px] sm:max-w-[150px] object-contain {{ $brand->slug === 'airmax' ? 'scale-[1.85] sm:scale-[2.1]' : '' }} {{ $brand->slug === 'gree' ? 'scale-[1.4] sm:scale-[1.6]' : '' }}">
                        </div>
                    @else
                        <span class="text-base sm:text-lg font-black text-slate-800 tracking-tight">{{ $brand->name }}</span>
                    @endif
                </a>
            @endforeach

            <!-- Duplicate Set for Continuous Loop -->
            @foreach($brands as $brand)
                <a href="{{ route('products.index', ['marca' => $brand->slug]) }}" class="mx-6 sm:mx-8 shrink-0 flex items-center justify-center h-16 w-36 sm:w-44 transition-all duration-300 hover:scale-105" title="Ver catálogo de {{ $brand->name }}">
                    @if($brand->logo_url)
                        <div class="flex items-center justify-center w-full h-full">
                            <img src="{{ $brand->logo_url }}" alt="{{ $brand->name }}" class="h-10 sm:h-12 w-auto max-w-[130px] sm:max-w-[150px] object-contain {{ $brand->slug === 'airmax' ? 'scale-[1.85] sm:scale-[2.1]' : '' }} {{ $brand->slug === 'gree' ? 'scale-[1.4] sm:scale-[1.6]' : '' }}">
                        </div>
                    @else
                        <span class="text-base sm:text-lg font-black text-slate-800 tracking-tight">{{ $brand->name }}</span>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Services Section (Sin etiquetas) -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#080187] tracking-tight">
                Instalación, Venta y Reparación de Aires Acondicionados
            </h2>
            <p class="text-slate-600 text-base">
                Soluciones rápidas y profesionales respaldadas por técnicos certificados en Santo Domingo y todo el país.
            </p>
        </div>

        <!-- 3 Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($services as $service)
                <div class="bg-white rounded-3xl p-8 shadow-xs border border-slate-200/80 hover:shadow-xl hover:border-brand-400 hover:-translate-y-1 transition duration-300 flex flex-col justify-between group">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-2xl bg-blue-50 text-[#080187] group-hover:bg-[#080187] group-hover:text-white flex items-center justify-center transition-colors duration-300 shadow-xs">
                            <i data-lucide="{{ $service->icon ?: 'tool' }}" class="w-7 h-7"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#080187] group-hover:text-brand-500 transition">
                            {{ $service->title }}
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            {{ $service->short_description }}
                        </p>
                    </div>

                    <div class="pt-6 mt-6 border-t border-slate-100 flex items-center justify-between">
                        <a href="{{ route('services.show', $service->slug) }}" class="text-xs font-bold text-[#080187] hover:underline flex items-center gap-1">
                            Ver detalles <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </a>
                        <a href="{{ $service->whatsapp_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-50 hover:bg-emerald-500 text-emerald-600 hover:text-white rounded-xl text-xs font-bold transition" title="Solicitar servicio">
                            <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-4 h-4 object-contain">
                            <span>Solicitar</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Ver Más Servicios CTA Button -->
        <div class="mt-12 text-center">
            <a href="{{ route('services.index') }}" class="inline-flex items-center justify-center gap-2 bg-[#080187] hover:bg-blue-900 text-white font-bold px-8 py-4 rounded-2xl shadow-md transition duration-200 text-sm">
                <span>Ver Todos los Servicios</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>
</section>

<!-- SECCIÓN BANNER CALOR / CONTACTO (Colores y Botón Original) -->
<section class="py-16 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-blue-900 bg-[#080187]">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 items-center min-h-[460px]">
                
                <!-- Columna de Imagen: Pareja sofocada en sala cómoda con ventilador -->
                <div class="lg:col-span-6 h-72 sm:h-96 lg:h-full relative overflow-hidden">
                    <img src="{{ asset('images/calor-sofa.jpg') }}" alt="¿El calor no te deja descansar?" class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t lg:bg-gradient-to-r from-transparent via-transparent to-[#080187]"></div>
                </div>

                <!-- Columna de Contenido & Botón Directo "Contactar" Original -->
                <div class="lg:col-span-6 p-8 sm:p-12 lg:p-14 space-y-6 text-white z-10">
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight text-white">
                        Un ventilador solo mueve aire caliente. <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-300 via-cyan-200 to-white">¡Climatiza tu hogar hoy!</span>
                    </h2>

                    <p class="text-blue-100/90 text-sm sm:text-base leading-relaxed">
                        No pases más noches sofocantes ni tardes incómodas. En <strong>Mundo Airee, SRL</strong> te asesoramos con la capacidad en BTU perfecta para tu sala o habitación, instalación rápida garantizada y los precios más competitivos.
                    </p>

                    <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
                        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2.5 bg-brand-500 hover:bg-brand-400 text-white font-extrabold px-10 py-4 rounded-2xl shadow-xl shadow-brand-500/40 text-base sm:text-lg transition duration-200 hover:scale-105">
                            <i data-lucide="send" class="w-5 h-5"></i>
                            <span>Contactar</span>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- Featured Products Section (Con Logotipos Oficiales de Marcas) -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#080187] tracking-tight">
                Aires Acondicionados y Componentes
            </h2>
            <p class="text-slate-600 text-base">
                Selección de equipos de alta eficiencia energética, componentes y filtros con garantía certificada y cotización directa.
            </p>
        </div>

        <!-- 3 Featured Products Grid (Click Completo en Tarjeta + Logo de Marca) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($featuredProducts as $product)
                <div 
                    onclick="window.location.href='{{ route('products.show', $product->slug) }}'" 
                    class="relative bg-white rounded-3xl border border-slate-200/90 hover:border-[#080187] overflow-hidden shadow-xs hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group cursor-pointer"
                >
                    <!-- Enlace extendido para accesibilidad -->
                    <a href="{{ route('products.show', $product->slug) }}" class="absolute inset-0 z-0" aria-label="{{ $product->name }}"></a>

                    <div class="relative z-10 pointer-events-none">
                        <!-- Header / Image area -->
                        <div class="relative bg-gradient-to-b from-blue-50/60 to-slate-50/60 p-6 flex items-center justify-center overflow-hidden h-52 border-b border-slate-100">
                            <!-- Inverter / BTU Badge -->
                            <div class="absolute top-3 left-3 z-10 flex flex-col gap-1.5">
                                <span class="px-2.5 py-1 bg-[#080187] text-white text-[11px] font-bold rounded-lg shadow">
                                    {{ number_format($product->btu_capacity) }} BTU
                                </span>
                                @if($product->seer_rating)
                                    <span class="px-2.5 py-0.5 bg-brand-500 text-white text-[10px] font-semibold rounded-md shadow-xs">
                                        {{ $product->seer_rating }}
                                    </span>
                                @endif
                            </div>

                            <!-- Brand Logo Badge en la esquina superior derecha con el logo oficial -->
                            <div class="absolute top-3 right-3 z-10 px-3 py-1.5 bg-white/95 backdrop-blur-md rounded-xl shadow-xs border border-slate-200 flex items-center justify-center h-9 min-w-[54px] max-w-[95px]">
                                @if($product->brand?->logo_url)
                                    <img src="{{ $product->brand->logo_url }}" alt="{{ $product->brand->name }}" class="max-h-5 w-auto object-contain {{ $product->brand->slug === 'airmax' ? 'scale-[1.6]' : '' }} {{ $product->brand->slug === 'gree' ? 'scale-[1.2]' : '' }}">
                                @else
                                    <span class="text-[11px] font-black text-slate-800">{{ $product->brand?->name }}</span>
                                @endif
                            </div>

                            <div class="w-full h-full flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                                @if($product->image_url)
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="max-h-36 max-w-full object-contain drop-shadow-md">
                                @else
                                    <div class="flex flex-col items-center justify-center text-slate-400">
                                        @if($product->brand?->logo_url)
                                            <img src="{{ $product->brand->logo_url }}" alt="{{ $product->brand->name }}" class="max-h-16 max-w-[130px] object-contain drop-shadow-sm mb-2 {{ $product->brand->slug === 'airmax' ? 'scale-[1.5]' : '' }} {{ $product->brand->slug === 'gree' ? 'scale-[1.2]' : '' }}">
                                        @else
                                            <i data-lucide="wind" class="w-16 h-16 text-blue-500/40 mb-2"></i>
                                        @endif
                                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ $product->category?->name }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 space-y-3">
                            <span class="text-[11px] uppercase font-bold text-[#080187] tracking-wider block">
                                {{ $product->category?->name }} &bull; {{ $product->inverter_type }}
                            </span>
                            <h3 class="text-lg font-extrabold text-navy-900 group-hover:text-blue-700 transition leading-snug line-clamp-2">
                                {{ $product->name }}
                            </h3>
                            <p class="text-slate-500 text-xs line-clamp-2 leading-relaxed">
                                {{ $product->short_description }}
                            </p>

                            <!-- Key Specs & Stock -->
                            <div class="pt-2 flex flex-wrap items-center justify-between gap-2">
                                <div class="flex items-center gap-1.5 text-[11px] text-slate-600 font-medium">
                                    <span class="bg-slate-50 px-2 py-1 rounded border border-slate-100 flex items-center gap-1"><i data-lucide="cpu" class="w-3 h-3 text-blue-600"></i> {{ $product->inverter_type }}</span>
                                    <span class="bg-slate-50 px-2 py-1 rounded border border-slate-100 flex items-center gap-1"><i data-lucide="zap" class="w-3 h-3 text-blue-600"></i> {{ $product->voltage }}</span>
                                </div>

                                @if($product->cantidad_disponible > 5)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-extrabold text-[10px] border border-emerald-200/60">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        <span>{{ $product->cantidad_disponible }} en stock</span>
                                    </span>
                                @elseif($product->cantidad_disponible > 0)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-amber-50 text-amber-700 font-extrabold text-[10px] border border-amber-200/60">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        <span>Últimas {{ $product->cantidad_disponible }} uds</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-600 font-bold text-[10px]">
                                        <span>Bajo pedido</span>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer: Price & WhatsApp Action -->
                    <div class="p-6 pt-0 space-y-3 relative z-20">
                        @if($product->price)
                            <div class="flex items-baseline justify-between border-t border-slate-100 pt-3 pointer-events-none">
                                <span class="text-xs text-slate-400 font-medium">Precio estimado:</span>
                                <span class="text-lg font-black text-[#080187]">{{ $product->price_label ?? 'RD$ ' . number_format($product->price, 2) }}</span>
                            </div>
                        @endif

                        <a href="{{ $product->whatsapp_url }}" target="_blank" rel="noopener" onclick="event.stopPropagation()" class="w-full flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-4 rounded-xl shadow-md shadow-emerald-600/20 hover:shadow-emerald-600/30 transition text-sm pointer-events-auto">
                            <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-5 h-5 object-contain brightness-0 invert">
                            <span>Cotizar</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Botón Ver Catálogo Completo -->
        <div class="mt-12 text-center">
            <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center gap-2.5 bg-[#080187] hover:bg-blue-900 text-white font-bold px-8 py-4 rounded-2xl shadow-md transition duration-200 text-sm">
                <span>Ver Catálogo Completo (Aires y Componentes)</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>
</section>

<!-- Why Choose Mundo Airee SRL (Sin etiquetas) -->
<section class="py-20 bg-[#080187] text-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <div class="space-y-6">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                    Experiencia, Garantía y Compromiso en Cada Trabajo
                </h2>
                <p class="text-blue-100/90 text-base leading-relaxed">
                    Sabemos lo crucial que es mantener una temperatura confortable en el clima dominicano. Por eso ofrecemos atención técnica ágil, instalación certificada y repuestos y componentes originales.
                </p>

                <div class="space-y-4 pt-2">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-white/10 border border-white/20 text-sky-300 flex items-center justify-center shrink-0">
                            <i data-lucide="user-check" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-base">Técnicos Certificados</h4>
                            <p class="text-sm text-blue-100/80">Personal altamente capacitado en equipos residenciales, comerciales y sistemas centrales.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-white/10 border border-white/20 text-sky-300 flex items-center justify-center shrink-0">
                            <i data-lucide="shield-check" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-base">Garantía por Escrito</h4>
                            <p class="text-sm text-blue-100/80">Respaldamos cada trabajo realizado con garantía directa sobre componentes, repuestos y mano de obra.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-white/10 border border-white/20 text-sky-300 flex items-center justify-center shrink-0">
                            <i data-lucide="map-pin" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-base">Ubicación Estratégica</h4>
                            <p class="text-sm text-blue-100/80">Estamos en Santo Domingo Este con entrega de equipos, tuberías, filtros y componentes.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Visual CTA Box con Logo -->
            <div class="bg-gradient-to-br from-blue-900 to-[#080187] border border-white/20 p-8 sm:p-10 rounded-3xl space-y-6 shadow-2xl">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/Logo/logo.jpg') }}" alt="Mundo Airee SRL" class="h-14 w-auto object-contain rounded-xl bg-white p-1">
                    <div>
                        <h3 class="text-xl font-bold text-white">¿Deseas una Cotización Rápida?</h3>
                        <span class="text-xs text-sky-300">Respuesta inmediata por WhatsApp</span>
                    </div>
                </div>
                <p class="text-blue-100/90 text-sm leading-relaxed">
                    Escríbenos directamente para cotizar equipos nuevos, componentes, filtros, mangueras o servicio de instalación.
                </p>
                <div class="space-y-3">
                    <a href="{{ \App\Helpers\WhatsAppHelper::makeLink('¡Hola! Deseo cotizar compra de aire acondicionado, repuestos o servicios.') }}" target="_blank" rel="noopener" class="w-full flex items-center justify-center gap-3 bg-whatsapp hover:bg-whatsappDark text-white font-bold py-4 rounded-xl shadow-lg transition">
                        <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-5 h-5 object-contain brightness-0 invert">
                        <span>Cotizar</span>
                    </a>
                    <a href="{{ route('contact') }}" class="w-full flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white font-semibold py-3.5 rounded-xl border border-white/20 transition text-sm">
                        <i data-lucide="phone" class="w-4 h-4"></i>
                        <span>Ver Datos de Contacto</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
