@extends('layouts.app')

@section('title', 'Contacto y Ubicación - Mundo Airee, SRL')

@section('content')
@php
    $phone = \App\Models\CompanySetting::get('phone_display', '(829) 276-9291');
    $address = \App\Models\CompanySetting::get('address', 'C/Ingeniero Pedro Bonilla Esq, C. José Francisco Peña Gómez Local 2, Santo Domingo Este 11802');
    $schedule = \App\Models\CompanySetting::get('schedule', 'Lunes a Sábado: 8:00 AM - 6:00 PM');
    $googleMapsUrl = \App\Models\CompanySetting::get('google_maps_url', 'https://www.google.com/maps/search/?api=1&query=C%2FIngeniero+Pedro+Bonilla+Esq%2C+C.+Jos%C3%A9+Francisco+Pe%C3%B1a+G%C3%B3mez+Local+2%2C+Santo+Domingo+Este+11802');
    $mapIframe = \App\Models\CompanySetting::get('google_maps_iframe', 'https://www.google.com/maps?q=C%2FIngeniero+Pedro+Bonilla+Esq%2C+C.+Jos%C3%A9+Francisco+Pe%C3%B1a+G%C3%B3mez+Local+2%2C+Santo+Domingo+Este+11802&output=embed');
    $instagram = \App\Models\CompanySetting::get('instagram_url', 'https://www.instagram.com/mundo_airee/');
    $whatsappLink = \App\Helpers\WhatsAppHelper::makeLink('¡Hola Mundo Airee SRL! Me gustaría comunicarme con un asesor comercial.');
@endphp

<!-- Page Header Innovador Asimétrico en 2 Columnas con Widget de Estado en Vivo -->
<section class="relative bg-gradient-to-br from-[#080187] via-[#05015e] to-[#0f1323] text-white pt-28 sm:pt-36 pb-16 sm:pb-24 overflow-hidden">
    <!-- Capa de Textura de Puntos Geométrica -->
    <div class="absolute inset-0 dot-grid-pattern opacity-25 pointer-events-none"></div>

    <!-- Orbes de Luz Ambiental Animados -->
    <div class="absolute -top-24 right-1/4 w-96 h-96 bg-cyan-400/20 rounded-full blur-3xl animate-orb-1 pointer-events-none"></div>
    <div class="absolute top-1/2 -left-20 -translate-y-1/2 w-[400px] h-[400px] bg-blue-500/25 rounded-full blur-3xl animate-orb-2 pointer-events-none"></div>
    <div class="absolute -bottom-24 right-10 w-80 h-80 bg-sky-300/15 rounded-full blur-3xl animate-orb-3 pointer-events-none"></div>

    <!-- Línea decorativa de brisa -->
    <div class="absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-sky-400/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
            
            <!-- Columna Izquierda: Mensaje y Canales de Contacto Directo -->
            <div class="lg:col-span-7 space-y-6 text-left">
                <!-- Badge Pulsante de Estado -->
                <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/15 backdrop-blur-md text-xs font-semibold text-sky-200 shadow-xs">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Atención Inmediata &bull; Santo Domingo Este y Todo el País</span>
                </div>

                <!-- Título Asimétrico con Degradado Brillante -->
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight">
                    Hablemos de tu Proyecto de <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-300 via-cyan-200 to-white drop-shadow-md">Climatización</span>
                </h1>

                <!-- Párrafo Descriptivo -->
                <p class="text-blue-100/90 text-base sm:text-lg leading-relaxed font-normal max-w-2xl">
                    Cotiza equipos nuevos, solicita lavado a presión, mantenimiento o reparación. Te respondemos de inmediato con la asesoría técnica experta que necesitas.
                </p>

                <!-- Acciones Rápidas -->
                <div class="pt-2 flex flex-wrap items-center gap-4">
                    <a href="{{ $whatsappLink }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-2.5 bg-whatsapp hover:bg-whatsappDark text-white font-bold px-7 py-3.5 rounded-2xl shadow-lg shadow-emerald-500/25 transition hover:scale-105 text-sm">
                        <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-4 h-4 object-contain brightness-0 invert">
                        <span>Contactar</span>
                    </a>
                    <a href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}" class="inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white font-bold px-6 py-3.5 rounded-2xl border border-white/20 backdrop-blur-md transition text-sm">
                        <i data-lucide="phone-call" class="w-4 h-4 text-sky-300"></i>
                        <span>Llamar: {{ $phone }}</span>
                    </a>
                </div>
            </div>

            <!-- Columna Derecha: Widget de Estado de Atención en Vivo & Ubicación -->
            <div class="lg:col-span-5">
                <div class="relative rounded-3xl p-6 sm:p-7 bg-white/10 backdrop-blur-xl border border-white/20 shadow-2xl shadow-[#04014d]/50 space-y-5 hover:border-sky-300/40 transition duration-300">
                    
                    <!-- Header del Widget con Estatus de Horario -->
                    <div class="flex items-center justify-between border-b border-white/15 pb-4">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-ping"></span>
                            <span class="text-xs font-bold text-white uppercase tracking-wider">Atención al Cliente</span>
                        </div>
                        <span class="px-2.5 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 text-[11px] font-black border border-emerald-500/30">
                            En Línea
                        </span>
                    </div>

                    <!-- Datos Rápidos de Ubicación & Horario -->
                    <div class="space-y-3">
                        <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10 flex items-start gap-3">
                            <div class="w-8 h-8 rounded-xl bg-blue-500/30 text-sky-300 flex items-center justify-center shrink-0 mt-0.5">
                                <i data-lucide="clock" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <span class="text-[11px] font-bold text-sky-300 uppercase block">Horario Comercial:</span>
                                <p class="text-xs text-white font-medium">{{ $schedule }}</p>
                            </div>
                        </div>

                        <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10 flex items-start gap-3">
                            <div class="w-8 h-8 rounded-xl bg-blue-500/30 text-sky-300 flex items-center justify-center shrink-0 mt-0.5">
                                <i data-lucide="map-pin" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <span class="text-[11px] font-bold text-sky-300 uppercase block">Ubicación Física:</span>
                                <p class="text-xs text-white font-medium line-clamp-2">{{ $address }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Botón Satelital Google Maps -->
                    <a href="{{ $googleMapsUrl }}" target="_blank" rel="noopener" class="w-full flex items-center justify-center gap-2 bg-[#080187] hover:bg-blue-900 text-white font-bold py-3 rounded-2xl shadow-md border border-blue-400/30 transition text-xs">
                        <i data-lucide="navigation" class="w-4 h-4 text-sky-300"></i>
                        <span>Ver Localización en Google Maps</span>
                    </a>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- Contact Form & Info Grid -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Contact Information Cards con Colores Originales Uniformes -->
            <div class="lg:col-span-5 space-y-6">
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-200 space-y-6">
                    <h3 class="text-2xl font-extrabold text-[#080187]">Información Directa</h3>
                    
                    <div class="space-y-4 text-sm">
                        <!-- Teléfono -->
                        <div class="flex items-start gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#080187] flex items-center justify-center shrink-0">
                                <i data-lucide="phone-call" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <span class="text-xs font-bold text-slate-400 uppercase">Teléfono Principal</span>
                                <a href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}" class="block font-extrabold text-[#080187] hover:underline text-base">
                                    {{ $phone }}
                                </a>
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="flex items-start gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#080187] flex items-center justify-center shrink-0">
                                <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-5 h-5 object-contain">
                            </div>
                            <div>
                                <span class="text-xs font-bold text-slate-400 uppercase">WhatsApp Ventas y Cotización</span>
                                <a href="{{ $whatsappLink }}" target="_blank" rel="noopener" class="block font-extrabold text-[#080187] hover:underline text-base">
                                    {{ $phone }} &bull; Escribir ahora
                                </a>
                            </div>
                        </div>

                        <!-- Ubicación / Dirección (Al pulsar abre Google Maps) -->
                        <a href="{{ $googleMapsUrl }}" target="_blank" rel="noopener" class="flex items-start gap-4 p-4 rounded-2xl bg-slate-50 hover:bg-blue-50/50 border border-slate-100 hover:border-blue-200 transition group cursor-pointer" title="Abrir en Google Maps">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#080187] flex items-center justify-center shrink-0">
                                <i data-lucide="map-pin" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <span class="text-xs font-bold text-slate-400 uppercase">Ubicación</span>
                                <p class="font-bold text-slate-800 group-hover:text-[#080187] text-sm mt-0.5 leading-snug">
                                    {{ $address }}
                                </p>
                            </div>
                        </a>

                        <!-- Horario -->
                        <div class="flex items-start gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#080187] flex items-center justify-center shrink-0">
                                <i data-lucide="clock" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <span class="text-xs font-bold text-slate-400 uppercase">Horario de Atención</span>
                                <p class="font-bold text-slate-800 text-sm mt-0.5">
                                    {{ $schedule }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Google Maps Link Button -->
                <a href="{{ $googleMapsUrl }}" target="_blank" rel="noopener" class="w-full flex items-center justify-center gap-2 bg-[#080187] hover:bg-blue-900 text-white font-bold py-4 rounded-2xl shadow-md transition text-sm">
                    <i data-lucide="navigation" class="w-4 h-4"></i>
                    <span>Abrir en Google Maps</span>
                </a>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-7">
                <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-sm border border-slate-200 space-y-6">
                    <div>
                        <h3 class="text-2xl font-black text-[#080187]">Envíanos un Mensaje</h3>
                        <p class="text-slate-500 text-sm mt-1">Completa el formulario para una respuesta rápida.</p>
                    </div>

                    @if(session('success'))
                        <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center gap-3">
                            <i data-lucide="check-circle" class="w-5 h-5 text-emerald-600 shrink-0"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Nombre Completo *</label>
                                <input type="text" name="name" required value="{{ old('name') }}" placeholder="Tu nombre" class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-slate-50/50">
                                @error('name') <span class="text-xs text-rose-600">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Teléfono / WhatsApp *</label>
                                <input type="tel" name="phone" required value="{{ old('phone') }}" placeholder="(809) 000-0000" class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-slate-50/50">
                                @error('phone') <span class="text-xs text-rose-600">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Servicio de Interés</label>
                            <select name="service_interest" class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-slate-50/50">
                                <option value="Venta de Aires">Venta de Aires Acondicionados</option>
                                <option value="Componentes y Repuestos">Componentes y Repuestos (Filtros, Tuberías, Mangueras)</option>
                                <option value="Instalación">Instalación Técnica</option>
                                <option value="Limpieza Profunda">Limpieza y Lavado Profundo a Presión</option>
                                <option value="Reparación">Reparación / Diagnóstico</option>
                                <option value="Otro">Otro Asunto</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Mensaje o Detalle *</label>
                            <textarea name="message" rows="4" required placeholder="Describe qué equipo necesitas o qué tipo de servicio requieres..." class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-slate-50/50">{{ old('message') }}</textarea>
                            @error('message') <span class="text-xs text-rose-600">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="w-full py-4 bg-[#080187] hover:bg-blue-900 text-white font-extrabold rounded-2xl shadow-lg transition duration-200 flex items-center justify-center gap-2">
                            <i data-lucide="send" class="w-5 h-5"></i>
                            <span>Enviar Consulta</span>
                        </button>
                    </form>
                </div>
            </div>

        </div>

        <!-- Google Maps Full Width Embed -->
        <div class="mt-16 bg-white rounded-3xl p-4 shadow-sm border border-slate-200 overflow-hidden">
            <iframe 
                src="{{ $mapIframe }}" 
                width="100%" 
                height="400" 
                style="border:0; border-radius: 1rem;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
        </div>
    </div>
</section>
@endsection
