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
        Schema::create('area_depositos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre')->unique();
            $table->string('deposito');
            $table->string('comentario')->nullable();
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
        Schema::dropIfExists('area_depositos');
    }
};
