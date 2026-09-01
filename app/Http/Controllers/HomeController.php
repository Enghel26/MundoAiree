<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\CompanySetting;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // 3 Equipos Destacados principales para el Home
        $featuredProducts = Product::with(['category', 'brand'])
            ->where('activo', true)
            ->where('es_destacado', true)
            ->take(3)
            ->get();

        if ($featuredProducts->count() < 3) {
            $featuredProducts = Product::with(['category', 'brand'])
                ->where('activo', true)
                ->take(3)
                ->get();
        }

        // Top 3 servicios principales
        $services = Service::where('activo', true)
            ->orderBy('orden')
            ->take(3)
            ->get();

        $brands = Brand::where('activo', true)->get();
        $categories = Category::where('activo', true)->withCount('products')->get();

        return view('pages.home', compact('featuredProducts', 'services', 'brands', 'categories'));
    }
}
