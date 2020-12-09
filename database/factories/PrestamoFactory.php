<?php

namespace Database\Factories;

use App\Models\Prestamo;
use App\Models\Movimiento;
use App\Models\Ejemplar;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrestamoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Prestamo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'movimiento_id' => Movimiento::factory(),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Prestamo $prestamo) {
            //
        })->afterCreating(function (Prestamo $prestamo) {
            $cantidad = $this->faker->numberBetween(1,3);
            $min = \DB::table('ejemplares')->min('id');
            $max = \DB::table('ejemplares')->max('id');
            //$movimiento = Movimiento::find($prestamo->movi);

            for(;$cantidad > 0; $cantidad--)
            {
                $id = $this->faker->unique()->numberBetween($min, $max);
                $ejemplar = Ejemplar::find($id);
                $prestamo->movimiento->ejemplares()->attach($ejemplar);
            }
        });
    }
}
