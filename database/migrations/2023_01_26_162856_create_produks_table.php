<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->string('id_produk', 10)->primary();
            $table->uuid('uuid');
            $table->string('id_kategori', 10);
            $table->string('nama_produk');
            $table->integer('harga');
            $table->integer('berat');
            $table->integer('stok');
            $table->text('deskripsi')->nullable();
            $table->text('gambar')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
};
