<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi'; // Nama tabel yang benar 'transaksi'
    public $incrementing = false; // Menonaktifkan auto-increment
    protected $keyType = 'string'; // Mengatur tipe key menjadi string untuk UUID

    /**
     * Bootstrap the model and assign a UUID to the primary key if not exists.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid(); // Generate UUID
            }
        });
    }

    /**
     * Relasi ke tabel produk (satu transaksi hanya punya satu produk)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class); // Relasi many-to-one ke Produk
    }

    /**
     * Relasi ke tabel pelanggan (satu transaksi hanya terkait dengan satu pelanggan)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class); // Relasi many-to-one ke Pelanggan
    }
}
