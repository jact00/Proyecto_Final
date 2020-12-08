<?php

namespace Database\Factories;

use App\Models\Operador;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OperadorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Operador::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->es_operador(),
        ];
    }
}
