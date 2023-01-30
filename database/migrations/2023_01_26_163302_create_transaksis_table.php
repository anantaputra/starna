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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('id_pesanan', 16);
            $table->string('id_transaksi');
            $table->string('metode');
            $table->integer('total');
            $table->string('kode_bayar')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_pesanan')->references('id_pesanan')->on('pesanans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
