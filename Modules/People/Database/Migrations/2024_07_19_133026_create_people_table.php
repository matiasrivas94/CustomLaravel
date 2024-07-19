<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 120);
            $table->string('apellido', 120);
            $table->string('dni', 8)->unique();
            $table->string('cuil', 13)->unique();
            $table->string('genero', 20);
            $table->string('direccion')->nullable();
            $table->string('celular', 30)->nullable();
            $table->string('email', 60)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('lugar_nacimiento')->nullable();;
            $table->string('estado_civil', 50)->nullable();
            $table->text('observaciones')->nullable();
            $table->string('grupo_sanguineo', '20')->nullable();

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
        Schema::dropIfExists('people');
    }
};
