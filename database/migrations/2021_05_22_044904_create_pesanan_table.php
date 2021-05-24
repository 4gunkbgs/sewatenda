<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_pesanan')->nullable();
            $table->integer('total_bayar')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->date('tanggal_kembali')->nullable();
            $table->string('barang_id')->nullable();
            $table->unsignedBigInteger('users_id');
            $table->tinyInteger('konfirm')->nullable();
            $table->integer('ganti_rusak')->nullable();
            $table->integer('ganti_hilang')->nullable();
            $table->timestamps();

            $table->foreign('barang_id')->references('id_barang')->on('barang')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}