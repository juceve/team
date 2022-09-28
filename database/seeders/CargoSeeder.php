<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cargo::create([
            "nombre" => "Director",
        ]);
        Cargo::create([
            "nombre" => "Sub-Director",
        ]);
        Cargo::create([
            "nombre" => "Secretario",
        ]);
        Cargo::create([
            "nombre" => "Tesorero",
        ]);
    }
}
