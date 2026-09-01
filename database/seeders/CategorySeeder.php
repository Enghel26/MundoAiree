<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'nombre' => 'Split Inverter',
                'slug' => 'split-inverter',
                'descripcion' => 'Equipos residenciales y comerciales de pared con máxima eficiencia energética y operación ultra silenciosa.',
                'icono' => 'wind',
                'activo' => true,
            ],
            [
                'nombre' => 'Componentes y Repuestos',
                'slug' => 'componentes-y-repuestos',
                'descripcion' => 'Venta de mangueras, tuberías de cobre, filtros, refrigerantes, capacitores, controles y accesorios para climatización.',
                'icono' => 'tool',
                'activo' => true,
            ],
            [
                'nombre' => 'Piso Techo',
                'slug' => 'piso-techo',
                'descripcion' => 'Ideales para espacios amplios, locales comerciales, oficinas y restaurantes que requieren alto flujo de aire.',
                'icono' => 'maximize-2',
                'activo' => true,
            ],
            [
                'nombre' => 'Cassette',
                'slug' => 'cassette',
                'descripcion' => 'Unidades empotradas en cielo raso con distribución de aire en 360 grados, diseño estético y elegante.',
                'icono' => 'grid',
                'activo' => true,
            ],
            [
                'nombre' => 'Conducto / Central',
                'slug' => 'conducto-central',
                'descripcion' => 'Sistemas centralizados ocultos para climatización uniforme en múltiples estancias o grandes áreas.',
                'icono' => 'layers',
                'activo' => true,
            ],
            [
                'nombre' => 'Portátil / Ventana',
                'slug' => 'portatil-ventana',
                'descripcion' => 'Soluciones compactas, fáciles de instalar y mover, perfectas para habitaciones y espacios temporales.',
                'icono' => 'box',
                'activo' => true,
            ],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
