@extends('layouts.app')

@section('title', 'Nosotros e Historia - Mundo Airee, SRL')

@section('content')
@php
    $aboutIntro = \App\Models\CompanySetting::get('about_intro', 'Mundo Airee, SRL es una empresa dominicana líder en venta, instalación, limpieza profunda a presión y reparación de sistemas de climatización.');
    $aboutHistory = \App\Models\CompanySetting::get('about_history', 'Iniciando operaciones en septiembre de 2021 en Santo Domingo Este, Mundo Airee, SRL se ha consolidado como un referente de confianza en venta de equipos y componentes, instalación técnica, diagnóstico, lavado a presión y mantenimiento de sistemas de aire acondicionado.');
    $mission = \App\Models\CompanySetting::get('mission', 'Proporcionar soluciones de climatización de vanguardia con los más altos estándares de calidad, eficiencia energética y respaldo técnico, garantizando ambientes confortables y saludables.');
    $vision = \App\Models\CompanySetting::get('vision', 'Ser la empresa líder y de mayor preferencia en soluciones de aire acondicionado y climatización en la República Dominicana.');
@endphp

<!-- Page Header Innovador Asimétrico en 2 Columnas con Bento Widget -->
<section class="relative bg-gradient-to-br from-[#080187] via-[#05015e] to-[#0f1323] text-white pt-28 sm:pt-36 pb-16 sm:pb-24 overflow-hidden">
    <!-- Capa de Textura de Puntos Geométrica -->
    <div class="absolute inset-0 dot-grid-pattern opacity-25 pointer-events-none"></div>

    <!-- Orbes de Luz Ambiental Animados -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-sky-400/25 rounded-full blur-3xl animate-orb-1 pointer-events-none"></div>
    <div class="absolute top-1/2 -right-20 -translate-y-1/2 w-[450px] h-[450px] bg-blue-500/20 rounded-full blur-3xl animate-orb-2 pointer-events-none"></div>
    <div class="absolute -bottom-24 left-1/3 w-80 h-80 bg-cyan-300/15 rounded-full blur-3xl animate-orb-3 pointer-events-none"></div>

    <!-- Línea decorativa de brisa -->
    <div class="absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-sky-400/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
            
            <!-- Columna Izquierda: Mensaje de Impacto y Propuesta de Valor -->
            <div class="lg:col-span-7 space-y-6 text-left">
                
                <!-- Badge Pulsante de Estado -->
                <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/15 backdrop-blur-md text-xs font-semibold text-sky-200 shadow-xs">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Compromiso &bull; Trayectoria Comprobada en RD</span>
                </div>

                <!-- Título Asimétrico con Degradado Brillante -->
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight">
                    Liderando la Climatización con <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-300 via-cyan-200 to-white drop-shadow-md">Respaldo Técnico Real</span>
                </h1>

                <!-- Párrafo Descriptivo -->
                <p class="text-blue-100/90 text-base sm:text-lg leading-relaxed font-normal max-w-2xl">
                    En <strong class="text-white font-bold">Mundo Airee, SRL</strong> combinamos experiencia técnica certificada, tecnología de ahorro energético y atención personalizada para garantizar el ambiente ideal en cada hogar y empresa del país.
                </p>

                <!-- Acciones Rápidas -->
                <div class="pt-2 flex flex-wrap items-center gap-4">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 bg-brand-500 hover:bg-brand-400 text-white font-bold px-7 py-3.5 rounded-2xl shadow-lg shadow-brand-500/30 transition hover:scale-105 text-sm">
                        <i data-lucide="send" class="w-4 h-4"></i>
                        <span>Contactar Asesor</span>
                    </a>
                    <a href="{{ route('services.index') }}" class="inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white font-bold px-6 py-3.5 rounded-2xl border border-white/20 backdrop-blur-md transition text-sm">
                        <span>Ver Nuestros Servicios</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 text-sky-300"></i>
                    </a>
                </div>
            </div>

            <!-- Columna Derecha: Glass Bento Widget de Confianza & Trayectoria -->
            <div class="lg:col-span-5">
                <div class="relative rounded-3xl p-6 sm:p-8 bg-white/10 backdrop-blur-xl border border-white/20 shadow-2xl shadow-[#04014d]/50 space-y-6 hover:border-sky-300/40 transition duration-300">
                    
                    <!-- Header del Widget con Logo y Estatus -->
                    <div class="flex items-center justify-between border-b border-white/15 pb-5">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-2xl bg-white p-1 flex items-center justify-center shadow-md shrink-0">
                                <img src="{{ asset('images/Logo/logo.jpg') }}" alt="Mundo Airee SRL" class="w-full h-full object-contain rounded-xl">
                            </div>
                            <div>
                                <h3 class="font-extrabold text-white text-base">Mundo Airee, SRL</h3>
                                <p class="text-xs text-sky-300 font-medium">Santo Domingo Este, RD</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 text-[11px] font-bold">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span>
                            Activo Desde 2021
                        </span>
                    </div>

                    <!-- Métricas Clave en Mini-Grid Bento -->
                    <div class="grid grid-cols-2 gap-3">
                        <div class="p-4 rounded-2xl bg-white/5 border border-white/10 space-y-1">
                            <span class="text-2xl sm:text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-300 to-white">5+ Años</span>
                            <p class="text-xs text-blue-200 font-medium">Trayectoria comprobada en climatización</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-white/5 border border-white/10 space-y-1">
                            <span class="text-2xl sm:text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white">100%</span>
                            <p class="text-xs text-blue-200 font-medium">Técnicos certificados y capacitados</p>
                        </div>
                    </div>

                    <!-- Insignia de Garantía Escrita -->
                    <div class="p-3.5 rounded-2xl bg-gradient-to-r from-blue-900/60 to-[#080187]/60 border border-sky-400/30 flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-sky-400/20 text-sky-300 flex items-center justify-center shrink-0">
                            <i data-lucide="shield-check" class="w-5 h-5"></i>
                        </div>
                        <div class="text-left">
                            <h4 class="text-xs font-bold text-white uppercase tracking-wider">Garantía por Escrito</h4>
                            <p class="text-[11px] text-blue-200">En equipos, repuestos y servicio técnico</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- Story Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Columna de Historia -->
            <div class="lg:col-span-6 space-y-6">
                <h2 class="text-3xl sm:text-4xl font-black text-[#080187] tracking-tight leading-tight">
                    Comprometidos con el Confort y la Eficiencia Energética
                </h2>
                <p class="text-slate-700 text-lg font-medium leading-relaxed">
                    {{ $aboutIntro }}
                </p>
                <p class="text-slate-600 text-base leading-relaxed">
                    {{ $aboutHistory }}
                </p>

                <!-- Tarjetas de Estadísticas integradas con Trayectoria desde 2021 -->
                <div class="pt-2 grid grid-cols-2 gap-4">
                    <div class="p-6 rounded-2xl bg-slate-50 border-l-4 border-l-[#080187] border-y border-r border-slate-200/80 shadow-xs">
                        <span class="block text-3xl font-black text-[#080187]">Desde 2021</span>
                        <span class="text-xs text-slate-500 font-semibold uppercase tracking-wider mt-1 block">Trayectoria y Confianza</span>
                    </div>
                    <div class="p-6 rounded-2xl bg-slate-50 border-l-4 border-l-[#080187] border-y border-r border-slate-200/80 shadow-xs">
                        <span class="block text-3xl font-black text-[#080187]">100% Garantía</span>
                        <span class="text-xs text-slate-500 font-semibold uppercase tracking-wider mt-1 block">Equipos y Servicios</span>
                    </div>
                </div>
            </div>

            <!-- Columna Visual en #080187 con Logo -->
            <div class="lg:col-span-6">
                <div class="bg-gradient-to-br from-[#080187] to-blue-950 text-white rounded-3xl p-8 sm:p-12 shadow-2xl relative overflow-hidden space-y-8 border border-blue-900">
                    <div class="absolute -right-10 -top-10 w-48 h-48 bg-sky-400/20 rounded-full blur-2xl pointer-events-none"></div>
                    
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-white p-1.5 flex items-center justify-center shrink-0 shadow-lg">
                            <img src="{{ asset('images/Logo/logo.jpg') }}" alt="Mundo Airee SRL" class="w-13 h-13 object-contain rounded-xl">
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white tracking-tight">Mundo Airee, SRL</h3>
                            <p class="text-xs text-sky-300 font-semibold uppercase tracking-wider">Climatización de Vanguardia</p>
                        </div>
                    </div>

                    <p class="text-blue-100 text-sm sm:text-base leading-relaxed">
                        No solo vendemos equipos de aire acondicionado y componentes; te acompañamos en todo el ciclo: cálculo de carga térmica en BTU, instalación certificada, limpieza profunda con hidrolavadora, mantenimiento preventivo y servicio postventa inmediato.
                    </p>

                    <div class="pt-6 border-t border-blue-800/80 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                        <div class="space-y-0.5">
                            <span class="text-xs text-blue-200 block font-medium">¿Tienes una consulta directa?</span>
                            <span class="text-sm font-bold text-sky-300">Habla con un asesor técnico</span>
                        </div>
                        <a href="{{ \App\Helpers\WhatsAppHelper::makeLink('¡Hola! Deseo información sobre la empresa y servicios de Mundo Airee SRL.') }}" target="_blank" rel="noopener" class="px-5 py-3 bg-whatsapp hover:bg-whatsappDark text-white text-xs font-bold rounded-xl transition flex items-center gap-2 shadow-md hover:scale-105">
                            <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-4 h-4 object-contain brightness-0 invert">
                            <span>(829) 276-9291</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Mission and Vision -->
<section class="py-20 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-14 space-y-2">
            <h2 class="text-3xl sm:text-4xl font-black text-[#080187] tracking-tight">
                Misión y Visión
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Mission Card -->
            <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-xs border border-slate-200/90 hover:border-[#080187] hover:shadow-xl transition-all duration-300 space-y-4 group">
                <div class="w-14 h-14 rounded-2xl bg-[#080187] text-white flex items-center justify-center shadow-md group-hover:scale-105 transition-transform">
                    <i data-lucide="target" class="w-7 h-7"></i>
                </div>
                <h3 class="text-2xl font-black text-[#080187]">Nuestra Misión</h3>
                <p class="text-slate-600 text-base leading-relaxed">
                    {{ $mission }}
                </p>
            </div>

            <!-- Vision Card -->
            <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-xs border border-slate-200/90 hover:border-[#080187] hover:shadow-xl transition-all duration-300 space-y-4 group">
                <div class="w-14 h-14 rounded-2xl bg-[#080187] text-white flex items-center justify-center shadow-md group-hover:scale-105 transition-transform">
                    <i data-lucide="eye" class="w-7 h-7"></i>
                </div>
                <h3 class="text-2xl font-black text-[#080187]">Nuestra Visión</h3>
                <p class="text-slate-600 text-base leading-relaxed">
                    {{ $vision }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
@if(!empty($values))
<section class="py-20 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-2">
            <h2 class="text-3xl sm:text-4xl font-black text-[#080187] tracking-tight">
                Nuestros Valores
            </h2>
            <p class="text-slate-600 text-base">
                Los principios éticos y técnicos que definen la excelencia y el compromiso en Mundo Airee, SRL.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($values as $val)
                @php
                    $iconName = $val['icon'] ?? 'check-circle-2';
                    if (str_contains(strtolower($val['title']), 'puntual') || str_contains(strtolower($val['title']), 'compromiso')) {
                        $iconName = 'clock';
                    } elseif (str_contains(strtolower($val['title']), 'calidad')) {
                        $iconName = 'shield-check';
                    } elseif (str_contains(strtolower($val['title']), 'transparencia') || str_contains(strtolower($val['title']), 'honestidad')) {
                        $iconName = 'heart-handshake';
                    } elseif (str_contains(strtolower($val['title']), 'eficiencia') || str_contains(strtolower($val['title']), 'energía')) {
                        $iconName = 'zap';
                    }
                @endphp
                <div class="p-8 rounded-3xl bg-white border border-slate-200/90 hover:border-[#080187] hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 space-y-4 group flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-2xl bg-blue-50 text-[#080187] group-hover:bg-[#080187] group-hover:text-white flex items-center justify-center transition-all duration-300 shadow-xs">
                            <i data-lucide="{{ $iconName }}" class="w-7 h-7"></i>
                        </div>
                        <h4 class="text-xl font-bold text-[#080187] group-hover:text-blue-700 transition leading-snug">{{ $val['title'] }}</h4>
                        <p class="text-slate-600 text-sm leading-relaxed">{{ $val['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Official Brands Grid -->
<section class="py-20 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-10">
        <div>
            <h3 class="text-2xl sm:text-4xl font-black text-[#080187]">Marcas Certificadas y Respaldadas</h3>
            <p class="text-slate-500 text-sm max-w-xl mx-auto mt-2">
                Distribuimos e instalamos las principales marcas del mercado con garantía de fábrica y repuestos originales.
            </p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6 items-center justify-center">
            @foreach($brands as $brand)
                <a href="{{ route('products.index', ['marca' => $brand->slug]) }}" class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-xs hover:shadow-xl hover:border-[#080187] hover:-translate-y-1.5 transition-all duration-300 flex items-center justify-center h-28 w-full group overflow-hidden" title="Ver catálogo de {{ $brand->name }}">
                    @if($brand->logo_url)
                        <div class="flex items-center justify-center w-full h-full">
                            <img src="{{ $brand->logo_url }}" alt="{{ $brand->name }}" class="h-12 sm:h-14 w-auto max-w-[130px] sm:max-w-[150px] object-contain transition-transform duration-300 group-hover:scale-105 {{ $brand->slug === 'airmax' ? 'scale-[1.85] sm:scale-[2.1]' : '' }} {{ $brand->slug === 'gree' ? 'scale-[1.35] sm:scale-[1.5]' : '' }}">
                        </div>
                    @else
                        <span class="text-base font-black text-slate-800 tracking-tight group-hover:text-[#080187] transition">{{ $brand->name }}</span>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Bottom CTA Banner en #080187 -->
<section class="py-16 bg-[#080187] text-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-6">
        <h3 class="text-2xl sm:text-4xl font-black text-white">¿Listo para Climatizar tu Espacio con Expertos?</h3>
        <p class="text-blue-100 max-w-2xl mx-auto text-base">
            Contáctanos hoy mismo para cotizar equipos nuevos, repuestos originales o agendar instalación y mantenimiento técnico.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-brand-500 hover:bg-brand-400 text-white font-extrabold px-8 py-4 rounded-2xl shadow-xl shadow-brand-500/30 hover:scale-105 transition">
                <i data-lucide="send" class="w-5 h-5"></i>
                <span>Ir a Contacto</span>
            </a>
            <a href="{{ \App\Helpers\WhatsAppHelper::makeLink('¡Hola! Me gustaría cotizar con Mundo Airee, SRL.') }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 bg-whatsapp hover:bg-whatsappDark text-white font-bold px-8 py-4 rounded-2xl shadow-xl shadow-emerald-500/25 hover:scale-105 transition">
                <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-5 h-5 object-contain brightness-0 invert">
                <span>Escribir por WhatsApp</span>
            </a>
        </div>
    </div>
</section>
@endsection
