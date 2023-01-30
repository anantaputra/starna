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
        Schema::create('keranjangs', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('id_user', 10);
            $table->string('id_produk', 10);
            $table->integer('jumlah');
            $table->boolean('checkout')->default(false);
            $table->string('id_pesanan')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_produk')->references('id_produk')->on('produks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keranjangs');
    }
};
