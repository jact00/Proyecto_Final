<?php

namespace Database\Factories;

use App\Models\Ejemplar;
use Illuminate\Database\Eloquent\Factories\Factory;

class EjemplarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ejemplar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    static $isbn = '';
    static $numero = 0;

    public function definition()
    {

        return [
            'en_prestamo' => 0,
            'numero' => function (array $attributes) {
                if(self::$isbn != $attributes['isbn'])
                {
                    self::$isbn = $attributes['isbn'];
                    self::$numero = 0;
                }

                return ++self::$numero;
            },
        ];
    }
}
