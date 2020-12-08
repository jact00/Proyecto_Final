<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(['categoria' => 'medicina']);
        Categoria::create(['categoria' => 'biología']);
        Categoria::create(['categoria' => 'ciencia ficción']);
        Categoria::create(['categoria' => 'geografía']);
        Categoria::create(['categoria' => 'ortografía']);
        Categoria::create(['categoria' => 'programación']);
        Categoria::create(['categoria' => 'matemáticas']);
        Categoria::create(['categoria' => 'física']);
    }
}
