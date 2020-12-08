<?php

namespace Database\Factories;

use App\Models\Libro;
use App\Models\Ejemplar;
use Illuminate\Database\Eloquent\Factories\Factory;

class LibroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Libro::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $min = \DB::table('categorias')->min('id');
        $max = \DB::table('categorias')->max('id');
        return [
            'isbn' => $this->faker->unique()->isbn13(),
            'nombre' => $this->faker->sentence(3),
            'autor' => $this->faker->name,
            'editorial' => $this->faker->company,
            'edicion' => $this->faker->randomDigitNotNull(),
            'anio' => $this->faker->year,
            'paginas' => $this->faker->numberBetween(50,500),
            'categoria_id' => $this->faker->numberBetween($min,$max),
        ];
    }
}
