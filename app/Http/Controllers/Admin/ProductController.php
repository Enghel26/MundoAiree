<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'brand']);

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where('nombre', 'like', "%{$search}%")
                  ->orWhere('codigo_modelo', 'like', "%{$search}%");
        }

        if ($request->filled('categoria')) {
            $query->where('categoria_id', $request->categoria);
        }

        $products = $query->latest()->paginate(10)->withQueryString();
        $categories = Category::all();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::where('activo', true)->get();
        $brands = Brand::where('activo', true)->get();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'nombre' => 'nullable|string|max:255',
            'category_id' => 'nullable|exists:categorias,id',
            'categoria_id' => 'nullable|exists:categorias,id',
            'brand_id' => 'nullable|exists:marcas,id',
            'marca_id' => 'nullable|exists:marcas,id',
            'model_code' => 'nullable|string|max:100',
            'codigo_modelo' => 'nullable|string|max:100',
            'btu_capacity' => 'nullable|integer|min:1000',
            'capacidad_btu' => 'nullable|integer|min:1000',
            'inverter_type' => 'nullable|string|max:100',
            'tipo_inverter' => 'nullable|string|max:100',
            'seer_rating' => 'nullable|string|max:50',
            'calificacion_seer' => 'nullable|string|max:50',
            'voltage' => 'nullable|string|max:50',
            'voltaje' => 'nullable|string|max:50',
            'refrigerant' => 'nullable|string|max:50',
            'refrigerante' => 'nullable|string|max:50',
            'price' => 'nullable|numeric|min:0',
            'precio' => 'nullable|numeric|min:0',
            'price_label' => 'nullable|string|max:100',
            'etiqueta_precio' => 'nullable|string|max:100',
            'cantidad_disponible' => 'nullable|integer|min:0',
            'stock' => 'nullable|integer|min:0',
            'short_description' => 'nullable|string|max:500',
            'descripcion_corta' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'features_text' => 'nullable|string',
            'caracteristicas_text' => 'nullable|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'image_url' => 'nullable|string',
            'imagen_url' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'es_destacado' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'activo' => 'nullable|boolean',
            'whatsapp_message_template' => 'nullable|string|max:500',
            'plantilla_mensaje_whatsapp' => 'nullable|string|max:500',
        ]);

        $nombre = $request->input('nombre', $request->input('name'));
        $categoriaId = $request->input('categoria_id', $request->input('category_id'));
        $marcaId = $request->input('marca_id', $request->input('brand_id'));
        $codigoModelo = $request->input('codigo_modelo', $request->input('model_code'));
        $capacidadBtu = $request->input('capacidad_btu', $request->input('btu_capacity', 12000));
        $tipoInverter = $request->input('tipo_inverter', $request->input('inverter_type', 'Inverter'));
        $calificacionSeer = $request->input('calificacion_seer', $request->input('seer_rating'));
        $voltaje = $request->input('voltaje', $request->input('voltage', '220V'));
        $refrigerante = $request->input('refrigerante', $request->input('refrigerant', 'R-410A'));
        $precio = $request->input('precio', $request->input('price'));
        $etiquetaPrecio = $request->input('etiqueta_precio', $request->input('price_label'));
        $cantidadDisponible = $request->input('cantidad_disponible', $request->input('stock', 10));
        $descripcionCorta = $request->input('descripcion_corta', $request->input('short_description'));
        $descripcion = $request->input('descripcion', $request->input('description'));
        $templateWs = $request->input('plantilla_mensaje_whatsapp', $request->input('whatsapp_message_template'));

        $featuresText = $request->input('caracteristicas_text', $request->input('features_text'));
        $caracteristicas = [];
        if (!empty($featuresText)) {
            $caracteristicas = array_filter(array_map('trim', explode("\n", $featuresText)));
        }

        $imagePath = $request->input('imagen_url', $request->input('image_url'));
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . Str::slug($nombre) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/products'), $filename);
            $imagePath = 'images/products/' . $filename;
        }

        $product = Product::create([
            'nombre' => $nombre,
            'slug' => Str::slug($nombre . '-' . ($codigoModelo ?? uniqid())),
            'categoria_id' => $categoriaId,
            'marca_id' => $marcaId,
            'codigo_modelo' => $codigoModelo,
            'capacidad_btu' => $capacidadBtu,
            'tipo_inverter' => $tipoInverter,
            'calificacion_seer' => $calificacionSeer,
            'voltaje' => $voltaje,
            'refrigerante' => $refrigerante,
            'precio' => $precio,
            'etiqueta_precio' => $etiquetaPrecio,
            'cantidad_disponible' => $cantidadDisponible,
            'descripcion_corta' => $descripcionCorta,
            'descripcion' => $descripcion,
            'caracteristicas' => $caracteristicas,
            'imagen' => $imagePath,
            'es_destacado' => $request->boolean('es_destacado', $request->boolean('is_featured')),
            'activo' => $request->boolean('activo', $request->boolean('is_active', true)),
            'plantilla_mensaje_whatsapp' => $templateWs,
        ]);

        return redirect()->route('admin.products.index')->with('success', "El producto {$product->nombre} fue creado exitosamente.");
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'nombre' => 'nullable|string|max:255',
            'category_id' => 'nullable|exists:categorias,id',
            'categoria_id' => 'nullable|exists:categorias,id',
            'brand_id' => 'nullable|exists:marcas,id',
            'marca_id' => 'nullable|exists:marcas,id',
            'model_code' => 'nullable|string|max:100',
            'codigo_modelo' => 'nullable|string|max:100',
            'btu_capacity' => 'nullable|integer|min:1000',
            'capacidad_btu' => 'nullable|integer|min:1000',
            'inverter_type' => 'nullable|string|max:100',
            'tipo_inverter' => 'nullable|string|max:100',
            'seer_rating' => 'nullable|string|max:50',
            'calificacion_seer' => 'nullable|string|max:50',
            'voltage' => 'nullable|string|max:50',
            'voltaje' => 'nullable|string|max:50',
            'refrigerant' => 'nullable|string|max:50',
            'refrigerante' => 'nullable|string|max:50',
            'price' => 'nullable|numeric|min:0',
            'precio' => 'nullable|numeric|min:0',
            'price_label' => 'nullable|string|max:100',
            'etiqueta_precio' => 'nullable|string|max:100',
            'cantidad_disponible' => 'nullable|integer|min:0',
            'stock' => 'nullable|integer|min:0',
            'short_description' => 'nullable|string|max:500',
            'descripcion_corta' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'features_text' => 'nullable|string',
            'caracteristicas_text' => 'nullable|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'image_url' => 'nullable|string',
            'imagen_url' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'es_destacado' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'activo' => 'nullable|boolean',
            'whatsapp_message_template' => 'nullable|string|max:500',
            'plantilla_mensaje_whatsapp' => 'nullable|string|max:500',
        ]);

        $nombre = $request->input('nombre', $request->input('name', $product->nombre));
        $categoriaId = $request->input('categoria_id', $request->input('category_id', $product->categoria_id));
        $marcaId = $request->input('marca_id', $request->input('brand_id', $product->marca_id));
        $codigoModelo = $request->input('codigo_modelo', $request->input('model_code', $product->codigo_modelo));
        $capacidadBtu = $request->input('capacidad_btu', $request->input('btu_capacity', $product->capacidad_btu));
        $tipoInverter = $request->input('tipo_inverter', $request->input('inverter_type', $product->tipo_inverter));
        $calificacionSeer = $request->input('calificacion_seer', $request->input('seer_rating', $product->calificacion_seer));
        $voltaje = $request->input('voltaje', $request->input('voltage', $product->voltaje));
        $refrigerante = $request->input('refrigerante', $request->input('refrigerant', $product->refrigerante));
        $precio = $request->input('precio', $request->input('price', $product->precio));
        $etiquetaPrecio = $request->input('etiqueta_precio', $request->input('price_label', $product->etiqueta_precio));
        $cantidadDisponible = $request->input('cantidad_disponible', $request->input('stock', $product->cantidad_disponible ?? 10));
        $descripcionCorta = $request->input('descripcion_corta', $request->input('short_description', $product->descripcion_corta));
        $descripcion = $request->input('descripcion', $request->input('description', $product->descripcion));
        $templateWs = $request->input('plantilla_mensaje_whatsapp', $request->input('whatsapp_message_template', $product->plantilla_mensaje_whatsapp));

        $featuresText = $request->input('caracteristicas_text', $request->input('features_text'));
        $caracteristicas = $product->caracteristicas;
        if ($request->has('caracteristicas_text') || $request->has('features_text')) {
            $caracteristicas = array_filter(array_map('trim', explode("\n", $featuresText ?? '')));
        }

        $imagePath = $product->imagen;
        if ($request->filled('imagen_url') || $request->filled('image_url')) {
            $imagePath = $request->input('imagen_url', $request->input('image_url'));
        }
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . Str::slug($nombre) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/products'), $filename);
            $imagePath = 'images/products/' . $filename;
        }

        $product->update([
            'nombre' => $nombre,
            'categoria_id' => $categoriaId,
            'marca_id' => $marcaId,
            'codigo_modelo' => $codigoModelo,
            'capacidad_btu' => $capacidadBtu,
            'tipo_inverter' => $tipoInverter,
            'calificacion_seer' => $calificacionSeer,
            'voltaje' => $voltaje,
            'refrigerante' => $refrigerante,
            'precio' => $precio,
            'etiqueta_precio' => $etiquetaPrecio,
            'cantidad_disponible' => $cantidadDisponible,
            'descripcion_corta' => $descripcionCorta,
            'descripcion' => $descripcion,
            'caracteristicas' => $caracteristicas,
            'imagen' => $imagePath,
            'es_destacado' => $request->boolean('es_destacado', $request->boolean('is_featured')),
            'activo' => $request->boolean('activo', $request->boolean('is_active')),
            'plantilla_mensaje_whatsapp' => $templateWs,
        ]);

        return redirect()->route('admin.products.index')->with('success', "El producto {$product->nombre} fue actualizado correctamente.");
    }

    public function toggleStatus(Request $request, Product $product)
    {
        $newStatus = $request->has('activo') ? $request->boolean('activo') : !$product->activo;
        $product->update(['activo' => $newStatus]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'activo' => $product->activo,
                'message' => $product->activo ? 'Equipo activado y visible en el catálogo.' : 'Equipo desactivado y oculto del catálogo.',
            ]);
        }

        return back()->with('success', $product->activo ? "El equipo '{$product->nombre}' ahora está activo en el catálogo." : "El equipo '{$product->nombre}' fue desactivado del catálogo.");
    }
}
