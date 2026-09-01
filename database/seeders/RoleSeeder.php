<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'nombre' => 'Administrador',
                'slug' => 'administrador',
                'descripcion' => 'Acceso total y sin restricciones a la configuración del sistema, gestión de usuarios, roles y catálogo.',
                'color' => 'purple',
                'activo' => true,
            ],
            [
                'nombre' => 'Gerente',
                'slug' => 'gerente',
                'descripcion' => 'Supervisión general del catálogo de aires, servicios, solicitudes de cotizaciones y ajustes CMS.',
                'color' => 'indigo',
                'activo' => true,
            ],
            [
                'nombre' => 'Vendedor',
                'slug' => 'vendedor',
                'descripcion' => 'Gestión y consulta de equipos, precios estimados, marcas y seguimiento a mensajes de clientes.',
                'color' => 'emerald',
                'activo' => true,
            ],
            [
                'nombre' => 'Asistente',
                'slug' => 'asistente',
                'descripcion' => 'Recepción y lectura de prospectos web, y actualización básica de textos informativos.',
                'color' => 'amber',
                'activo' => true,
            ],
            [
                'nombre' => 'Técnico',
                'slug' => 'tecnico',
                'descripcion' => 'Consulta de especificaciones técnicas de equipos, marcas y servicios de instalación/mantenimiento.',
                'color' => 'sky',
                'activo' => true,
            ],
        ];

        foreach ($roles as $rol) {
            Role::updateOrCreate(['slug' => $rol['slug']], $rol);
        }
    }
}
