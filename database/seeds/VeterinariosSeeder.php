<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VeterinariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('veterinarios')->insert([
            [
                'nombre' => 'Josue Mercado De Luna',
                'correo' => 'vet1@correo.com',
                'especialidad' => 'especialidad 1',
                'telefono' => '4444444444'
            ],[
                'nombre' => 'Marco Adrian Gonzales',
                'correo' => 'vet2@correo.com',
                'especialidad' => 'especialidad 2',
                'telefono' => '4444444444'
            ],[
                'nombre' => 'Gerardo Ramirez',
                'correo' => 'vet3@correo.com',
                'especialidad' => 'especialidad 3',
                'telefono' => '4444444444'
            ],[
                'nombre' => 'Fausto Rodriguez',
                'correo' => 'vet4@correo.com',
                'especialidad' => 'especialidad 4',
                'telefono' => '4444444444'
            ],[
                'nombre' => 'Adrian Chacon Castro',
                'correo' => 'vet5@correo.com',
                'especialidad' => 'especialidad 5',
                'telefono' => '4444444444'
            ]
        ]
        );
    }
}
