<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->uuid('id') -> primary(); 
            $table->foreignUuid('pelanggan_id')->constrained('pelanggan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('produks_id')->constrained('produks')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('total_harga', 8, 2);
            $table->text('deskripsi');
            $table->string('nomor_invoice');
            $table->enum('status_pembayaran', ['belum_bayar', 'sudah_bayar']);
            $table->timestamp('tanggal_beli')->nullable();
            $table->timestamp('tanggal_bayar')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
