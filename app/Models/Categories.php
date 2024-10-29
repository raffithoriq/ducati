<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories'; 
    public $incrementing = false; // Menonaktifkan auto-increment
    protected $keyType = 'string'; // Mengatur tipe key menjadi string untuk UUID
    protected $fillable = ['name','keterangan'];

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
     * Relasi ke tabel transaksi (satu produk bisa punya banyak transaksi)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produk(): HasMany
    {
        return $this->hasMany(produk::class); 
    }
}
