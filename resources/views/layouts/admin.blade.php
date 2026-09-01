<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel Administrativo - Mundo Aire, SRL')</title>
    
    <link rel="icon" type="image/jpeg" href="{{ asset('images/Logo/logo.jpg') }}">

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
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            900: '#0c4a6e',
                        },
                        navy: {
                            800: '#1e293b',
                            900: '#0f172a',
                            950: '#020617',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-100 text-slate-800 font-sans antialiased min-h-screen flex" x-data="{ sidebarOpen: false }">

    @php
        $unreadCount = \App\Models\ContactMessage::where('leido', false)->count();
    @endphp

    <!-- Mobile Sidebar Backdrop -->
    <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false" class="fixed inset-0 z-40 bg-slate-900/60 backdrop-blur-xs md:hidden"></div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 w-64 bg-navy-950 text-slate-300 flex flex-col transition-transform duration-300 ease-in-out md:translate-x-0 md:static md:inset-0 shadow-xl">
        <!-- Logo / Brand Header with Logo Image -->
        <div class="h-20 flex items-center px-6 border-b border-slate-800 bg-navy-900/60">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-white p-1 flex items-center justify-center overflow-hidden shrink-0 shadow-md">
                    <img src="{{ asset('images/Logo/logo.jpg') }}" alt="Mundo Aire SRL" class="w-8 h-8 object-contain rounded-lg">
                </div>
                <div>
                    <span class="text-base font-extrabold text-white tracking-tight leading-none block">
                        MUNDO <span class="text-brand-400">AIRE</span>
                    </span>
                    <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Panel CMS</span>
                </div>
            </a>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
            <div class="px-3 pb-2 text-[11px] font-bold text-slate-500 uppercase tracking-wider">Principal</div>

            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('admin.dashboard') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                <span>Dashboard</span>
            </a>

            <div class="px-3 pt-5 pb-2 text-[11px] font-bold text-slate-500 uppercase tracking-wider">Gestión de Contenido</div>

            <a href="{{ route('admin.products.index') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('admin.products.*') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                <div class="flex items-center gap-3">
                    <i data-lucide="box" class="w-5 h-5"></i>
                    <span>Catálogo de Aires</span>
                </div>
            </a>

            <a href="{{ route('admin.brands.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('admin.brands.*') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                <i data-lucide="tag" class="w-5 h-5"></i>
                <span>Marcas de Aires</span>
            </a>

            <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('admin.services.*') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                <i data-lucide="wrench" class="w-5 h-5"></i>
                <span>Servicios y Limpieza</span>
            </a>

            <a href="{{ route('admin.messages.index') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('admin.messages.*') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                <div class="flex items-center gap-3">
                    <i data-lucide="message-square" class="w-5 h-5"></i>
                    <span>Mensajes / Prospectos</span>
                </div>
                @if($unreadCount > 0)
                    <span class="px-2 py-0.5 text-xs font-bold bg-amber-500 text-slate-900 rounded-full animate-pulse">{{ $unreadCount }}</span>
                @endif
            </a>

            <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('admin.users.*') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                <i data-lucide="users" class="w-5 h-5"></i>
                <span>Gestión de Usuarios</span>
            </a>

            <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('admin.settings.*') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                <i data-lucide="settings" class="w-5 h-5"></i>
                <span>Configuración y Textos</span>
            </a>

            <div class="px-3 pt-5 pb-2 text-[11px] font-bold text-slate-500 uppercase tracking-wider">Enlaces</div>

            <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-400 hover:text-brand-300 hover:bg-slate-800/60 transition">
                <i data-lucide="external-link" class="w-5 h-5"></i>
                <span>Ver Sitio Web</span>
            </a>
        </nav>

        <!-- Admin Profile / Logout -->
        <div class="p-4 border-t border-slate-800 bg-navy-900/60">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-brand-700 flex items-center justify-center font-bold text-white text-sm">
                        {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->nombre ?? auth()->user()->usuario ?? 'Admin' }}</p>
                        <p class="text-[11px] text-brand-400 font-mono truncate">&#64;{{ auth()->user()->usuario ?? 'admin' }}</p>
                    </div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="p-2 text-slate-400 hover:text-red-400 hover:bg-slate-800 rounded-lg transition" title="Cerrar Sesión">
                        <i data-lucide="log-out" class="w-4 h-4"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Container -->
    <div class="flex-1 flex flex-col min-w-0">
        <!-- Top Navbar -->
        <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-4 sm:px-8">
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = true" class="md:hidden p-2 text-slate-600 hover:bg-slate-100 rounded-lg">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
                <h1 class="text-xl font-bold text-slate-800">@yield('page_title', 'Panel de Control')</h1>
            </div>
            
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" target="_blank" class="hidden sm:inline-flex items-center gap-2 text-xs font-semibold px-3.5 py-2 rounded-xl bg-slate-100 text-slate-700 hover:bg-slate-200 transition">
                    <i data-lucide="globe" class="w-4 h-4 text-brand-600"></i>
                    <span>Ir a la Web</span>
                </a>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-4 sm:p-8 overflow-y-auto">
            @if(session('success'))
                <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl flex items-center gap-3 shadow-xs">
                    <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-600 shrink-0"></i>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-rose-50 border border-rose-200 text-rose-800 px-4 py-3 rounded-xl flex items-center gap-3 shadow-xs">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-rose-600 shrink-0"></i>
                    <span class="text-sm font-medium">{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Initialize Lucide Icons -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            lucide.createIcons();
        });
    </script>
    @stack('scripts')
</body>
</html>
