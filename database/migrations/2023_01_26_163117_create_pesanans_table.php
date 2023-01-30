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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->string('id_pesanan', 16)->primary();
            $table->uuid();
            $table->string('id_user', 10);
            $table->foreignId('id_alamat');
            $table->integer('jumlah');
            $table->string('pengiriman')->nullable();
            $table->integer('ongkir')->nullable();
            $table->string('resi')->nullable();
            $table->string('status', 20)->default('pending');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_alamat')->references('id')->on('alamat_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
};
