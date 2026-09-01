<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Crear Roles del Sistema
        $this->call(RoleSeeder::class);
        $adminRole = Role::where('slug', 'administrador')->first();

        // 2. Crear Usuario Administrador por Defecto con rol Administrador
        User::updateOrCreate(
            ['usuario' => 'admin'],
            [
                'rol_id' => $adminRole?->id,
                'nombre' => 'Administrador Mundo Aire',
                'usuario' => 'admin',
                'email' => 'admin@mundoaire.com',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // 3. Ejecutar todos los seeders en español
        $this->call([
            SettingSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
            ProductSeeder::class,
            ServiceSeeder::class,
        ]);
    }
}
