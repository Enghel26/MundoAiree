<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $query = Brand::withCount('products');

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where('nombre', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
        }

        $brands = $query->latest()->paginate(15)->withQueryString();

        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'nombre' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:marcas,slug',
            'logo_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'logo_url' => 'nullable|string|max:500',
            'is_active' => 'nullable|boolean',
            'activo' => 'nullable|boolean',
        ]);

        $nombre = $request->input('nombre', $request->input('name'));
        if (empty($nombre)) {
            return back()->withErrors(['name' => 'El nombre de la marca es obligatorio.'])->withInput();
        }

        $logoPath = $request->input('logo_url');
        if ($request->hasFile('logo_file')) {
            $file = $request->file('logo_file');
            $filename = time() . '_' . Str::slug($nombre) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/Marcas'), $filename);
            $logoPath = 'images/Marcas/' . $filename;
        }

        $slugInput = $request->input('slug');
        $slug = !empty($slugInput) ? Str::slug($slugInput) : Str::slug($nombre);

        $brand = Brand::create([
            'nombre' => $nombre,
            'slug' => $slug,
            'logo' => $logoPath,
            'activo' => $request->boolean('activo', $request->boolean('is_active', true)),
        ]);

        return redirect()->route('admin.brands.index')->with('success', "La marca {$brand->nombre} fue creada exitosamente.");
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'nombre' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:marcas,slug,' . $brand->id,
            'logo_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'logo_url' => 'nullable|string|max:500',
            'is_active' => 'nullable|boolean',
            'activo' => 'nullable|boolean',
        ]);

        $nombre = $request->input('nombre', $request->input('name', $brand->nombre));
        $logoPath = $brand->logo;
        if ($request->hasFile('logo_file')) {
            $file = $request->file('logo_file');
            $filename = time() . '_' . Str::slug($nombre) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/Marcas'), $filename);
            $logoPath = 'images/Marcas/' . $filename;
        } elseif ($request->filled('logo_url')) {
            $logoPath = $request->input('logo_url');
        }

        $slugInput = $request->input('slug');
        $slug = !empty($slugInput) ? Str::slug($slugInput) : Str::slug($nombre);

        $brand->update([
            'nombre' => $nombre,
            'slug' => $slug,
            'logo' => $logoPath,
            'activo' => $request->boolean('activo', $request->boolean('is_active', true)),
        ]);

        return redirect()->route('admin.brands.index')->with('success', "La marca {$brand->nombre} fue actualizada exitosamente.");
    }

    public function toggleStatus(Request $request, Brand $brand)
    {
        $newStatus = $request->has('activo') ? $request->boolean('activo') : !$brand->activo;
        $brand->update(['activo' => $newStatus]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'activo' => $brand->activo,
                'message' => $brand->activo ? 'Marca activada correctamente.' : 'Marca desactivada.',
            ]);
        }

        return back()->with('success', $brand->activo ? "La marca '{$brand->nombre}' ahora está activa." : "La marca '{$brand->nombre}' fue desactivada.");
    }
}
