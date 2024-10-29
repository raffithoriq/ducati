<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produk;
use App\Models\Pelanggan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'produks_id' => Produk::inRandomOrder()->first()->id, // Tetap gunakan 'produks_id' jika ini yang dipakai di migrasi
            'pelanggan_id' => Pelanggan::inRandomOrder()->first()->id,
            'total_harga' => $this->faker->numberBetween(10000, 100000),
            'deskripsi' => $this->faker->sentence,
            'nomor_invoice' => $this->faker->unique()->numerify('INV-#####'),
            'status_pembayaran' => $this->faker->randomElement(['belum_bayar', 'sudah_bayar']),
            'tanggal_beli' => now(),
            'tanggal_bayar' => $this->faker->optional()->dateTimeThisYear(),
        ];
    }
        
}

