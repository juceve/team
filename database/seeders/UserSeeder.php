<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'avatar' => 'avatar/admin.jpg'
        ])->assignRole('SuperUsuario');

        // User::create([
        //     'name' => 'Julio Veliz',
        //     'email' => 'julio@gmail.com',
        //     'password' => bcrypt('12345678')
        // ])->assignRole('Admin');

        // User::create([
        //     'name' => 'Juan Perez',
        //     'email' => 'jperez@gmail.com',
        //     'password' => bcrypt('12345678')
        // ])->assignRole('Usuario');
    }
}
