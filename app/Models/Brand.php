<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'marcas';

    protected $fillable = [
        'nombre',
        'slug',
        'logo',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($brand) {
            if (empty($brand->slug)) {
                $brand->slug = Str::slug($brand->nombre ?? $brand->name);
            }
        });
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'marca_id');
    }

    public function getLogoUrlAttribute(): string
    {
        if ($this->logo && file_exists(public_path($this->logo))) {
            return asset($this->logo);
        }

        $nombre = $this->nombre ?? $this->name;
        $slug = $this->slug;

        $possibleFiles = [
            "images/Marcas/{$nombre}.jpg",
            "images/Marcas/{$nombre}.png",
            "images/Marcas/" . ucfirst($slug) . ".jpg",
            "images/Marcas/" . ucfirst($slug) . ".png",
            "images/Marcas/{$slug}.jpg",
            "images/Marcas/{$slug}.png",
            "images/brands/{$slug}.svg",
        ];

        foreach ($possibleFiles as $file) {
            if (file_exists(public_path($file))) {
                return asset($file);
            }
        }

        return '';
    }

    // Accessors y Mutators para compatibilidad
    public function getNameAttribute(): ?string { return $this->attributes['nombre'] ?? null; }
    public function setNameAttribute($v): void { $this->attributes['nombre'] = $v; }

    public function getIsActiveAttribute(): bool { return (bool)($this->attributes['activo'] ?? true); }
    public function setIsActiveAttribute($v): void { $this->attributes['activo'] = (bool)$v; }
}
