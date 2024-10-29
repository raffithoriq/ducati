<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('produks', function (Blueprint $table) {
        $table->string('foto_produk')->default('default.jpg')->change(); // Ubah kolom
    });
}

public function down()
{
    Schema::table('produks', function (Blueprint $table) {
        $table->dropColumn('foto_produk'); // Menghapus kolom jika rollback
    });
}
};
