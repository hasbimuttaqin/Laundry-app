<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
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
            $table->string('code');
            $table->unsignedBigInteger('id_outlet');
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_paket');
            $table->integer('harga')->nullable();
            $table->integer('qty');
            $table->dateTime('tgl');
            $table->dateTime('batas_waktu');
            $table->dateTime('tgl_bayar');
            $table->integer('biaya_tambahan')->default('0');
            $table->integer('diskon')->default('0');
            $table->integer('pajak')->default('0');
            $table->enum('status', ['baru','proses','selesai','diambil']);
            $table->enum('dibayar', ['selesai_bayar','belum_bayar']);
            $table->integer('total');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_outlet')->references('id')->on('outlets');

            $table->foreign('id_pelanggan')->references('id')->on('pelanggans');

            $table->foreign('id_paket')->references('id')->on('pakets');
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
}
