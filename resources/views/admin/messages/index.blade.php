@extends('layouts.admin')

@section('title', 'Mensajes y Prospectos - Panel Mundo Aire, SRL')
@section('page_title', 'Solicitudes de Contacto y Cotización')

@section('content')
<div class="space-y-6">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-xs overflow-hidden">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-bold border-b border-slate-200">
                <tr>
                    <th class="py-3.5 px-6">Cliente</th>
                    <th class="py-3.5 px-4">Teléfono / WhatsApp</th>
                    <th class="py-3.5 px-4">Interés</th>
                    <th class="py-3.5 px-4">Mensaje</th>
                    <th class="py-3.5 px-4">Fecha</th>
                    <th class="py-3.5 px-4">Estado</th>
                    <th class="py-3.5 px-6 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                @forelse($messages as $msg)
                    <tr class="hover:bg-slate-50/80 transition {{ !$msg->is_read ? 'bg-amber-50/40' : '' }}">
                        <td class="py-4 px-6">
                            <span class="font-bold text-navy-900 text-sm block">{{ $msg->name }}</span>
                            @if($msg->email)
                                <span class="text-[11px] text-slate-400">{{ $msg->email }}</span>
                            @endif
                        </td>
                        <td class="py-4 px-4 font-bold text-slate-900">
                            {{ $msg->phone }}
                        </td>
                        <td class="py-4 px-4">
                            <span class="px-2 py-0.5 rounded-md bg-slate-100 text-slate-700 text-[11px] font-semibold">
                                {{ $msg->service_interest ?? 'General' }}
                            </span>
                        </td>
                        <td class="py-4 px-4 max-w-xs truncate text-slate-600">
                            {{ $msg->message }}
                        </td>
                        <td class="py-4 px-4 text-[11px] text-slate-500">
                            {{ $msg->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="py-4 px-4">
                            @if(!$msg->is_read)
                                <span class="px-2 py-0.5 rounded-full bg-amber-100 text-amber-800 text-[10px] font-extrabold">No leído</span>
                            @else
                                <span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-500 text-[10px] font-medium">Revisado</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ $msg->whatsapp_reply_url }}" target="_blank" class="p-1.5 bg-emerald-50 text-emerald-600 hover:bg-emerald-500 hover:text-white rounded-lg transition" title="Responder por WhatsApp">
                                    <i data-lucide="message-circle" class="w-4 h-4"></i>
                                </a>
                                <a href="{{ route('admin.messages.show', $msg->id) }}" class="p-1.5 text-slate-500 hover:text-brand-600 hover:bg-slate-100 rounded-lg transition" title="Ver completo">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </a>
                                <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este mensaje?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition" title="Eliminar">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-12 text-center text-slate-400">
                            No hay mensajes recibidos por el momento.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="p-4 border-t border-slate-100">
            {{ $messages->links() }}
        </div>
    </div>
</div>
@endsection
