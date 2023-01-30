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
        Schema::create('returs', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('id_user', 10);
            $table->string('id_pesanan', 16);
            $table->text('keterangan');
            $table->string('bukti_resi');
            $table->string('bukti_produk');
            $table->string('status', 16)->default('pending');
            $table->text('alasan')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_user')->references('id_user')->on('users');
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
        Schema::dropIfExists('returs');
    }
};
