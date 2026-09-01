<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $table = 'servicios';

    protected $fillable = [
        'titulo',
        'slug',
        'descripcion_corta',
        'contenido',
        'icono',
        'imagen',
        'mensaje_whatsapp',
        'orden',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
        'orden' => 'integer',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->titulo ?? $service->title);
            }
        });
    }

    public function getWhatsAppUrlAttribute(): string
    {
        $phone = CompanySetting::get('whatsapp_number', '18292769291');
        $phoneClean = preg_replace('/[^0-9]/', '', $phone);

        $tit = $this->titulo ?? $this->title;
        $customMsg = $this->mensaje_whatsapp ?? $this->whatsapp_message;

        if (!empty($customMsg)) {
            $text = $customMsg;
        } else {
            $text = "¡Hola Mundo Airee SRL! Deseo solicitar información o cotización para el servicio de: {$tit}.";
        }

        return "https://wa.me/{$phoneClean}?text=" . urlencode($text);
    }

    // Accessors y Mutators para compatibilidad
    public function getTitleAttribute(): ?string { return $this->attributes['titulo'] ?? null; }
    public function setTitleAttribute($v): void { $this->attributes['titulo'] = $v; }

    public function getShortDescriptionAttribute(): ?string { return $this->attributes['descripcion_corta'] ?? null; }
    public function setShortDescriptionAttribute($v): void { $this->attributes['descripcion_corta'] = $v; }

    public function getContentAttribute(): ?string { return $this->attributes['contenido'] ?? null; }
    public function setContentAttribute($v): void { $this->attributes['contenido'] = $v; }

    public function getIconAttribute(): ?string { return $this->attributes['icono'] ?? null; }
    public function setIconAttribute($v): void { $this->attributes['icono'] = $v; }

    public function getImageAttribute(): ?string { return $this->attributes['imagen'] ?? null; }
    public function setImageAttribute($v): void { $this->attributes['imagen'] = $v; }

    public function getWhatsappMessageAttribute(): ?string { return $this->attributes['mensaje_whatsapp'] ?? null; }
    public function setWhatsappMessageAttribute($v): void { $this->attributes['mensaje_whatsapp'] = $v; }

    public function getOrderAttribute(): ?int { return $this->attributes['orden'] ?? 0; }
    public function setOrderAttribute($v): void { $this->attributes['orden'] = $v; }

    public function getIsActiveAttribute(): bool { return (bool)($this->attributes['activo'] ?? true); }
    public function setIsActiveAttribute($v): void { $this->attributes['activo'] = (bool)$v; }
}
