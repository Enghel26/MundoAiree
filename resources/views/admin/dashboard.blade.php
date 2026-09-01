@extends('layouts.admin')

@section('title', 'Dashboard - Panel Mundo Aire, SRL')
@section('page_title', 'Resumen General')

@section('content')
<div class="space-y-8">
    
    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-navy-900 to-slate-900 text-white rounded-3xl p-6 sm:p-8 shadow-xl border border-slate-800 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div class="space-y-1">
            <h2 class="text-2xl font-black text-white">¡Hola, {{ auth()->user()->name }}!</h2>
            <p class="text-slate-300 text-sm">Gestiona el catálogo de equipos, servicios y solicitudes de cotización de Mundo Aire, SRL.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-500 text-white text-xs font-bold px-4 py-2.5 rounded-xl shadow-md transition">
                <i data-lucide="plus-circle" class="w-4 h-4"></i>
                <span>Nuevo Producto</span>
            </a>
            <a href="{{ route('admin.settings.index') }}" class="inline-flex items-center gap-2 bg-slate-800 hover:bg-slate-700 text-white text-xs font-semibold px-4 py-2.5 rounded-xl border border-slate-700 transition">
                <i data-lucide="settings" class="w-4 h-4"></i>
                <span>Configuración</span>
            </a>
        </div>
    </div>

    <!-- Metric Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <!-- Total Products -->
        <a href="{{ route('admin.products.index') }}" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs space-y-2 hover:border-brand-500 hover:shadow-md transition block group">
            <div class="flex items-center justify-between text-slate-500">
                <span class="text-xs font-bold uppercase tracking-wider group-hover:text-brand-600 transition">Catálogo Activo</span>
                <div class="w-9 h-9 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center group-hover:scale-110 transition">
                    <i data-lucide="box" class="w-5 h-5"></i>
                </div>
            </div>
            <div class="text-3xl font-black text-navy-900">{{ $totalProducts }}</div>
            <p class="text-xs text-slate-400 font-medium">{{ $activeProducts }} visibles en la web</p>
        </a>

        <!-- Services -->
        <a href="{{ route('admin.services.index') }}" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs space-y-2 hover:border-emerald-500 hover:shadow-md transition block group">
            <div class="flex items-center justify-between text-slate-500">
                <span class="text-xs font-bold uppercase tracking-wider group-hover:text-emerald-600 transition">Servicios Ofrecidos</span>
                <div class="w-9 h-9 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:scale-110 transition">
                    <i data-lucide="wrench" class="w-5 h-5"></i>
                </div>
            </div>
            <div class="text-3xl font-black text-navy-900">{{ $totalServices }}</div>
            <p class="text-xs text-slate-400 font-medium">Venta, Instalación, etc.</p>
        </a>

        <!-- Brands -->
        <a href="{{ route('admin.brands.index') }}" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs space-y-2 hover:border-purple-500 hover:shadow-md transition block group">
            <div class="flex items-center justify-between text-slate-500">
                <span class="text-xs font-bold uppercase tracking-wider group-hover:text-purple-600 transition">Marcas de Aires</span>
                <div class="w-9 h-9 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center group-hover:scale-110 transition">
                    <i data-lucide="tag" class="w-5 h-5"></i>
                </div>
            </div>
            <div class="text-3xl font-black text-navy-900">{{ $totalBrands }}</div>
            <p class="text-xs text-slate-400 font-medium">Gestionar logos y fabricantes &rarr;</p>
        </a>

        <!-- Messages / Inquiries -->
        <a href="{{ route('admin.messages.index') }}" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs space-y-2 hover:border-amber-500 hover:shadow-md transition block group">
            <div class="flex items-center justify-between text-slate-500">
                <span class="text-xs font-bold uppercase tracking-wider group-hover:text-amber-600 transition">Mensajes Web</span>
                <div class="w-9 h-9 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center group-hover:scale-110 transition">
                    <i data-lucide="message-square" class="w-5 h-5"></i>
                </div>
            </div>
            <div class="text-3xl font-black text-navy-900">{{ $totalMessagesCount }}</div>
            <p class="text-xs font-bold {{ $unreadMessagesCount > 0 ? 'text-amber-600' : 'text-slate-400' }}">
                {{ $unreadMessagesCount }} pendientes de leer
            </p>
        </a>

    </div>

    <!-- Recent Messages & Products Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Recent Messages (Prospects) -->
        <div class="lg:col-span-7 bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div>
                    <h3 class="text-lg font-bold text-navy-900">Últimos Mensajes de Clientes</h3>
                    <p class="text-xs text-slate-500">Solicitudes recibidas a través del formulario de contacto.</p>
                </div>
                <a href="{{ route('admin.messages.index') }}" class="text-xs font-bold text-brand-600 hover:underline">
                    Ver todos
                </a>
            </div>

            @if($recentMessages->isEmpty())
                <div class="py-12 text-center text-slate-400 space-y-2">
                    <i data-lucide="inbox" class="w-8 h-8 mx-auto text-slate-300"></i>
                    <p class="text-xs font-medium">Aún no hay mensajes de contacto registrados.</p>
                </div>
            @else
                <div class="divide-y divide-slate-100">
                    @foreach($recentMessages as $msg)
                        <div class="py-3.5 flex items-center justify-between gap-4">
                            <div class="space-y-0.5 min-w-0">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm font-bold text-navy-900 truncate">{{ $msg->name }}</span>
                                    @if(!$msg->is_read)
                                        <span class="px-2 py-0.5 text-[10px] font-extrabold bg-amber-100 text-amber-800 rounded-full">Nuevo</span>
                                    @endif
                                </div>
                                <p class="text-xs text-slate-500 truncate">{{ $msg->message }}</p>
                                <span class="text-[10px] text-slate-400 font-medium">{{ $msg->created_at->diffForHumans() }} • Tel: {{ $msg->phone }}</span>
                            </div>

                            <div class="flex items-center gap-2 shrink-0">
                                <a href="{{ $msg->whatsapp_reply_url }}" target="_blank" class="p-2 bg-emerald-50 hover:bg-emerald-500 text-emerald-600 hover:text-white rounded-lg transition" title="Responder por WhatsApp">
                                    <i data-lucide="message-circle" class="w-4 h-4"></i>
                                </a>
                                <a href="{{ route('admin.messages.show', $msg->id) }}" class="p-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg transition" title="Ver detalle">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Recent Products Added -->
        <div class="lg:col-span-5 bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div>
                    <h3 class="text-lg font-bold text-navy-900">Catálogo Reciente</h3>
                    <p class="text-xs text-slate-500">Últimos aires acondicionados registrados.</p>
                </div>
                <a href="{{ route('admin.products.index') }}" class="text-xs font-bold text-brand-600 hover:underline">
                    Gestionar
                </a>
            </div>

            <div class="divide-y divide-slate-100">
                @foreach($recentProducts as $prod)
                    <div class="py-3 flex items-center justify-between gap-3">
                        <div class="space-y-0.5 min-w-0">
                            <span class="text-xs font-extrabold text-navy-900 truncate block">{{ $prod->name }}</span>
                            <div class="flex items-center gap-2 text-[11px] text-slate-500">
                                <span>{{ $prod->brand?->name }}</span>
                                <span>•</span>
                                <span class="font-bold text-brand-600">{{ number_format($prod->btu_capacity) }} BTU</span>
                            </div>
                        </div>
                        <a href="{{ route('admin.products.edit', $prod->id) }}" class="text-xs font-semibold text-slate-500 hover:text-brand-600">
                            Editar
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection
