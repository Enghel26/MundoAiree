@extends('layouts.app')

@section('title', 'Servicios de Climatización e Instalación - Mundo Airee, SRL')

@section('content')
<!-- Page Header Innovador Asimétrico en 2 Columnas con Bento Grid de Servicios -->
<section class="relative bg-gradient-to-br from-[#080187] via-[#05015e] to-[#0f1323] text-white pt-28 sm:pt-36 pb-16 sm:pb-24 overflow-hidden">
    <!-- Capa de Textura de Puntos Geométrica -->
    <div class="absolute inset-0 dot-grid-pattern opacity-25 pointer-events-none"></div>

    <!-- Orbes de Luz Ambiental Animados -->
    <div class="absolute -top-20 right-10 w-96 h-96 bg-cyan-400/20 rounded-full blur-3xl animate-orb-1 pointer-events-none"></div>
    <div class="absolute top-1/2 -left-20 -translate-y-1/2 w-[450px] h-[450px] bg-blue-500/25 rounded-full blur-3xl animate-orb-2 pointer-events-none"></div>
    <div class="absolute -bottom-20 right-1/4 w-80 h-80 bg-sky-300/15 rounded-full blur-3xl animate-orb-3 pointer-events-none"></div>

    <!-- Línea decorativa de brisa -->
    <div class="absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-sky-400/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
            
            <!-- Columna Izquierda: Mensaje Central & Propuesta -->
            <div class="lg:col-span-6 space-y-6 text-left">
                <!-- Badge Pulsante de Estado -->
                <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/15 backdrop-blur-md text-xs font-semibold text-sky-200 shadow-xs">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Ingeniería &bull; Residencial &bull; Comercial &bull; Central</span>
                </div>

                <!-- Título Asimétrico con Degradado Brillante -->
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight">
                    Servicios de Climatización con <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-300 via-cyan-200 to-white drop-shadow-md">Garantía Escrita</span>
                </h1>

                <!-- Párrafo Descriptivo -->
                <p class="text-blue-100/90 text-base sm:text-lg leading-relaxed font-normal max-w-xl">
                    Desde el montaje con bomba de vacío hasta el lavado a presión sin ensuciar tus paredes. Cuidamos tu inversión para lograr el máximo frío con el menor consumo de luz.
                </p>

                <!-- Acciones Rápidas -->
                <div class="pt-2 flex flex-wrap items-center gap-4">
                    <a href="{{ \App\Helpers\WhatsAppHelper::makeLink('¡Hola Mundo Airee SRL! Deseo cotizar un servicio técnico de climatización.') }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-2.5 bg-whatsapp hover:bg-whatsappDark text-white font-bold px-7 py-3.5 rounded-2xl shadow-lg shadow-emerald-500/25 transition hover:scale-105 text-sm">
                        <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-4 h-4 object-contain brightness-0 invert">
                        <span>Solicitar</span>
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white font-bold px-6 py-3.5 rounded-2xl border border-white/20 backdrop-blur-md transition text-sm">
                        <span>Formulario de Contacto</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 text-sky-300"></i>
                    </a>
                </div>
            </div>

            <!-- Columna Derecha: Bento Grid Interactivo de Especialidades Técnicas -->
            <div class="lg:col-span-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                    
                    <!-- Tile 1: Instalación Técnica -->
                    <div class="p-5 rounded-3xl bg-white/10 backdrop-blur-xl border border-white/15 hover:border-sky-300/50 hover:bg-white/15 transition-all duration-300 group shadow-xl">
                        <div class="w-10 h-10 rounded-2xl bg-blue-500/30 text-sky-300 flex items-center justify-center mb-3 group-hover:scale-110 transition">
                            <i data-lucide="wrench" class="w-5 h-5"></i>
                        </div>
                        <h3 class="font-extrabold text-white text-base mb-1">Instalación Certificada</h3>
                        <p class="text-xs text-blue-200 leading-relaxed">Vacío con manómetro digital, tubería de cobre y fijación antivibración.</p>
                    </div>

                    <!-- Tile 2: Lavado a Presión -->
                    <div class="p-5 rounded-3xl bg-white/10 backdrop-blur-xl border border-white/15 hover:border-sky-300/50 hover:bg-white/15 transition-all duration-300 group shadow-xl">
                        <div class="w-10 h-10 rounded-2xl bg-cyan-500/30 text-cyan-300 flex items-center justify-center mb-3 group-hover:scale-110 transition">
                            <i data-lucide="sparkles" class="w-5 h-5"></i>
                        </div>
                        <h3 class="font-extrabold text-white text-base mb-1">Lavado a Presión</h3>
                        <p class="text-xs text-blue-200 leading-relaxed">Limpieza profunda con bolsa protectora que cuida tus paredes y pisos.</p>
                    </div>

                    <!-- Tile 3: Mantenimiento Preventivo -->
                    <div class="p-5 rounded-3xl bg-white/10 backdrop-blur-xl border border-white/15 hover:border-sky-300/50 hover:bg-white/15 transition-all duration-300 group shadow-xl">
                        <div class="w-10 h-10 rounded-2xl bg-emerald-500/30 text-emerald-300 flex items-center justify-center mb-3 group-hover:scale-110 transition">
                            <i data-lucide="shield-check" class="w-5 h-5"></i>
                        </div>
                        <h3 class="font-extrabold text-white text-base mb-1">Mantenimiento</h3>
                        <p class="text-xs text-blue-200 leading-relaxed">Optimiza el rendimiento y reduce el consumo eléctrico hasta un 40%.</p>
                    </div>

                    <!-- Tile 4: Diagnóstico & Reparación -->
                    <div class="p-5 rounded-3xl bg-white/10 backdrop-blur-xl border border-white/15 hover:border-sky-300/50 hover:bg-white/15 transition-all duration-300 group shadow-xl">
                        <div class="w-10 h-10 rounded-2xl bg-indigo-500/30 text-indigo-300 flex items-center justify-center mb-3 group-hover:scale-110 transition">
                            <i data-lucide="cpu" class="w-5 h-5"></i>
                        </div>
                        <h3 class="font-extrabold text-white text-base mb-1">Reparación Rápida</h3>
                        <p class="text-xs text-blue-200 leading-relaxed">Diagnóstico de tarjetas Inverter, compresores y repuestos originales.</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-12">
            @foreach($services as $index => $service)
                <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-sm border border-slate-200/80 hover:shadow-xl transition-all duration-300">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                        
                        <!-- Icon & Content -->
                        <div class="lg:col-span-8 space-y-4">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 rounded-2xl bg-blue-50 text-[#080187] flex items-center justify-center shadow-xs">
                                    <i data-lucide="{{ $service->icon ?: 'tool' }}" class="w-7 h-7"></i>
                                </div>
                                <div>
                                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#080187]">{{ $service->title }}</h2>
                                </div>
                            </div>

                            <p class="text-slate-600 text-base leading-relaxed">
                                {{ $service->short_description }}
                            </p>

                            @if($service->content)
                                <p class="text-slate-500 text-sm leading-relaxed border-t border-slate-100 pt-3">
                                    {{ $service->content }}
                                </p>
                            @endif
                        </div>

                        <!-- CTA Box with customized WhatsApp link -->
                        <div class="lg:col-span-4 bg-slate-50 rounded-2xl p-6 border border-slate-100 space-y-4 flex flex-col justify-center">
                            <div class="space-y-1 text-center lg:text-left">
                                <h4 class="font-bold text-[#080187] text-base">¿Deseas programar este servicio?</h4>
                            </div>

                            <a href="{{ $service->whatsapp_url }}" target="_blank" rel="noopener" class="w-full flex items-center justify-center gap-2.5 bg-whatsapp hover:bg-whatsappDark text-white font-bold py-3.5 px-4 rounded-xl shadow-md transition duration-200 text-sm">
                                <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-5 h-5 object-contain brightness-0 invert">
                                <span>Solicitar</span>
                            </a>

                            <a href="{{ route('services.show', $service->slug) }}" class="w-full text-center text-xs font-bold text-[#080187] hover:underline transition">
                                Ver ficha completa del servicio &rarr;
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Bottom Help Banner -->
<section class="py-16 bg-[#080187] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <h3 class="text-2xl sm:text-3xl font-extrabold">¿Tienes una Emergencia o Falla Técnica?</h3>
        <p class="text-blue-100 max-w-xl mx-auto text-sm sm:text-base">
            Contamos con personal técnico calificado de Mundo Airee, SRL para diagnóstico rápido en Santo Domingo y todo el país.
        </p>
        <a href="tel:{{ preg_replace('/[^0-9]/', '', \App\Models\CompanySetting::get('phone_display', '(829) 276-9291')) }}" class="inline-flex items-center gap-2 bg-brand-500 hover:bg-brand-400 text-white font-bold px-8 py-4 rounded-xl shadow-lg transition">
            <i data-lucide="phone-call" class="w-5 h-5"></i>
            <span>Llamar al {{ \App\Models\CompanySetting::get('phone_display', '(829) 276-9291') }}</span>
        </a>
    </div>
</section>
@endsection
