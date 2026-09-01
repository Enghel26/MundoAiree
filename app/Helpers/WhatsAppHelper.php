<?php

namespace App\Helpers;

use App\Models\CompanySetting;

class WhatsAppHelper
{
    /**
     * Get clean phone number for wa.me URL
     */
    public static function getCleanNumber(): string
    {
        $phone = CompanySetting::get('whatsapp_number', '18292769291');
        return preg_replace('/[^0-9]/', '', $phone);
    }

    /**
     * Get formatted display phone number (e.g. +1 (829) 276-9291)
     */
    public static function getDisplayNumber(): string
    {
        return CompanySetting::get('phone_display', '(829) 276-9291');
    }

    /**
     * Generate standard WhatsApp chat link with custom message
     */
    public static function makeLink(string $message = ''): string
    {
        $phone = self::getCleanNumber();
        if (empty($message)) {
            $message = "¡Hola Mundo Airee SRL! Me gustaría solicitar información sobre sus equipos de aire acondicionado y servicios.";
        }
        return "https://wa.me/{$phone}?text=" . urlencode($message);
    }
}
