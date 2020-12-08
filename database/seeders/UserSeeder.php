<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumno;
use App\Models\Operador;
use Illuminate\Database\Eloquent\Factories\Sequence;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alumno::factory()->count(5)->create();
        Operador::factory()
        	->count(5)
        	->state(new Sequence(
        		['es_admin' => 0],
        		['es_admin' => 1],
        	))->create();
    }
}
