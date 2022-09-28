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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();

            $table->string('nombres',60);
            $table->string('apellidos',60)->nullable();
            $table->string('cedula',20);
            $table->string('direccion',200);
            $table->string('telefono',20)->nullable();
            $table->string('celular',20);
            $table->string('email',80)->unique();
            $table->date('fecnacimiento')->nullable();            
            $table->string('ocupacion',250)->nullable();        
            
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
        Schema::dropIfExists('personas');
    }
};
