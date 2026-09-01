<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('orden')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'titulo' => 'nullable|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'descripcion_corta' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'contenido' => 'nullable|string',
            'icon' => 'nullable|string|max:50',
            'icono' => 'nullable|string|max:50',
            'image' => 'nullable|string|max:255',
            'imagen' => 'nullable|string|max:255',
            'whatsapp_message' => 'nullable|string|max:500',
            'mensaje_whatsapp' => 'nullable|string|max:500',
            'order' => 'nullable|integer',
            'orden' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'activo' => 'nullable|boolean',
        ]);

        $titulo = $request->input('titulo', $request->input('title'));
        $descCorta = $request->input('descripcion_corta', $request->input('short_description'));

        if (empty($titulo) || empty($descCorta)) {
            return back()->withErrors(['title' => 'El título y la descripción corta son obligatorios.'])->withInput();
        }

        $service = Service::create([
            'titulo' => $titulo,
            'slug' => Str::slug($titulo),
            'descripcion_corta' => $descCorta,
            'contenido' => $request->input('contenido', $request->input('content')),
            'icono' => $request->input('icono', $request->input('icon', 'wrench')),
            'imagen' => $request->input('imagen', $request->input('image')),
            'mensaje_whatsapp' => $request->input('mensaje_whatsapp', $request->input('whatsapp_message')),
            'orden' => $request->input('orden', $request->input('order', 0)),
            'activo' => $request->boolean('activo', $request->boolean('is_active', true)),
        ]);

        return redirect()->route('admin.services.index')->with('success', "Servicio {$service->titulo} creado exitosamente.");
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'titulo' => 'nullable|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'descripcion_corta' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'contenido' => 'nullable|string',
            'icon' => 'nullable|string|max:50',
            'icono' => 'nullable|string|max:50',
            'image' => 'nullable|string|max:255',
            'imagen' => 'nullable|string|max:255',
            'whatsapp_message' => 'nullable|string|max:500',
            'mensaje_whatsapp' => 'nullable|string|max:500',
            'order' => 'nullable|integer',
            'orden' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'activo' => 'nullable|boolean',
        ]);

        $titulo = $request->input('titulo', $request->input('title', $service->titulo));
        $descCorta = $request->input('descripcion_corta', $request->input('short_description', $service->descripcion_corta));

        $service->update([
            'titulo' => $titulo,
            'descripcion_corta' => $descCorta,
            'contenido' => $request->input('contenido', $request->input('content', $service->contenido)),
            'icono' => $request->input('icono', $request->input('icon', $service->icono)),
            'imagen' => $request->input('imagen', $request->input('image', $service->imagen)),
            'mensaje_whatsapp' => $request->input('mensaje_whatsapp', $request->input('whatsapp_message', $service->mensaje_whatsapp)),
            'orden' => $request->input('orden', $request->input('order', $service->orden)),
            'activo' => $request->boolean('activo', $request->boolean('is_active')),
        ]);

        return redirect()->route('admin.services.index')->with('success', "Servicio {$service->titulo} actualizado exitosamente.");
    }

    public function destroy(Service $service)
    {
        $title = $service->titulo;
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', "Servicio {$title} eliminado.");
    }
}
