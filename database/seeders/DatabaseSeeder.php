<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GradoSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(ParentezcoSeeder::class);
        $this->call(CargoSeeder::class);
    }
}
