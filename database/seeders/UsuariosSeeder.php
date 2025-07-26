<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'ci_usuario' => '12345678',
                'primer_nombre' => 'Juan',
                'segundo_nombre' => 'Carlos',
                'primer_apellido' => 'Pérez',
                'segundo_apellido' => 'Gómez',
                'contraseña' => Hash::make('123456'),
                'estado_registro' => 'Aprobado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci_usuario' => '87654321',
                'primer_nombre' => 'Ana',
                'segundo_nombre' => null,
                'primer_apellido' => 'López',
                'segundo_apellido' => 'Martínez',
                'contraseña' => Hash::make('abcdef'),
                'estado_registro' => 'Pendiente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}