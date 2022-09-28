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
        Schema::create('directoriocargos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('directorio_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('asociado_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('cargo_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('status', array('Activo', 'Inactivo'))->default('Inactivo');
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
        Schema::dropIfExists('directoriocargos');
    }
};
