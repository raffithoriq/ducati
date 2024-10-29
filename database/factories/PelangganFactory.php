<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PelangganFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pelanggan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_lengkap' => $this->faker->name,
            'foto_profil' => $this->faker->imageUrl(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']), // Sesuaikan nilai dengan yang Anda inginkan
            'email' => $this->faker->unique()->safeEmail,
            'no_hp' => $this->faker->phoneNumber,
            'alamat' => $this->faker->address,
        ];
    }
}
