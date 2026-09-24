<?php

namespace Database\Seeders;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Rol::firstOrCreate([
            'nombre' => 'admin',
        ]);

        $clienteRole = Rol::firstOrCreate([
            'nombre' => 'cliente',
        ]);

        User::create([
            'nombre' => 'Admin Principal',
            'username' => 'admin',
            'correo' => 'admin@hotel.com',
            'password' => Hash::make('123456'),
            'genero' => 1,
            'telefono' => 12345678,
            'role_id' => $adminRole->id,
        ]);

        User::create([
            'nombre' => 'Cliente Demo',
            'username' => 'cliente1',
            'correo' => 'cliente@hotel.com',
            'password' => Hash::make('123456'),
            'genero' => 0,
            'telefono' => 87654321,
            'role_id' => $clienteRole->id,
        ]);
    }
}
