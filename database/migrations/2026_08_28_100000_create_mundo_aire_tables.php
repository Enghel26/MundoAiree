<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Categorías
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug')->unique();
            $table->text('descripcion')->nullable();
            $table->string('icono')->nullable();
            $table->string('imagen')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        // 2. Marcas
        Schema::create('marcas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug')->unique();
            $table->string('logo')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        // 3. Productos (Aires y Componentes)
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->constrained('categorias')->cascadeOnDelete();
            $table->foreignId('marca_id')->constrained('marcas')->cascadeOnDelete();
            $table->string('nombre');
            $table->string('slug')->unique();
            $table->string('codigo_modelo')->nullable();
            $table->integer('capacidad_btu');
            $table->string('tipo_inverter')->default('Inverter');
            $table->string('calificacion_seer')->nullable();
            $table->string('voltaje')->default('220V');
            $table->string('refrigerante')->default('R-410A');
            $table->decimal('precio', 12, 2)->nullable();
            $table->string('etiqueta_precio')->nullable();
            $table->integer('cantidad_disponible')->default(10);
            $table->text('descripcion_corta')->nullable();
            $table->longText('descripcion')->nullable();
            $table->longText('caracteristicas')->nullable();
            $table->string('imagen')->nullable();
            $table->boolean('es_destacado')->default(false);
            $table->boolean('activo')->default(true);
            $table->string('plantilla_mensaje_whatsapp')->nullable();
            $table->timestamps();
        });

        // 4. Servicios
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('slug')->unique();
            $table->text('descripcion_corta');
            $table->longText('contenido')->nullable();
            $table->string('icono')->nullable();
            $table->string('imagen')->nullable();
            $table->string('mensaje_whatsapp')->nullable();
            $table->integer('orden')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        // 5. Configuraciones de Empresa (CMS)
        Schema::create('configuraciones_empresa', function (Blueprint $table) {
            $table->id();
            $table->string('clave')->unique();
            $table->longText('valor')->nullable();
            $table->string('grupo')->default('general');
            $table->timestamps();
        });

        // 6. Mensajes de Contacto / Prospectos
        Schema::create('mensajes_contacto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('correo')->nullable();
            $table->string('servicio_interes')->nullable();
            $table->text('mensaje');
            $table->boolean('leido')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes_contacto');
        Schema::dropIfExists('configuraciones_empresa');
        Schema::dropIfExists('servicios');
        Schema::dropIfExists('productos');
        Schema::dropIfExists('marcas');
        Schema::dropIfExists('categorias');
    }
};
