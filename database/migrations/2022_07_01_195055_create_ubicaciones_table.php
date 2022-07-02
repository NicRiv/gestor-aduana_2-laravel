<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->id();

            $table->string('deposito');
            $table->string('area');
            $table->string('nombre')->unique();
            $table->string('condicion');
            $table->string('unidad_logistica');
            $table->integer('cantidad_almacenaje');
            $table->integer('cantidad_disponible')->nullable();
            $table->integer('stock')->nullable();
            $table->string('comentarios')->nullable();
            $table->boolean('activo');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubicaciones');
    }
};
