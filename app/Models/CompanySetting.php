<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class CompanySetting extends Model
{
    use HasFactory;

    protected $table = 'configuraciones_empresa';

    protected $fillable = [
        'clave',
        'valor',
        'grupo',
    ];

    public static function get(string $key, $default = null)
    {
        return Cache::remember("setting_{$key}", 3600, function () use ($key, $default) {
            $setting = static::where('clave', $key)->first();
            return $setting ? $setting->valor : $default;
        });
    }

    public static function set(string $key, $value, string $group = 'general'): void
    {
        static::updateOrCreate(
            ['clave' => $key],
            ['valor' => $value, 'grupo' => $group]
        );
        Cache::forget("setting_{$key}");
    }

    // Accessors y Mutators para compatibilidad
    public function getKeyAttribute(): ?string { return $this->attributes['clave'] ?? null; }
    public function setKeyAttribute($v): void { $this->attributes['clave'] = $v; }

    public function getValueAttribute(): ?string { return $this->attributes['valor'] ?? null; }
    public function setValueAttribute($v): void { $this->attributes['valor'] = $v; }

    public function getGroupAttribute(): ?string { return $this->attributes['grupo'] ?? 'general'; }
    public function setGroupAttribute($v): void { $this->attributes['grupo'] = $v; }
}
