<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General Info
            'company_name' => 'Mundo Airee, SRL',
            'company_slogan' => 'Venta, instalación y reparación de aires acondicionados',
            'phone' => '(829) 276-9291',
            'phone_display' => '(829) 276-9291',
            'whatsapp_number' => '18292769291',
            'address' => 'C/Ingeniero Pedro Bonilla Esq, C. José Francisco Peña Gómez Local 2, Santo Domingo Este 11802',
            'schedule' => 'Lunes a Sábado: 8:00 AM - 6:00 PM',
            'google_maps_url' => 'https://www.google.com/maps/search/?api=1&query=C%2FIngeniero+Pedro+Bonilla+Esq%2C+C.+Jos%C3%A9+Francisco+Pe%C3%B1a+G%C3%B3mez+Local+2%2C+Santo+Domingo+Este+11802',
            'google_maps_iframe' => 'https://www.google.com/maps?q=C%2FIngeniero+Pedro+Bonilla+Esq%2C+C.+Jos%C3%A9+Francisco+Pe%C3%B1a+G%C3%B3mez+Local+2%2C+Santo+Domingo+Este+11802&output=embed',
            
            // Social Media (Solo Instagram oficial)
            'instagram_url' => 'https://www.instagram.com/mundo_airee/',

            // Home Content
            'hero_badge' => 'Especialistas Certificados en Climatización en RD',
            'hero_title' => 'El Confort y Frescura Ideal para tu Hogar y Negocio',
            'hero_subtitle' => 'Venta de aires Split e Inverter, componentes y repuestos. Instalación certificada, limpieza profunda y reparación en RD.',
            'hero_stat_1_number' => 'Desde 2021',
            'hero_stat_1_label' => 'Trayectoria y Compromiso',
            'hero_stat_2_number' => '5,000+',
            'hero_stat_2_label' => 'Equipos Instalados',
            'hero_stat_3_number' => '100%',
            'hero_stat_3_label' => 'Garantía Certificada',

            // About Us Content
            'about_intro' => 'Mundo Airee, SRL es una empresa dominicana líder en venta, instalación, limpieza profunda a presión y reparación de sistemas de climatización.',
            'about_history' => 'Iniciando operaciones en septiembre de 2021 en Santo Domingo Este, Mundo Airee, SRL se ha consolidado como un referente de confianza en venta de equipos y componentes, instalación técnica, diagnóstico, lavado a presión y mantenimiento de sistemas de aire acondicionado.',
            'mission' => 'Proporcionar soluciones de climatización de vanguardia con los más altos estándares de calidad, eficiencia energética y respaldo técnico, garantizando ambientes confortables y saludables.',
            'vision' => 'Ser la empresa líder y de mayor preferencia en soluciones de aire acondicionado y climatización en la República Dominicana.',
            'values' => json_encode([
                [
                    'title' => 'Compromiso y Puntualidad',
                    'desc' => 'Cumplimos con rigor en cada entrega, instalación y servicio técnico acordado.',
                    'icon' => 'clock'
                ],
                [
                    'title' => 'Calidad Garantizada',
                    'desc' => 'Trabajamos únicamente con equipos de primera línea y repuestos 100% originales con respaldo.',
                    'icon' => 'shield-check'
                ],
                [
                    'title' => 'Transparencia y Honestidad',
                    'desc' => 'Presupuestos claros, sin costos ocultos y asesoría técnica sincera para tu espacio.',
                    'icon' => 'heart-handshake'
                ],
                [
                    'title' => 'Eficiencia Energética',
                    'desc' => 'Promovemos tecnologías Inverter y refrigerantes ecológicos para el máximo ahorro eléctrico.',
                    'icon' => 'zap'
                ],
            ]),
        ];

        foreach ($settings as $key => $val) {
            CompanySetting::set($key, $val);
        }
    }
}
