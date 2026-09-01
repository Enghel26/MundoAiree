<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $split = Category::where('slug', 'split-inverter')->first();
        $pisoTecho = Category::where('slug', 'piso-techo')->first();
        $cassette = Category::where('slug', 'cassette')->first();

        $gree = Brand::where('slug', 'gree')->first();
        $airmax = Brand::where('slug', 'airmax')->first();
        $confortmatic = Brand::where('slug', 'confortmatic')->first();
        $royal = Brand::where('slug', 'royal')->first();
        $westintech = Brand::where('slug', 'westintech')->first();
        $milexus = Brand::where('slug', 'milexus')->first();

        $products = [
            [
                'categoria_id' => $split->id,
                'marca_id' => $gree->id,
                'nombre' => 'GREE Lomo Inverter 12,000 BTU 19 SEER',
                'slug' => 'gree-lomo-inverter-12000-btu',
                'codigo_modelo' => 'GWH12QB-INV',
                'capacidad_btu' => 12000,
                'tipo_inverter' => 'Inverter G10 High Efficiency',
                'calificacion_seer' => '19 SEER',
                'voltaje' => '220V / 1Ph / 60Hz',
                'refrigerante' => 'R-410A Ecológico',
                'precio' => 29500.00,
                'etiqueta_precio' => 'RD$ 29,500.00',
                'cantidad_disponible' => 15,
                'descripcion_corta' => 'Alta eficiencia y durabilidad comprobada para habitaciones de hasta 16 m².',
                'descripcion' => 'El aire acondicionado GREE Lomo Inverter de 12,000 BTU combina tecnología de punta G10 Inverter para ahorro de energía, flujo de aire 3D y función I-Feel en el control remoto.',
                'caracteristicas' => [
                    'Tecnología G10 Inverter de ultra bajo consumo',
                    'Función I-Feel con sensor en control remoto',
                    'Filtro catalítico antibacterial',
                    'Golden Fin anticorrosión en condensador',
                    'Modo Sleep ultrasilencioso'
                ],
                'imagen' => 'images/products/gree-split-12k.webp',
                'es_destacado' => true,
                'activo' => true,
            ],
            [
                'categoria_id' => $split->id,
                'marca_id' => $airmax->id,
                'nombre' => 'AIRMAX Split Inverter 18,000 BTU 18 SEER',
                'slug' => 'airmax-split-inverter-18000-btu',
                'codigo_modelo' => 'AM-INV-18K',
                'capacidad_btu' => 18000,
                'tipo_inverter' => 'Inverter Tropicalizado',
                'calificacion_seer' => '18 SEER',
                'voltaje' => '220V / 1Ph / 60Hz',
                'refrigerante' => 'R-410A',
                'precio' => 36500.00,
                'etiqueta_precio' => 'RD$ 36,500.00',
                'cantidad_disponible' => 12,
                'descripcion_corta' => 'Especialmente diseñado para el clima tropical de República Dominicana.',
                'descripcion' => 'Equipo AIRMAX de 18,000 BTU con serpentín de cobre reforzado y recubrimiento anticorrosivo para soportar ambientes salinos y de alta humedad.',
                'caracteristicas' => [
                    'Recubrimiento tropicalizado resistente al salitre',
                    'Enfriamiento turbo de rápida respuesta',
                    'Tubería y serpentín 100% de cobre',
                    'Display digital LED oculto'
                ],
                'imagen' => 'images/products/airmax-split-18k.webp',
                'es_destacado' => true,
                'activo' => true,
            ],
            [
                'categoria_id' => $split->id,
                'marca_id' => $confortmatic->id,
                'nombre' => 'CONFORTMATIC Inverter 12,000 BTU 16 SEER',
                'slug' => 'confortmatic-inverter-12000-btu',
                'codigo_modelo' => 'CM-12K-INV',
                'capacidad_btu' => 12000,
                'tipo_inverter' => 'Inverter Eco',
                'calificacion_seer' => '16 SEER',
                'voltaje' => '220V / 1Ph / 60Hz',
                'refrigerante' => 'R-410A',
                'precio' => 26500.00,
                'etiqueta_precio' => 'RD$ 26,500.00',
                'cantidad_disponible' => 20,
                'descripcion_corta' => 'Excelente relación calidad-precio y bajo consumo eléctrico.',
                'descripcion' => 'CONFORTMATIC ofrece una solución económica y altamente confiable para habitaciones y oficinas, garantizando frescura continua con mínimo mantenimiento.',
                'caracteristicas' => [
                    'Excelente relación calidad y precio accesible',
                    'Ahorro de energía comprobado',
                    'Fácil mantenimiento y repuestos accesibles',
                    'Control remoto multifunción'
                ],
                'imagen' => 'images/products/confortmatic-split-12k.webp',
                'es_destacado' => true,
                'activo' => true,
            ],
            [
                'categoria_id' => $split->id,
                'marca_id' => $royal->id,
                'nombre' => 'ROYAL Split Inverter 24,000 BTU 18 SEER',
                'slug' => 'royal-split-inverter-24000-btu',
                'codigo_modelo' => 'RY-INV-24K',
                'capacidad_btu' => 24000,
                'tipo_inverter' => 'Heavy Inverter',
                'calificacion_seer' => '18 SEER',
                'voltaje' => '220V / 1Ph / 60Hz',
                'refrigerante' => 'R-410A',
                'precio' => 46000.00,
                'etiqueta_precio' => 'RD$ 46,000.00',
                'cantidad_disponible' => 8,
                'descripcion_corta' => 'Gran potencia de enfriamiento para áreas de hasta 40 m².',
                'descripcion' => 'Equipo robusto ROYAL con alta capacidad de flujo de aire para salas grandes, negocios y locales comerciales.',
                'caracteristicas' => [
                    'Compresor de alto torque para rápido enfriamiento',
                    'Filtro lavable antipolvo de alta densidad',
                    'Reinicio automático tras cortes de energía',
                    'Gabinete exterior antioxidante'
                ],
                'imagen' => 'images/products/royal-split-24k.webp',
                'es_destacado' => true,
                'activo' => true,
            ],
            [
                'categoria_id' => $split->id,
                'marca_id' => $westintech->id,
                'nombre' => 'WESTINTECH Smart Inverter 12,000 BTU 20 SEER',
                'slug' => 'westintech-smart-inverter-12000-btu',
                'codigo_modelo' => 'WT-SMART-12K',
                'capacidad_btu' => 12000,
                'tipo_inverter' => 'Smart Inverter WiFi',
                'calificacion_seer' => '20 SEER',
                'voltaje' => '220V / 1Ph / 60Hz',
                'refrigerante' => 'R-410A',
                'precio' => 31000.00,
                'etiqueta_precio' => 'RD$ 31,000.00',
                'cantidad_disponible' => 10,
                'descripcion_corta' => 'Control total desde tu smartphone con la app móvil y máximo ahorro de luz.',
                'descripcion' => 'El modelo WESTINTECH cuenta con módulo WiFi preinstalado para controlar encendido, temperatura y programación desde cualquier lugar.',
                'caracteristicas' => [
                    'WiFi Integrado compatible con iOS y Android',
                    'Compresor Inverter de 20 SEER de alta eficiencia',
                    'Flujo de aire silencioso y envolvente',
                    'Autodiagnóstico digital de fallas'
                ],
                'imagen' => 'images/products/westintech-split-12k.webp',
                'es_destacado' => true,
                'activo' => true,
            ],
            [
                'categoria_id' => $split->id,
                'marca_id' => $milexus->id,
                'nombre' => 'MILEXUS Split Inverter 18,000 BTU 18 SEER',
                'slug' => 'milexus-split-inverter-18000-btu',
                'codigo_modelo' => 'ML-18K-INV',
                'capacidad_btu' => 18000,
                'tipo_inverter' => 'Inverter Advance',
                'calificacion_seer' => '18 SEER',
                'voltaje' => '220V / 1Ph / 60Hz',
                'refrigerante' => 'R-410A',
                'precio' => 37000.00,
                'etiqueta_precio' => 'RD$ 37,000.00',
                'cantidad_disponible' => 14,
                'descripcion_corta' => 'Diseño moderno, silencioso y potente para salas y apartamentos.',
                'descripcion' => 'MILEXUS combina tecnología Inverter avanzada con materiales de alta durabilidad para mantener tu hogar siempre a la temperatura perfecta.',
                'caracteristicas' => [
                    'Tecnología Inverter de alto rendimiento',
                    'Filtro de carbón activo desodorizante',
                    'Oscilación automática 4D',
                    'Garantía directa en compresor'
                ],
                'imagen' => 'images/products/milexus-split-18k.webp',
                'es_destacado' => true,
                'activo' => true,
            ],
            [
                'categoria_id' => $pisoTecho->id,
                'marca_id' => $gree->id,
                'nombre' => 'GREE Piso Techo Inverter 36,000 BTU (3 Tons)',
                'slug' => 'gree-piso-techo-inverter-36000-btu',
                'codigo_modelo' => 'GTH36-INV',
                'capacidad_btu' => 36000,
                'tipo_inverter' => 'Inverter Comercial',
                'calificacion_seer' => '18 SEER',
                'voltaje' => '220V / 1Ph / 60Hz',
                'refrigerante' => 'R-410A',
                'precio' => 82000.00,
                'etiqueta_precio' => 'RD$ 82,000.00',
                'cantidad_disponible' => 5,
                'descripcion_corta' => 'Ideal para locales comerciales, iglesias y restaurantes de hasta 60 m².',
                'descripcion' => 'Flexibilidad total de instalación en techo o suelo con tiro de aire de largo alcance y funcionamiento silencioso.',
                'caracteristicas' => [
                    '3 Toneladas de enfriamiento continuo',
                    'Instalación vertical u horizontal',
                    'Compresor Inverter GREE de alta resistencia'
                ],
                'imagen' => 'images/products/gree-piso-techo-36k.webp',
                'es_destacado' => false,
                'activo' => true,
            ],
            [
                'categoria_id' => $cassette->id,
                'marca_id' => $royal->id,
                'nombre' => 'ROYAL Cassette 4 Vías Inverter 48,000 BTU (4 Tons)',
                'slug' => 'royal-cassette-inverter-48000-btu',
                'codigo_modelo' => 'RY-CAS-48K',
                'capacidad_btu' => 48000,
                'tipo_inverter' => 'Inverter Comercial',
                'calificacion_seer' => '18 SEER',
                'voltaje' => '220V / 3Ph / 60Hz',
                'refrigerante' => 'R-410A',
                'precio' => 112000.00,
                'etiqueta_precio' => 'RD$ 112,000.00',
                'cantidad_disponible' => 4,
                'descripcion_corta' => 'Distribución 360° empotrado para oficinas corporativas y salones.',
                'descripcion' => 'Sistema Cassette de 4 vías ROYAL con bomba de condensado de alta elevación y salida de aire envolvente.',
                'caracteristicas' => [
                    'Distribución de aire en 360 grados',
                    'Bomba de condensado incorporada',
                    'Panel extra plano de estética limpia'
                ],
                'imagen' => 'images/products/royal-cassette-48k.webp',
                'es_destacado' => true,
                'activo' => true,
            ]
        ];

        foreach ($products as $prod) {
            Product::updateOrCreate(['slug' => $prod['slug']], $prod);
        }
    }
}
