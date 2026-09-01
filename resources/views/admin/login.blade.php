<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Administrativo - Mundo Aire, SRL</title>
    
    <link rel="icon" type="image/jpeg" href="{{ asset('images/Logo/logo.jpg') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
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
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                        },
                        navy: {
                            900: '#0f172a',
                            950: '#020617',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-navy-950 min-h-screen flex items-center justify-center p-4 font-sans text-slate-800 relative overflow-hidden">
    <!-- Atmospheric glow -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-brand-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-brand-600/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="w-full max-w-md relative z-10">
        <!-- Brand Header with Logo -->
        <div class="text-center mb-8 space-y-3">
            <div class="w-20 h-20 rounded-3xl bg-white p-2 flex items-center justify-center mx-auto shadow-2xl">
                <img src="{{ asset('images/Logo/logo.jpg') }}" alt="Mundo Aire SRL" class="w-16 h-16 object-contain rounded-2xl">
            </div>
            <div>
                <h1 class="text-2xl font-black text-white tracking-tight">MUNDO <span class="text-brand-400">AIRE</span></h1>
                <p class="text-xs uppercase font-bold tracking-widest text-slate-400">Panel de Administración (CMS)</p>
            </div>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-3xl p-8 shadow-2xl space-y-6">
            <div>
                <h2 class="text-xl font-extrabold text-navy-900">Iniciar Sesión</h2>
                <p class="text-xs text-slate-500 mt-1">Ingresa tu usuario y contraseña para acceder al panel.</p>
            </div>

            @if($errors->any())
                <div class="p-3 bg-rose-50 border border-rose-200 text-rose-700 text-xs rounded-xl font-medium">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Campo Usuario -->
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Usuario</label>
                    <div class="relative">
                        <input type="text" name="usuario" value="{{ old('usuario', 'admin') }}" required autofocus class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none" placeholder="admin">
                        <i data-lucide="user" class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5"></i>
                    </div>
                </div>

                <!-- Campo Contraseña -->
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Contraseña</label>
                    <div class="relative">
                        <input type="password" name="password" required class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none" placeholder="••••••••">
                        <i data-lucide="lock" class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5"></i>
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-2 cursor-pointer text-slate-600">
                        <input type="checkbox" name="remember" class="rounded text-brand-600">
                        <span>Recordarme</span>
                    </label>
                </div>

                <button type="submit" class="w-full py-3.5 bg-brand-600 hover:bg-brand-700 text-white font-bold rounded-xl shadow-lg shadow-brand-600/25 transition duration-200 text-sm flex items-center justify-center gap-2">
                    <i data-lucide="log-in" class="w-4 h-4"></i>
                    <span>Entrar al Panel</span>
                </button>
            </form>

            <div class="pt-4 border-t border-slate-100 text-center">
                <a href="{{ route('home') }}" class="text-xs text-slate-500 hover:text-brand-600 flex items-center justify-center gap-1">
                    <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Volver a la página principal
                </a>
            </div>
        </div>

        <div class="mt-6 text-center text-xs text-slate-400">
            Usuario: <strong class="text-white font-semibold">admin</strong> &nbsp;|&nbsp; Contraseña: <strong class="text-white font-semibold">admin123</strong>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            lucide.createIcons();
        });
    </script>
</body>
</html>
