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
        Schema::create('tabel_produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('nama_produk');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 10, 2);
            $table->decimal('berat', 10, 2)->default(0.00);
            $table->integer('min_beli')->default(1);
            $table->string('jenis_kain', 100)->nullable();
            $table->unsignedInteger('motif_id')->nullable();
            $table->string('etalase', 100)->nullable();
            $table->string('ukuran', 50)->nullable();
            $table->string('panjang_tali', 50)->nullable();
            $table->string('proses_batik', 50)->nullable();
            $table->integer('stok')->default(0);
            $table->string('gambar');
            $table->text('gambar_detail')->nullable();
            $table->text('gambar_detail2')->nullable();
            $table->unsignedInteger('kategori')->nullable();
            $table->timestamps();
            
            // Indexes
            $table->index('motif_id');
            $table->index('kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_produk');
    }
};