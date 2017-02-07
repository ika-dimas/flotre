<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pemesan');
            $table->string('email_pemesan');
            $table->string('phone_pemesan');
            $table->text('keterangan_pemesan');
            $table->integer('kode');
            $table->string('nama_produk');
            $table->text('deskripsi');
            $table->string('foto');
            $table->enum('jenis', ['Flower','Tree']);
            $table->integer('panjang');
            $table->integer('lebar');
            $table->integer('tinggi');
            $table->integer('harga');
            $table->integer('jumlah_pesanan');
            $table->integer('total_harga');
            $table->enum('status', ['Belum Tuntas','Tuntas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pesanans');
    }
}