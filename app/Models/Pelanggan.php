<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Pelanggan extends  Authenticatable
{
    use HasFactory;

    protected $table = 'pelanggan'; // Nama tabel 'pelanggan'
    public $incrementing = false; // Menonaktifkan auto-increment
    protected $keyType = 'string'; // Mengatur tipe key menjadi string untuk UUID
    protected $fillable = ['nama_lengkap', 'password', 'foto_profil', 'jenis_kelamin', 'email', 'no_hp', 'alamat'];

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
     * Relasi ke tabel transaksi (satu pelanggan bisa punya banyak transaksi)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class); // Relasi one-to-many ke tabel transaksi
    }
}
