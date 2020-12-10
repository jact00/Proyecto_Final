<?php

namespace Database\Factories;

use App\Models\Movimiento;
use App\Models\Ejemplar;
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

    public function configure()
    {
        return $this->afterMaking(function (Movimiento $movimiento) {
            //
        })->afterCreating(function (Movimiento $movimiento) {
            $cantidad = $this->faker->numberBetween(1,3);
            $min = \DB::table('ejemplares')->min('id');
            $max = \DB::table('ejemplares')->max('id');

            for(;$cantidad > 0; $cantidad--)
            {
                $prestamo = $this->faker->numberBetween(0,1);
                $id = $this->faker->unique()->numberBetween($min, $max);
                $ejemplar = Ejemplar::find($id);
                $ejemplar->en_prestamo = $prestamo == 1 ? true:false;
                $ejemplar->save();
                if($ejemplar->en_prestamo)
                    $movimiento->ejemplares()->attach($ejemplar);
                else
                    $movimiento->ejemplares()->attach($ejemplar,  ['fecha_devolucion' => now()]);
            }
        });
    }
}
