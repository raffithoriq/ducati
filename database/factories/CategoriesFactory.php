<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categories;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categories>
 */
class CategoriesFactory extends Factory
{
    protected $model = Categories::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'keterangan' => $this->faker->sentence(),
        ];
    }
}
