<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_produk');
            $table->text('deskripsi');
            $table->string('foto');
            $table->enum('jenis', ['Flower','Tree']);
            $table->integer('panjang');
            $table->integer('lebar');
            $table->integer('tinggi');
            $table->integer('harga');
            $table->string('produk_terjual');
            $table->string('pemasukan');
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
        Schema::drop('lists');
    }
}
