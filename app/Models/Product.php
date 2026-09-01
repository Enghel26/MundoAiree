<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'categoria_id',
        'marca_id',
        'nombre',
        'slug',
        'codigo_modelo',
        'capacidad_btu',
        'tipo_inverter',
        'calificacion_seer',
        'voltaje',
        'refrigerante',
        'precio',
        'etiqueta_precio',
        'cantidad_disponible',
        'descripcion_corta',
        'descripcion',
        'caracteristicas',
        'imagen',
        'es_destacado',
        'activo',
        'plantilla_mensaje_whatsapp',
    ];

    protected $casts = [
        'caracteristicas' => 'array',
        'es_destacado' => 'boolean',
        'activo' => 'boolean',
        'precio' => 'decimal:2',
        'capacidad_btu' => 'integer',
        'cantidad_disponible' => 'integer',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->nombre ?? $product->name);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'categoria_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'marca_id');
    }

    public function getFormattedBtuAttribute(): string
    {
        $btu = $this->capacidad_btu ?? $this->btu_capacity ?? 0;
        return number_format($btu) . ' BTU';
    }

    public function getImageUrlAttribute(): string
    {
        $img = $this->imagen ?? $this->image;
        if ($img && file_exists(public_path($img))) {
            return asset($img);
        }

        $baseName = pathinfo($img ?? '', PATHINFO_FILENAME);
        $slug = $this->slug;

        $candidates = [
            "images/products/{$baseName}.svg",
            "images/products/{$baseName}.png",
            "images/products/{$baseName}.webp",
            "images/products/{$baseName}.jpg",
            "images/products/{$slug}.svg",
            "images/products/{$slug}.png",
            "images/products/{$slug}.webp",
            "images/products/{$slug}.jpg",
        ];

        foreach ($candidates as $cand) {
            if (file_exists(public_path($cand))) {
                return asset($cand);
            }
        }

        return '';
    }

    public function getWhatsAppUrlAttribute(): string
    {
        $phone = CompanySetting::get('whatsapp_number', '18292769291');
        $phoneClean = preg_replace('/[^0-9]/', '', $phone);

        $prodName = $this->nombre ?? $this->name;
        $brandName = $this->brand?->nombre ?? $this->brand?->name ?? '';
        $modelCode = $this->codigo_modelo ?? $this->model_code ?? '';

        $template = $this->plantilla_mensaje_whatsapp ?? $this->whatsapp_message_template;

        if (!empty($template)) {
            $msg = str_replace(
                ['{name}', '{model}', '{btu}', '{brand}'],
                [$prodName, $modelCode, $this->formatted_btu, $brandName],
                $template
            );
        } else {
            $msg = "¡Hola Mundo Airee SRL! Estoy interesado en el aire acondicionado {$prodName} (" . $brandName . " " . $this->formatted_btu . ") que vi en la página web. ¿Me pueden dar más información y precio?";
        }

        return "https://wa.me/{$phoneClean}?text=" . urlencode($msg);
    }

    // Accessors y Mutators para compatibilidad inglés/español
    public function getNameAttribute(): ?string { return $this->attributes['nombre'] ?? null; }
    public function setNameAttribute($v): void { $this->attributes['nombre'] = $v; }

    public function getCategoryIdAttribute() { return $this->attributes['categoria_id'] ?? null; }
    public function setCategoryIdAttribute($v): void { $this->attributes['categoria_id'] = $v; }

    public function getBrandIdAttribute() { return $this->attributes['marca_id'] ?? null; }
    public function setBrandIdAttribute($v): void { $this->attributes['marca_id'] = $v; }

    public function getModelCodeAttribute(): ?string { return $this->attributes['codigo_modelo'] ?? null; }
    public function setModelCodeAttribute($v): void { $this->attributes['codigo_modelo'] = $v; }

    public function getBtuCapacityAttribute(): ?int { return $this->attributes['capacidad_btu'] ?? null; }
    public function setBtuCapacityAttribute($v): void { $this->attributes['capacidad_btu'] = $v; }

    public function getInverterTypeAttribute(): ?string { return $this->attributes['tipo_inverter'] ?? null; }
    public function setInverterTypeAttribute($v): void { $this->attributes['tipo_inverter'] = $v; }

    public function getSeerRatingAttribute(): ?string { return $this->attributes['calificacion_seer'] ?? null; }
    public function setSeerRatingAttribute($v): void { $this->attributes['calificacion_seer'] = $v; }

    public function getPriceAttribute() { return $this->attributes['precio'] ?? null; }
    public function setPriceAttribute($v): void { $this->attributes['precio'] = $v; }

    public function getPriceLabelAttribute(): ?string { return $this->attributes['etiqueta_precio'] ?? null; }
    public function setPriceLabelAttribute($v): void { $this->attributes['etiqueta_precio'] = $v; }

    public function getShortDescriptionAttribute(): ?string { return $this->attributes['descripcion_corta'] ?? null; }
    public function setShortDescriptionAttribute($v): void { $this->attributes['descripcion_corta'] = $v; }

    public function getDescriptionAttribute(): ?string { return $this->attributes['descripcion'] ?? null; }
    public function setDescriptionAttribute($v): void { $this->attributes['descripcion'] = $v; }

    public function getFeaturesAttribute() { return json_decode($this->attributes['caracteristicas'] ?? '[]', true) ?: []; }
    public function setFeaturesAttribute($v): void { $this->attributes['caracteristicas'] = is_array($v) ? json_encode($v) : $v; }

    public function getImageAttribute(): ?string { return $this->attributes['imagen'] ?? null; }
    public function setImageAttribute($v): void { $this->attributes['imagen'] = $v; }

    public function getIsFeaturedAttribute(): bool { return (bool)($this->attributes['es_destacado'] ?? false); }
    public function setIsFeaturedAttribute($v): void { $this->attributes['es_destacado'] = (bool)$v; }

    public function getIsActiveAttribute(): bool { return (bool)($this->attributes['activo'] ?? true); }
    public function setIsActiveAttribute($v): void { $this->attributes['activo'] = (bool)$v; }

    public function getStockAttribute(): int { return (int)($this->attributes['cantidad_disponible'] ?? 0); }
    public function setStockAttribute($v): void { $this->attributes['cantidad_disponible'] = (int)$v; }

    public function getInStockAttribute(): bool { return $this->stock > 0; }

    public function getWhatsappMessageTemplateAttribute(): ?string { return $this->attributes['plantilla_mensaje_whatsapp'] ?? null; }
    public function setWhatsappMessageTemplateAttribute($v): void { $this->attributes['plantilla_mensaje_whatsapp'] = $v; }
}
