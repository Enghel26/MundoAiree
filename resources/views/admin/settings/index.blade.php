@extends('layouts.admin')

@section('title', 'Configuración General y Textos (CMS) - Mundo Aire, SRL')
@section('page_title', 'Gestor de Contenidos y Configuración (CMS)')

@section('content')
<div class="max-w-5xl space-y-6">
    <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-xs">
        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
            @csrf

            <!-- Section 1: Direct Contact Data & WhatsApp -->
            <div class="space-y-4">
                <div class="border-b border-slate-100 pb-3">
                    <h3 class="text-base font-extrabold text-navy-900 flex items-center gap-2">
                        <i data-lucide="phone-call" class="w-5 h-5 text-brand-600"></i>
                        <span>1. Datos de Contacto y WhatsApp de Cotizaciones</span>
                    </h3>
                    <p class="text-xs text-slate-500">Este número es al que llegarán todas las consultas directas de los botones de WhatsApp de la web.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Número de WhatsApp (con código de país sin + ni espacios)</label>
                        <input type="text" name="whatsapp_number" value="{{ $settings['whatsapp_number'] ?? '18097411057' }}" required placeholder="Ej: 18097411057" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                        <p class="text-[11px] text-slate-400 mt-1">Formato internacional: 18097411057 para República Dominicana.</p>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Teléfono Visible en la Web</label>
                        <input type="text" name="phone_display" value="{{ $settings['phone_display'] ?? '(809) 741-1057' }}" required placeholder="Ej: (809) 741-1057" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Correo Electrónico de Contacto</label>
                        <input type="email" name="email" value="{{ $settings['email'] ?? 'enghelmejia@gmail.com' }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Horario de Atención</label>
                        <input type="text" name="schedule" value="{{ $settings['schedule'] ?? 'Lunes a Viernes: 8:00 AM - 6:00 PM | Sábados: 8:00 AM - 1:00 PM' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Dirección Física</label>
                        <input type="text" name="address" value="{{ $settings['address'] ?? 'C/Ingeniero Pedro Bonilla Esq, C. José Francisco Peña Gómez Local 2, Santo Domingo Este 11802' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">URL de Mapa Embebido de Google Maps</label>
                        <input type="text" name="google_maps_iframe" value="{{ $settings['google_maps_iframe'] ?? '' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                    </div>
                </div>
            </div>

            <!-- Section 2: Social Media Links -->
            <div class="space-y-4 pt-4 border-t border-slate-100">
                <div class="border-b border-slate-100 pb-3">
                    <h3 class="text-base font-extrabold text-navy-900 flex items-center gap-2">
                        <i data-lucide="share-2" class="w-5 h-5 text-brand-600"></i>
                        <span>2. Redes Sociales Oficiales</span>
                    </h3>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Instagram URL</label>
                        <input type="url" name="instagram_url" value="{{ $settings['instagram_url'] ?? 'https://instagram.com/mundoairesrl' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Facebook URL</label>
                        <input type="url" name="facebook_url" value="{{ $settings['facebook_url'] ?? 'https://facebook.com/mundoairesrl' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">TikTok URL</label>
                        <input type="url" name="tiktok_url" value="{{ $settings['tiktok_url'] ?? 'https://tiktok.com/@mundoairesrl' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                    </div>
                </div>
            </div>

            <!-- Section 3: Home Page Texts -->
            <div class="space-y-4 pt-4 border-t border-slate-100">
                <div class="border-b border-slate-100 pb-3">
                    <h3 class="text-base font-extrabold text-navy-900 flex items-center gap-2">
                        <i data-lucide="layout" class="w-5 h-5 text-brand-600"></i>
                        <span>3. Textos de la Página de Inicio (Banner / Hero)</span>
                    </h3>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Título Principal (Hero)</label>
                        <input type="text" name="hero_title" value="{{ $settings['hero_title'] ?? '' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Subtítulo de Inicio</label>
                        <textarea name="hero_subtitle" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">{{ $settings['hero_subtitle'] ?? '' }}</textarea>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Estadística 1</label>
                            <input type="text" name="hero_stat_1_number" value="{{ $settings['hero_stat_1_number'] ?? '10+' }}" class="w-full px-4 py-2 rounded-xl border border-slate-200 text-sm">
                            <input type="text" name="hero_stat_1_label" value="{{ $settings['hero_stat_1_label'] ?? 'Años de Experiencia' }}" class="w-full px-4 py-1.5 rounded-xl border border-slate-200 text-xs mt-1 text-slate-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Estadística 2</label>
                            <input type="text" name="hero_stat_2_number" value="{{ $settings['hero_stat_2_number'] ?? '5,000+' }}" class="w-full px-4 py-2 rounded-xl border border-slate-200 text-sm">
                            <input type="text" name="hero_stat_2_label" value="{{ $settings['hero_stat_2_label'] ?? 'Equipos Instalados' }}" class="w-full px-4 py-1.5 rounded-xl border border-slate-200 text-xs mt-1 text-slate-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Estadística 3</label>
                            <input type="text" name="hero_stat_3_number" value="{{ $settings['hero_stat_3_number'] ?? '100%' }}" class="w-full px-4 py-2 rounded-xl border border-slate-200 text-sm">
                            <input type="text" name="hero_stat_3_label" value="{{ $settings['hero_stat_3_label'] ?? 'Garantía Certificada' }}" class="w-full px-4 py-1.5 rounded-xl border border-slate-200 text-xs mt-1 text-slate-500">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 4: About Us Content -->
            <div class="space-y-4 pt-4 border-t border-slate-100">
                <div class="border-b border-slate-100 pb-3">
                    <h3 class="text-base font-extrabold text-navy-900 flex items-center gap-2">
                        <i data-lucide="info" class="w-5 h-5 text-brand-600"></i>
                        <span>4. Textos de Nosotros (Historia, Misión, Visión)</span>
                    </h3>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Historia y Trayectoria</label>
                        <textarea name="about_history" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">{{ $settings['about_history'] ?? '' }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Misión de Mundo Aire</label>
                            <textarea name="mission" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">{{ $settings['mission'] ?? '' }}</textarea>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Visión de Mundo Aire</label>
                            <textarea name="vision" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">{{ $settings['vision'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-slate-100 flex justify-end">
                <button type="submit" class="px-8 py-3.5 bg-brand-600 hover:bg-brand-700 text-white font-bold text-sm rounded-xl shadow-lg shadow-brand-600/25 transition">
                    Guardar Toda la Configuración
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
