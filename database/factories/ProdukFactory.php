<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produk;
use App\Models\Categories;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    protected $model = produk::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'deskripsi' => $this->faker->sentence(),
            'harga' => $this->faker->numberBetween(10000, 100000),
            'category_id' => Categories::inRandomOrder()->first()->id,
            'foto_produk' => $this->faker->imageUrl(), // Menghasilkan URL gambar acak
        ];
    }
}