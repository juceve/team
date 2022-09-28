<?php

namespace Database\Seeders;

use App\Models\Parentezco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParentezcoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Parentezco::create([
            'nombre' => 'Esposa'
        ]);
        Parentezco::create([
            'nombre' => 'Esposo'
        ]);
        Parentezco::create([
            'nombre' => 'Hijo'
        ]);
        Parentezco::create([
            'nombre' => 'Hija'
        ]);
        Parentezco::create([
            'nombre' => 'Padre'
        ]);
        Parentezco::create([
            'nombre' => 'Madre'
        ]);
    }
}
