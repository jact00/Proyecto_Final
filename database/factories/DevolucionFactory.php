<?php

namespace Database\Factories;

use App\Models\Devolucion;
use App\Models\Movimiento;
use Illuminate\Database\Eloquent\Factories\Factory;

class DevolucionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Devolucion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $datos = \DB::table('movimientos')->where('es_prestamo', 1)->pluck('id');
        return [
            'movimiento_id' => Movimiento::factory()->devolucion(),
            'prestamo_id' => $this->faker->unique()->randomElement($datos),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Devolucion $devolucion) {
            //
        })->afterCreating(function (Devolucion $devolucion) {
            $ejemplares = $devolucion->prestamo->movimiento->ejemplares;

            foreach($ejemplares as $ejemplar)
            {
                $devolucion->movimiento->ejemplares()->attach($ejemplar->id);
            }
        });
    }
}
