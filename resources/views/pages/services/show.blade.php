@extends('layouts.app')

@section('title', $service->title . ' - Mundo Airee, SRL')

@section('content')
<!-- Page Header Dinámico y Animado en Azul Corporativo #080187 -->
<section class="relative bg-gradient-to-b from-[#080187] via-[#060166] to-[#04014d] text-white pt-28 sm:pt-36 pb-16 sm:pb-24 overflow-hidden">
    <!-- Capa de Textura de Puntos Geométrica -->
    <div class="absolute inset-0 dot-grid-pattern opacity-30 pointer-events-none"></div>

    <!-- Orbes de Luz Ambiental Animados -->
    <div class="absolute -top-20 right-10 w-96 h-96 bg-sky-400/20 rounded-full blur-3xl animate-orb-1 pointer-events-none"></div>
    <div class="absolute top-1/2 -left-20 -translate-y-1/2 w-[400px] h-[400px] bg-blue-500/25 rounded-full blur-3xl animate-orb-2 pointer-events-none"></div>

    <!-- Líneas de Brisa Dinámica -->
    <div class="absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-sky-400/40 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl space-y-4">
            <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-sky-300 hover:text-white glass-pill px-3.5 py-1.5 rounded-xl transition">
                <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Volver a Todos los Servicios
            </a>
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight">
                {{ $service->title }}
            </h1>
            <p class="text-blue-100/90 text-base sm:text-lg leading-relaxed font-normal">
                {{ $service->short_description }}
            </p>
        </div>
    </div>
</section>

<!-- Service Details Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Main Content Area -->
            <div class="lg:col-span-8 space-y-8">
                <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed text-base">
                    <h3 class="text-2xl font-bold text-[#080187] mb-4">Descripción y Alcance del Servicio</h3>
                    <p class="text-lg text-slate-600 font-medium leading-relaxed mb-6">
                        {{ $service->short_description }}
                    </p>
                    
                    @if($service->content)
                        <div class="p-6 rounded-2xl bg-blue-50/50 border border-blue-100 mb-6">
                            <p class="text-slate-700 leading-relaxed">
                                {{ $service->content }}
                            </p>
                        </div>
                    @endif

                    <h4 class="text-xl font-bold text-[#080187] mt-8 mb-4">¿Por qué confiar en Mundo Airee, SRL?</h4>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5"></i>
                            <span>Técnicos certificados con amplia experiencia en República Dominicana.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5"></i>
                            <span>Herramientas especializadas (bombas de vacío, manómetros digitales, detectores de fugas).</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5"></i>
                            <span>Garantía respaldada en materiales, repuestos originales y mano de obra.</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Sticky Sidebar CTA -->
            <div class="lg:col-span-4 space-y-6">
                <div class="sticky top-28 bg-[#080187] text-white rounded-3xl p-6 sm:p-8 shadow-xl border border-blue-900 space-y-6">
                    <div class="space-y-2">
                        <h3 class="text-xl font-extrabold text-white">Solicita este servicio hoy</h3>
                        <p class="text-xs text-blue-100/80">
                            Haz clic para abrir una conversación directa por WhatsApp con el equipo de Mundo Airee, SRL.
                        </p>
                    </div>

                    <a href="{{ $service->whatsapp_url }}" target="_blank" rel="noopener" class="w-full flex items-center justify-center gap-2 bg-whatsapp hover:bg-whatsappDark text-white font-bold py-4 rounded-xl shadow-lg transition">
                        <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-5 h-5 object-contain brightness-0 invert">
                        <span>Solicitar</span>
                    </a>

                    <div class="pt-4 border-t border-blue-800/80 space-y-3 text-xs text-blue-100">
                        <div class="flex items-center gap-2">
                            <i data-lucide="phone" class="w-4 h-4 text-sky-300"></i>
                            <span>Llamada: {{ \App\Models\CompanySetting::get('phone_display', '(829) 276-9291') }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="map-pin" class="w-4 h-4 text-sky-300"></i>
                            <span>Santo Domingo y Todo el País</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
