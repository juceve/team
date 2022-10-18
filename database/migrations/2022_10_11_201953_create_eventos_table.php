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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('fecha',10);
            $table->string('hora',5);
            $table->string('tema',150);
            $table->foreignId('grado_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('asociado_id')->nullable()->constrained()->nullOnDelete();
            $table->string('prioridad',10);
            $table->string('ctrAsistencia',2)->nullable();
            $table->string('notas')->nullable();
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
        Schema::dropIfExists('eventos');
    }
};
