<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailBarangKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_barang_keluar', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_barang_keluar');
            $table->bigInteger('id_barang');
            $table->enum('satuan', ['pcs', 'lb', 'btg']);
            $table->integer('jumlah');
            $table->integer('sisa_stok');
            $table->integer('jumlah_sebelumnya');
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
        Schema::dropIfExists('detail_barang_keluar');
    }
}
