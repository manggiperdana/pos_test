<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksipembelianbarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pembelian_barang', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('transaksi_pembelian_id');
            $table->unsignedInteger('master_barang_id');
            $table->double('jumlah', 8, 2);
            $table->double('harga_satuan', 8, 2);
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
        Schema::dropIfExists('transaksi_pembelian_barang');
    }
}
