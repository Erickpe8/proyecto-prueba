<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;

class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'descripcion' => $this->faker->sentence(),
            'precio' => $this->faker->numberBetween(1, 100) * 1000,
            'stock' => $this->faker->numberBetween(1, 100),
        ];
    }
}
