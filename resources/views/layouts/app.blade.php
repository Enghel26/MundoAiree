<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mundo Airee, SRL - Venta, Instalación y Reparación de Aires Acondicionados en RD')</title>
    <meta name="description" content="@yield('meta_description', 'Expertos en climatización en República Dominicana. Venta de aires acondicionados, componentes, filtros, mangueras y repuestos. Instalación, mantenimiento y reparación.')">
    
    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('images/Logo/logo.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/Logo/logo.jpg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN & Alpine.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#38bdf8',
                            600: '#080187', // Color Azul Corporativo del Logo
                            700: '#060166',
                            800: '#04014d',
                            900: '#03013b',
                            950: '#080187',
                        },
                        navy: {
                            800: '#0b029e',
                            900: '#080187', // #080187
                            950: '#05015c',
                        },
                        brandBlue: '#080187',
                        whatsapp: '#25D366',
                        whatsappDark: '#128C7E',
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
        .gradient-mesh {
            background-color: #080187;
            background-image: 
                radial-gradient(at 0% 0%, rgba(56, 189, 248, 0.35) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(14, 165, 233, 0.25) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(8, 1, 135, 0.9) 0px, transparent 50%);
        }
        @keyframes marquee {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: flex;
            width: max-content;
            animation: marquee 22s linear infinite;
        }
        .animate-marquee:hover {
            animation-play-state: paused;
        }

        /* Ambient Header Animations */
        @keyframes floatOrb1 {
            0% { transform: translate(0px, 0px) scale(1); }
            50% { transform: translate(35px, -25px) scale(1.12); }
            100% { transform: translate(-20px, 15px) scale(0.92); }
        }
        @keyframes floatOrb2 {
            0% { transform: translate(0px, 0px) scale(1); }
            50% { transform: translate(-30px, 30px) scale(1.15); }
            100% { transform: translate(25px, -20px) scale(0.9); }
        }
        @keyframes floatOrb3 {
            0% { transform: translate(0px, 0px) scale(0.95); opacity: 0.25; }
            50% { transform: translate(20px, 30px) scale(1.2); opacity: 0.45; }
            100% { transform: translate(-25px, -15px) scale(1); opacity: 0.25; }
        }
        @keyframes breezeDrift {
            0% { transform: translateX(-10%) translateY(0); opacity: 0.2; }
            50% { transform: translateX(10%) translateY(-6px); opacity: 0.45; }
            100% { transform: translateX(-10%) translateY(0); opacity: 0.2; }
        }
        .animate-orb-1 {
            animation: floatOrb1 10s ease-in-out infinite alternate;
        }
        .animate-orb-2 {
            animation: floatOrb2 12s ease-in-out infinite alternate;
        }
        .animate-orb-3 {
            animation: floatOrb3 8s ease-in-out infinite alternate;
        }
        .animate-breeze {
            animation: breezeDrift 9s ease-in-out infinite;
        }
        .dot-grid-pattern {
            background-image: radial-gradient(rgba(255, 255, 255, 0.12) 1.2px, transparent 1.2px);
            background-size: 24px 24px;
        }
        .glass-pill {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.16);
        }
        .glass-pill:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(56, 189, 248, 0.4);
        }
    </style>
    @stack('styles')
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased min-h-screen flex flex-col selection:bg-brand-500 selection:text-white" x-data="{ mobileMenuOpen: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 30)">

    @php
        $companyName = \App\Models\CompanySetting::get('company_name', 'Mundo Airee, SRL');
        $phone = \App\Models\CompanySetting::get('phone_display', '(829) 276-9291');
        $address = \App\Models\CompanySetting::get('address', 'C/Ingeniero Pedro Bonilla Esq, C. José Francisco Peña Gómez Local 2, Santo Domingo Este 11802');
        $googleMapsUrl = \App\Models\CompanySetting::get('google_maps_url', 'https://www.google.com/maps/search/?api=1&query=C%2FIngeniero+Pedro+Bonilla+Esq%2C+C.+Jos%C3%A9+Francisco+Pe%C3%B1a+G%C3%B3mez+Local+2%2C+Santo+Domingo+Este+11802');
        $instagram = \App\Models\CompanySetting::get('instagram_url', 'https://www.instagram.com/mundo_airee/');
        $whatsappLink = \App\Helpers\WhatsAppHelper::makeLink();
        $isHome = request()->routeIs('home');
    @endphp

    <!-- Header Fijo y Transparente con Color #080187 al hacer scroll -->
    <header 
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 w-full"
        :class="scrolled ? 'bg-[#080187]/95 backdrop-blur-lg shadow-xl border-b border-blue-900/60 py-2' : '{{ $isHome ? 'bg-transparent py-4' : 'bg-[#080187] border-b border-blue-900/60 py-3' }}'"
    >
        <div class="w-full px-4 sm:px-8 lg:px-12">
            <div class="flex items-center justify-between h-16 sm:h-20 w-full">
                
                <!-- 1. EXTREMO IZQUIERDO: Logo oficial -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('home') }}" class="block transition hover:opacity-95 bg-white/95 rounded-2xl p-1 shadow-md">
                        <img src="{{ asset('images/Logo/logo.jpg') }}" alt="Mundo Airee SRL" class="h-12 sm:h-16 w-auto object-contain rounded-xl">
                    </a>
                </div>

                <!-- 2. CENTRO: Opciones de Navegación centradas en el espacio central -->
                <nav class="hidden md:flex items-center justify-center space-x-1 lg:space-x-6 font-semibold text-white text-sm flex-1 mx-4">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-xl hover:text-brand-300 hover:bg-white/15 transition {{ request()->routeIs('home') ? 'text-brand-300 bg-white/20 font-bold backdrop-blur-sm shadow-xs' : '' }}">
                        Inicio
                    </a>
                    <a href="{{ route('about') }}" class="px-4 py-2 rounded-xl hover:text-brand-300 hover:bg-white/15 transition {{ request()->routeIs('about') ? 'text-brand-300 bg-white/20 font-bold backdrop-blur-sm shadow-xs' : '' }}">
                        Nosotros
                    </a>
                    <a href="{{ route('services.index') }}" class="px-4 py-2 rounded-xl hover:text-brand-300 hover:bg-white/15 transition {{ request()->routeIs('services.*') ? 'text-brand-300 bg-white/20 font-bold backdrop-blur-sm shadow-xs' : '' }}">
                        Servicios
                    </a>
                    <a href="{{ route('products.index') }}" class="px-4 py-2 rounded-xl hover:text-brand-300 hover:bg-white/15 transition {{ request()->routeIs('products.*') ? 'text-brand-300 bg-white/20 font-bold backdrop-blur-sm shadow-xs' : '' }}">
                        Catálogo
                    </a>
                    <a href="{{ route('contact') }}" class="px-4 py-2 rounded-xl hover:text-brand-300 hover:bg-white/15 transition {{ request()->routeIs('contact') ? 'text-brand-300 bg-white/20 font-bold backdrop-blur-sm shadow-xs' : '' }}">
                        Contacto
                    </a>
                </nav>

                <!-- 3. EXTREMO DERECHO: Icono de Instagram + Ubicación + WhatsApp -->
                <div class="flex items-center space-x-3 shrink-0">
                    <!-- Icono de Instagram Oficial -->
                    <a href="{{ $instagram }}" target="_blank" rel="noopener" class="w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-white/15 hover:bg-white/25 flex items-center justify-center transition border border-white/30 shadow-md backdrop-blur-md" title="Síguenos en Instagram @mundo_airee">
                        <img src="{{ asset('images/iconos/insta-ico.png') }}" alt="Instagram" class="w-5 h-5 object-contain">
                    </a>

                    <!-- Icono de Ubicación -> Abre directamente Google Maps -->
                    <a href="{{ $googleMapsUrl }}" target="_blank" rel="noopener" class="w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-white/15 hover:bg-white/25 text-white flex items-center justify-center transition border border-white/30 shadow-md backdrop-blur-md" title="Ver Ubicación en Google Maps">
                        <i data-lucide="map-pin" class="w-5 h-5 text-brand-300"></i>
                    </a>

                    <!-- Icono de WhatsApp para Cotizar -->
                    <a href="{{ $whatsappLink }}" target="_blank" rel="noopener" class="w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-whatsapp hover:bg-whatsappDark text-white flex items-center justify-center shadow-xl shadow-emerald-500/40 hover:scale-105 transition-all duration-200" title="Cotizar por WhatsApp">
                        <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-5 h-5 object-contain brightness-0 invert">
                    </a>

                    <!-- Mobile Menu Button -->
                    <div class="flex items-center md:hidden ml-1">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="p-2 rounded-xl text-white hover:bg-white/15 transition" aria-label="Abrir Menú">
                            <i data-lucide="menu" class="w-6 h-6" x-show="!mobileMenuOpen"></i>
                            <i data-lucide="x" class="w-6 h-6" x-show="mobileMenuOpen" x-cloak></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Mobile Navigation Drawer -->
        <div x-show="mobileMenuOpen" x-cloak @click.away="mobileMenuOpen = false" class="md:hidden border-t border-blue-900 bg-[#080187]/98 backdrop-blur-xl shadow-2xl px-4 pt-3 pb-6 space-y-2 text-white">
            <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('home') ? 'bg-white/15 text-brand-300 font-bold' : 'text-slate-200 hover:bg-white/10' }}">
                Inicio
            </a>
            <a href="{{ route('about') }}" class="block px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('about') ? 'bg-white/15 text-brand-300 font-bold' : 'text-slate-200 hover:bg-white/10' }}">
                Nosotros e Historia
            </a>
            <a href="{{ route('services.index') }}" class="block px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('services.*') ? 'bg-white/15 text-brand-300 font-bold' : 'text-slate-200 hover:bg-white/10' }}">
                Servicios y Reparación
            </a>
            <a href="{{ route('products.index') }}" class="block px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('products.*') ? 'bg-white/15 text-brand-300 font-bold' : 'text-slate-200 hover:bg-white/10' }}">
                Catálogo de Productos
            </a>
            <a href="{{ route('contact') }}" class="block px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('contact') ? 'bg-white/15 text-brand-300 font-bold' : 'text-slate-200 hover:bg-white/10' }}">
                Contacto
            </a>
            <div class="pt-4 border-t border-blue-900/80 space-y-2">
                <a href="{{ $instagram }}" target="_blank" rel="noopener" class="w-full flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white font-bold py-3 rounded-xl transition text-sm border border-white/20">
                    <img src="{{ asset('images/iconos/insta-ico.png') }}" alt="Instagram" class="w-4 h-4 object-contain">
                    <span>Instagram @mundo_airee</span>
                </a>
                <a href="{{ $googleMapsUrl }}" target="_blank" rel="noopener" class="w-full flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white font-bold py-3 rounded-xl transition text-sm border border-white/20">
                    <i data-lucide="map-pin" class="w-4 h-4 text-brand-400"></i>
                    <span>Ver en Google Maps</span>
                </a>
                <a href="{{ $whatsappLink }}" target="_blank" rel="noopener" class="w-full flex items-center justify-center gap-2 bg-emerald-600 text-white font-bold py-3.5 rounded-xl shadow-md">
                    <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-5 h-5 object-contain brightness-0 invert">
                    <span>Consultar por WhatsApp (829) 276-9291</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-grow">
        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 mt-6">
                <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-xl shadow-xs flex items-start gap-3">
                    <i data-lucide="check-circle" class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5"></i>
                    <div class="text-sm text-emerald-800 font-medium">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer con Fondo Azul Corporativo #080187 -->
    <footer class="bg-[#080187] text-blue-100/80 pt-16 pb-8 border-t border-blue-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-blue-900/80">
                <!-- Col 1: About Mundo Airee with Logo -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/Logo/logo.jpg') }}" alt="Mundo Airee SRL" class="h-16 w-auto object-contain rounded-xl bg-white p-1">
                    </div>
                    <p class="text-sm text-blue-100/80 leading-relaxed">
                        Líderes en venta de aires acondicionados, componentes, mangueras, filtros, tuberías de cobre, instalación certificada y mantenimiento en toda RD.
                    </p>
                    <div class="flex space-x-3 pt-2">
                        <a href="{{ $instagram }}" target="_blank" rel="noopener" class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/20" title="Instagram @mundo_airee">
                            <img src="{{ asset('images/iconos/insta-ico.png') }}" alt="Instagram" class="w-5 h-5 object-contain">
                        </a>
                        <a href="{{ $whatsappLink }}" target="_blank" class="w-10 h-10 rounded-xl bg-emerald-600/30 text-emerald-400 hover:bg-emerald-600 hover:text-white flex items-center justify-center transition border border-emerald-500/30" title="WhatsApp (829) 276-9291">
                            <img src="{{ asset('images/iconos/icons8-whatsapp-24.png') }}" alt="WhatsApp" class="w-5 h-5 object-contain brightness-0 invert">
                        </a>
                    </div>
                </div>

                <!-- Col 2: Quick Links -->
                <div>
                    <h3 class="text-white text-base font-bold mb-4 tracking-wide uppercase text-xs">Navegación Rápida</h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition flex items-center gap-2"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-sky-400"></i> Inicio</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-white transition flex items-center gap-2"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-sky-400"></i> Quiénes Somos e Historia</a></li>
                        <li><a href="{{ route('services.index') }}" class="hover:text-white transition flex items-center gap-2"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-sky-400"></i> Servicios</a></li>
                        <li><a href="{{ route('products.index') }}" class="hover:text-white transition flex items-center gap-2"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-sky-400"></i> Catálogo de Equipos y Repuestos</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition flex items-center gap-2"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-sky-400"></i> Contacto y Cotización</a></li>
                    </ul>
                </div>

                <!-- Col 3: Services & Components -->
                <div>
                    <h3 class="text-white text-base font-bold mb-4 tracking-wide uppercase text-xs">Ventas y Servicios</h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('products.index') }}" class="hover:text-white transition">Venta de Aires Inverter</a></li>
                        <li><a href="{{ route('products.index') }}" class="hover:text-white transition">Filtros, Mangueras y Tuberías</a></li>
                        <li><a href="{{ route('services.index') }}" class="hover:text-white transition">Instalación Certificada</a></li>
                        <li><a href="{{ route('services.index') }}" class="hover:text-white transition">Mantenimiento y Lavado a Presión</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact info (Con teléfono 829-276-9291 y enlace directo a Google Maps) -->
                <div>
                    <h3 class="text-white text-base font-bold mb-4 tracking-wide uppercase text-xs">Contacto Directo</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start gap-3">
                            <i data-lucide="phone-call" class="w-4 h-4 text-sky-300 shrink-0 mt-1"></i>
                            <a href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}" class="hover:text-white transition font-bold text-white">{{ $phone }}</a>
                        </li>
                        <li class="flex items-start gap-3">
                            <i data-lucide="map-pin" class="w-4 h-4 text-sky-300 shrink-0 mt-1"></i>
                            <a href="{{ $googleMapsUrl }}" target="_blank" rel="noopener" class="hover:text-white transition block" title="Ver en Google Maps">
                                {{ $address }}
                            </a>
                        </li>
                        <li class="flex items-start gap-3">
                            <i data-lucide="clock" class="w-4 h-4 text-sky-300 shrink-0 mt-1"></i>
                            <span>Lunes a Sábado: 8:00 AM - 6:00 PM</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom legal -->
            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center text-xs text-blue-200/60 gap-4">
                <p>&copy; {{ date('Y') }} {{ $companyName }}. Todos los derechos reservados.</p>
                <div class="flex items-center space-x-6">
                    <span class="text-blue-200/80 font-semibold">Mundo Airee, SRL</span>
                    <a href="{{ route('admin.login') }}" class="text-blue-200/50 hover:text-white transition flex items-center gap-1.5 font-medium" title="Panel de Administración">
                        <i data-lucide="lock" class="w-3.5 h-3.5"></i>
                        <span>Acceso Admin</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Initialize Lucide Icons -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            lucide.createIcons();
        });
    </script>
    @stack('scripts')
</body>
</html>
