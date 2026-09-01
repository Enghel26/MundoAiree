<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('activo', true)
            ->orderBy('orden')
            ->get();

        return view('pages.services.index', compact('services'));
    }

    public function show(string $slug)
    {
        $service = Service::where('slug', $slug)
            ->where('activo', true)
            ->firstOrFail();

        $otherServices = Service::where('id', '!=', $service->id)
            ->where('activo', true)
            ->take(3)
            ->get();

        return view('pages.services.show', compact('service', 'otherServices'));
    }
}
