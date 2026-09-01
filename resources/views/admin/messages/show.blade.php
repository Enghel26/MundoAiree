@extends('layouts.admin')

@section('title', 'Detalle de Mensaje - Panel Mundo Aire, SRL')
@section('page_title', 'Mensaje de: ' . $message->name)

@section('content')
<div class="max-w-3xl space-y-6">
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.messages.index') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 hover:text-navy-900 transition">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Volver a Mensajes
        </a>

        <div class="flex items-center gap-2">
            <a href="{{ $message->whatsapp_reply_url }}" target="_blank" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-4 py-2 rounded-xl shadow-xs transition">
                <i data-lucide="message-circle" class="w-4 h-4"></i>
                <span>Responder por WhatsApp</span>
            </a>
            <a href="tel:{{ preg_replace('/[^0-9]/', '', $message->phone) }}" class="inline-flex items-center gap-2 bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold px-4 py-2 rounded-xl transition">
                <i data-lucide="phone-call" class="w-4 h-4"></i>
                <span>Llamar</span>
            </a>
        </div>
    </div>

    <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-xs space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-slate-100 pb-4 gap-2">
            <div>
                <h3 class="text-xl font-extrabold text-navy-900">{{ $message->name }}</h3>
                <span class="text-xs text-slate-400">Recibido el {{ $message->created_at->format('d/m/Y \a \l\a\s H:i') }}</span>
            </div>
            <span class="px-3 py-1 bg-brand-50 text-brand-700 text-xs font-bold rounded-lg self-start">
                Interés: {{ $message->service_interest ?? 'General' }}
            </span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                <span class="text-slate-400 font-bold uppercase block mb-1">Teléfono</span>
                <span class="text-sm font-extrabold text-navy-900">{{ $message->phone }}</span>
            </div>

            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                <span class="text-slate-400 font-bold uppercase block mb-1">Correo Electrónico</span>
                <span class="text-sm font-semibold text-navy-900">{{ $message->email ?? 'No proporcionado' }}</span>
            </div>
        </div>

        <div class="space-y-2">
            <span class="text-xs font-bold uppercase text-slate-500">Mensaje del Cliente:</span>
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 text-slate-800 text-sm leading-relaxed whitespace-pre-line">
                {{ $message->message }}
            </div>
        </div>

        <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
            <form action="{{ route('admin.messages.toggle-read', $message->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="text-xs text-slate-500 hover:text-brand-600 font-semibold flex items-center gap-1">
                    <i data-lucide="check" class="w-4 h-4"></i>
                    <span>{{ $message->is_read ? 'Marcar como No Leído' : 'Marcar como Leído' }}</span>
                </button>
            </form>

            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('¿Eliminar definitivamente este mensaje?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-xs text-rose-600 hover:underline font-semibold flex items-center gap-1">
                    <i data-lucide="trash-2" class="w-4 h-4"></i> Eliminar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
