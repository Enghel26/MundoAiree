<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'brand'])->where('activo', true);

        // Filter by Category
        if ($request->filled('categoria')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->categoria);
            });
        }

        // Filter by Brand
        if ($request->filled('marca')) {
            $query->whereHas('brand', function ($q) use ($request) {
                $q->where('slug', $request->marca);
            });
        }

        // Filter by BTU Capacity
        if ($request->filled('btu')) {
            $query->where('capacidad_btu', $request->btu);
        }

        // Filter by Inverter Type
        if ($request->filled('tipo')) {
            $query->where('tipo_inverter', 'like', '%' . $request->tipo . '%');
        }

        // Search text
        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('codigo_modelo', 'like', "%{$search}%")
                  ->orWhere('descripcion', 'like', "%{$search}%");
            });
        }

        // Sorting
        $sort = $request->get('orden', 'destacados');
        switch ($sort) {
            case 'menor_precio':
                $query->orderBy('precio', 'asc');
                break;
            case 'mayor_precio':
                $query->orderBy('precio', 'desc');
                break;
            case 'menor_btu':
                $query->orderBy('capacidad_btu', 'asc');
                break;
            case 'mayor_btu':
                $query->orderBy('capacidad_btu', 'desc');
                break;
            default:
                $query->orderBy('es_destacado', 'desc')->latest();
                break;
        }

        $products = $query->paginate(9)->withQueryString();

        $categories = Category::where('activo', true)->withCount('products')->get();
        $brands = Brand::where('activo', true)->withCount('products')->get();
        
        // Distinct BTU capacities for filter
        $btuCapacities = Product::where('activo', true)
            ->distinct()
            ->orderBy('capacidad_btu', 'asc')
            ->pluck('capacidad_btu');

        return view('pages.products.index', compact('products', 'categories', 'brands', 'btuCapacities'));
    }

    public function show(string $slug)
    {
        $product = Product::with(['category', 'brand'])
            ->where('slug', $slug)
            ->where('activo', true)
            ->firstOrFail();

        $relatedProducts = Product::with(['category', 'brand'])
            ->where('id', '!=', $product->id)
            ->where('activo', true)
            ->where(function ($q) use ($product) {
                $q->where('categoria_id', $product->categoria_id)
                  ->orWhere('marca_id', $product->marca_id);
            })
            ->take(3)
            ->get();

        return view('pages.products.show', compact('product', 'relatedProducts'));
    }
}
