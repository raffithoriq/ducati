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
        Schema::create('produks', function (Blueprint $table) {
            $table->uuid('id')->primary(); 
            $table->foreignUuid('category_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->decimal('harga', 8, 2); 
            
            $table->text('foto_produk');
            $table->text('deskripsi');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
