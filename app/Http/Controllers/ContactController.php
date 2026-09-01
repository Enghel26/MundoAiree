<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'nombre' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'telefono' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'correo' => 'nullable|email|max:255',
            'service_interest' => 'nullable|string|max:255',
            'servicio_interes' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:2000',
            'mensaje' => 'nullable|string|max:2000',
        ]);

        $nombre = $request->input('nombre', $request->input('name'));
        $telefono = $request->input('telefono', $request->input('phone'));
        $correo = $request->input('correo', $request->input('email'));
        $servicioInteres = $request->input('servicio_interes', $request->input('service_interest'));
        $mensaje = $request->input('mensaje', $request->input('message'));

        if (empty($nombre) || empty($telefono) || empty($mensaje)) {
            return back()->withErrors(['message' => 'Por favor completa los campos requeridos (nombre, teléfono y mensaje).'])->withInput();
        }

        ContactMessage::create([
            'nombre' => $nombre,
            'telefono' => $telefono,
            'correo' => $correo,
            'servicio_interes' => $servicioInteres,
            'mensaje' => $mensaje,
            'leido' => false,
        ]);

        return back()->with('success', '¡Gracias por contactar a Mundo Airee SRL! Hemos recibido tu mensaje y uno de nuestros asesores técnicos te responderá a la brevedad.');
    }
}
