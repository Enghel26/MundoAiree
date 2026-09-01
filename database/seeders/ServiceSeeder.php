<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'titulo' => 'Instalación de Equipos',
                'slug' => 'instalacion-de-equipos',
                'descripcion_corta' => 'Instalación técnica profesional con tubería de cobre certificada, bomba de vacío, bases reforzadas y pruebas de presión.',
                'contenido' => 'Una correcta instalación garantiza la vida útil y el ahorro energético de tu aire acondicionado. Nuestros técnicos certificados realizan instalaciones limpias, estéticas y seguras utilizando materiales de primera calidad, bomba de vacío profesional para eliminar humedad del circuito y calibración de presiones.',
                'icono' => 'wrench',
                'imagen' => 'images/services/instalacion-aires.webp',
                'mensaje_whatsapp' => '¡Hola Mundo Airee SRL! Necesito cotizar el servicio de instalación técnica de aire acondicionado.',
                'orden' => 1,
                'activo' => true,
            ],
            [
                'titulo' => 'Venta de Aires y Componentes',
                'slug' => 'venta-de-aires-acondicionados',
                'descripcion_corta' => 'Venta de equipos nuevos Split e Inverter, además de componentes, mangueras, filtros, tuberías de cobre y refrigerantes.',
                'contenido' => 'Ofrecemos asesoría técnica especializada para calcular la carga térmica exacta que necesita tu espacio (BTU requeridos). Contamos con stock de marcas líderes y venta directa de repuestos y componentes con garantía certificada.',
                'icono' => 'shopping-bag',
                'imagen' => 'images/services/venta-aires.webp',
                'mensaje_whatsapp' => '¡Hola Mundo Airee SRL! Deseo cotizar la compra de un aire acondicionado o componentes/repuestos.',
                'orden' => 2,
                'activo' => true,
            ],
            [
                'titulo' => 'Reparación y Mantenimiento',
                'slug' => 'reparacion-y-mantenimiento',
                'descripcion_corta' => 'Diagnóstico computarizado, corrección de fugas, recarga de refrigerante y mantenimiento preventivo integral.',
                'contenido' => '¿Tu aire no enfría, gotea agua o presenta código de error? Diagnosticamos fallas mecánicas y electrónicas con rapidez y precisión. Disponemos de repuestos originales, herramientas de última generación y servicio técnico a domicilio.',
                'icono' => 'alert-triangle',
                'imagen' => 'images/services/reparacion-aires.webp',
                'mensaje_whatsapp' => '¡Hola Mundo Airee SRL! Tengo una falla con mi aire acondicionado y necesito servicio técnico de reparación.',
                'orden' => 3,
                'activo' => true,
            ],
            [
                'titulo' => 'Limpieza y Lavado Profundo a Presión',
                'slug' => 'limpieza-y-lavado-profundo',
                'descripcion_corta' => 'Lavado profesional con hidrolavadora a presión, bolsa recolectora para proteger paredes, desinfección de serpentines y turbinas.',
                'contenido' => 'Elimina ácaros, hongos, bacterias y malos olores. Nuestro servicio de limpieza profunda utiliza funda especial para no ensuciar paredes ni pisos, aplicando desengrasantes y desinfectantes biodegradables en el serpentín evaporador, turbina y condensador exterior.',
                'icono' => 'sparkles',
                'imagen' => 'images/services/limpieza-aires.webp',
                'mensaje_whatsapp' => '¡Hola Mundo Airee SRL! Quisiera solicitar el servicio de limpieza y lavado profundo para mis aires acondicionados.',
                'orden' => 4,
                'activo' => true,
            ],
        ];

        foreach ($services as $serv) {
            Service::updateOrCreate(['slug' => $serv['slug']], $serv);
        }
    }
}
