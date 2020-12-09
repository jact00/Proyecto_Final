<?php

namespace Database\Factories;

use App\Models\Movimiento;
use App\Models\Alumno;
use App\Models\Operador;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovimientoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movimiento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'alumno_id' => \DB::table('alumnos')->inRandomOrder()->pluck('user_id')->first(),
            'operador_id' => \DB::table('operadores')->inRandomOrder()->pluck('user_id')->first(),
        ];
    }
}
