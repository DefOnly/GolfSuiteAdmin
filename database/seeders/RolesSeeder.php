<?php

namespace Database\Seeders;

use App\Models\Desafio;
use App\Models\State;
use App\Models\Player;
use App\Models\Torneo;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kevin Nava',
            'email' => 'kevin_nava_32@hotmail.com',
            'password' => Hash::make('def20639997'),
        ]);

        Desafio::create([
            'Lugar' => 'Primero',
            'fecha_hora' => Carbon::now(),
        ]);

        // State::create([
        //     'idEstado' => 1,
        //     'estado' => 'Activo'
        // ]);

        // State::create([
        //     'idEstado' => 2,
        //     'estado' => 'Bloqueado'
        // ]);

        // Desafio::create([
        //     'idDesafio' => 1,
        //     'estado_desafio' => 'Ganador'
        // ]);

        // Desafio::create([
        //     'idDesafio' => 2,
        //     'estado_desafio' => 'Perdedor'
        // ]);

       Player::factory(30)->create();
    }
}
