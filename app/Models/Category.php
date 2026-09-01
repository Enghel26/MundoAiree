<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'slug',
        'descripcion',
        'icono',
        'imagen',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->nombre ?? $category->name);
            }
        });
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'categoria_id');
    }

    // Accessors y Mutators para compatibilidad
    public function getNameAttribute(): ?string { return $this->attributes['nombre'] ?? null; }
    public function setNameAttribute($v): void { $this->attributes['nombre'] = $v; }

    public function getDescriptionAttribute(): ?string { return $this->attributes['descripcion'] ?? null; }
    public function setDescriptionAttribute($v): void { $this->attributes['descripcion'] = $v; }

    public function getIconAttribute(): ?string { return $this->attributes['icono'] ?? null; }
    public function setIconAttribute($v): void { $this->attributes['icono'] = $v; }

    public function getImageAttribute(): ?string { return $this->attributes['imagen'] ?? null; }
    public function setImageAttribute($v): void { $this->attributes['imagen'] = $v; }

    public function getIsActiveAttribute(): bool { return (bool)($this->attributes['activo'] ?? true); }
    public function setIsActiveAttribute($v): void { $this->attributes['activo'] = (bool)$v; }
}
