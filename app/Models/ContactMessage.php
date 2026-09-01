<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $table = 'mensajes_contacto';

    protected $fillable = [
        'nombre',
        'telefono',
        'correo',
        'servicio_interes',
        'mensaje',
        'leido',
    ];

    protected $casts = [
        'leido' => 'boolean',
    ];

    public function getWhatsAppReplyUrlAttribute(): string
    {
        $phoneClean = preg_replace('/[^0-9]/', '', $this->telefono ?? $this->phone);
        $nom = $this->nombre ?? $this->name;
        $msg = $this->mensaje ?? $this->message;
        $text = "Hola {$nom}, gracias por escribir a Mundo Airee SRL. Respecto a tu consulta: '{$msg}', con gusto te atendemos.";
        return "https://wa.me/{$phoneClean}?text=" . urlencode($text);
    }

    // Accessors y Mutators para compatibilidad
    public function getNameAttribute(): ?string { return $this->attributes['nombre'] ?? null; }
    public function setNameAttribute($v): void { $this->attributes['nombre'] = $v; }

    public function getPhoneAttribute(): ?string { return $this->attributes['telefono'] ?? null; }
    public function setPhoneAttribute($v): void { $this->attributes['telefono'] = $v; }

    public function getEmailAttribute(): ?string { return $this->attributes['correo'] ?? null; }
    public function setEmailAttribute($v): void { $this->attributes['correo'] = $v; }

    public function getServiceInterestAttribute(): ?string { return $this->attributes['servicio_interes'] ?? null; }
    public function setServiceInterestAttribute($v): void { $this->attributes['servicio_interes'] = $v; }

    public function getMessageAttribute(): ?string { return $this->attributes['mensaje'] ?? null; }
    public function setMessageAttribute($v): void { $this->attributes['mensaje'] = $v; }

    public function getIsReadAttribute(): bool { return (bool)($this->attributes['leido'] ?? false); }
    public function setIsReadAttribute($v): void { $this->attributes['leido'] = (bool)$v; }
}
