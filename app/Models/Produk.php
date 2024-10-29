<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str; 
use App\Models\Category; 
class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks'; // Nama tabel 'produk'
    public $incrementing = false; // Menonaktifkan auto-increment
    protected $keyType = 'string'; // Mengatur tipe key menjadi string untuk UUID
    protected $fillable = ['category_id','name','harga', 'foto_produk','deskripsi'];

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
    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class); 
    }

    /**
     * Relasi ke tabel kategori (satu produk hanya punya satu kategori)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }

}