<?php

namespace Database\Seeders;

use App\Models\Grado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grado::create([
            "nombre" => "Nivel 1",
            "descripcion" => "Nivel inicial",
            "coste" => "100",
        ]);
        Grado::create([
            "nombre" => "Nivel 2",
            "descripcion" => "Nivel secundario",
            "coste" => "200",
        ]);
        Grado::create([
            "nombre" => "Nivel 3",
            "descripcion" => "Nivel maximo",
            "coste" => "300",
        ]);
    }
}
